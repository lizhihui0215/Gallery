<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class GalleryController extends Controller
{


    public function __construct()
    {
    $this->middleware('auth');
    }
    //
    public function viewGalleryList()
    {
      # code...
      $galleries = Gallery::all();

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

    public function doImageUpload(Request $request)
    {
      # code...
    }
}
