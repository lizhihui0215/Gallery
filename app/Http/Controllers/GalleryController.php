<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class GalleryController extends Controller
{


  public function __construct()
  {
    $this->middleware('auth');
  }
  //
  public function viewGalleryList()
  {
    // $galleries = Gallery::all();
    $galleries = Gallery::where('created_by', Auth::user()->id)->get();

    return view('gallery')->with('galleries',$galleries);
  }

  public function saveGallery(Request $request)
  {
    // validate the Request through the validation rules
    $validator = Validator::make($request->all(),[
      'gallery_name' => 'required|min:3',
    ]);

    // tabke actions when the validation has failed

    if ($validator->fails()){
      return redirect('gallery/list')->withErrors($validator)->withInput();
    }

    $gallery = new Gallery;

    // save a new Gallery
    $gallery->name = $request->input('gallery_name');
    $gallery->created_by = Auth::user()->id;
    $gallery->published = 1;
    $gallery->save();
    return redirect()->back();
  }

  public function viewGalleryPics($id)
  {
    $gallery = Gallery::findOrFail($id);
    return view('gallery.gallery-view')->with('gallery',$gallery);
  }

  public function deleteGallery($id)
  {
    //load the gallery
    $currentGallery = Gallery::findOrFail($id);

    // check ownershipe
    if($currentGallery->created_by != Auth::user()->id){
      abort('403','you have not allowed to delete this gallery');
    }

    // get the images
    $images = $currentGallery->images();

    // delete the images
    foreach ($currentGallery->images as $image) {
      unlink(public_path($image->file_path));
      unlink(public_path('gallery/images/thumbs/' . $image->file_name));
    }

    // delete the DB records
    $images->delete();

    $currentGallery->delete();

    return redirect()->back();
  }

  public function doImageUpload(Request $request)
  {
    // get the file from the post request
    $file = $request->file('file');

    // set my file name
    $filename = uniqid() . $file->getClientOriginalName();

    // move the file to correct location
    if(!file_exists('gallery/images')){
      mkdir('gallery/images',0777,true);
    }
    $file->move('gallery/images',$filename);

    if(!file_exists('gallery/images/thumbs')){
      mkdir('gallery/images/thumbs',0777,true);
    }

    $thumb = Image::make('gallery/images/' . $filename)->resize(200,160)->save('gallery/images/thumbs/' . $filename, 50);

    // save the image details into the database
    $gallery = Gallery::find($request->input('gallery_id'));

    $image = $gallery->images()->create([
      'gallery_id' => $request->input('gallery_id'),
      'file_name' => $filename,
      'file_size' => $file->getClientSize(),
      'file_mime' => $file->getClientMimeType(),
      'file_path' => 'gallery/images/' . $filename,
      'created_by' => Auth::user()->id,
    ]);
    return $image;
  }
}
