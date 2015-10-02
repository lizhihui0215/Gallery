@extends('master')

@section('content')
<style type="text/css">
  #gallery-images img {
    width: 240px;
    height: 160px;
    border: 2px solid black;
    margin-bottom: 10px;
  }

  #gallery-images ul {
    margin: 0;
    padding: 0;
  }
  #gallery-images li {
    margin: 0;
    padding: 0;
    list-style: none;
    float: left;
    padding-left: 10px;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <h1>{{ $gallery->name }}</h1>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div id="gallery-images">
      <ul>
        @foreach($gallery->images as $image)
          <li>
            <a href="{{ url( $image->file_path ) }}" data-lightbox="mygallery">
              <img src="{{ url( url('gallery/images/thumbs/' . $image->file_name) ) }}">
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <form class="dropzone" id="addImages" action="{{ url('images/do-upload') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
    </form>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-primary" href="{{ url('gallery/list') }}" >Back</a>
  </div>
</div>
@endsection
