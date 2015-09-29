@extends('master')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>{{ $gallery->name }}</h1>
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
