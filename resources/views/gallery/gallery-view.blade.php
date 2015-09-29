@extends('master')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>{{ $gallery->name }}</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <a class="btn btn-primary" href="{{ url('gallery/list') }}" >Back</a>
    </div>
  </div>
@endsection
