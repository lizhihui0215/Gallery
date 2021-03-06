@extends('master')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>My Galleries</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-8 col-sm-8">
    @if($galleries->count() > 0)
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>Name of the gallery</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($galleries as $gallery)
        <tr>
          <td>{{ $gallery->name }}
            <span class="pull-right">
              {{ $gallery->images()->count() }}
            </span>
          </td>
          <td><a href="{{ url('gallery/view/' . $gallery->id )}}">View</a> \
            <a href="{{ url('gallery/delete/' . $gallery->id )}}">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @endif
  </div>
  <div class="col-md-4 col-sm-4">
    @if(count($errors))
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form class="form" action="{{ url('gallery/save') }}" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <input class="form-control"
        id="gallery_name"
        type="text"
        name="gallery_name"
        placeholder="name of the gallery"
        value="{{ old('gallery_name') }}">

        <button class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
