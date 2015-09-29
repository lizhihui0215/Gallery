@extends('master')

@section('content')
<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="javascript:void(0)">Brand</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="javascript:void(0)">Active</a></li>
      <li><a href="javascript:void(0)">Link</a></li>
      <li class="dropdown">
        <a href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="javascript:void(0)">Action</a></li>
          <li><a href="javascript:void(0)">Another action</a></li>
          <li><a href="javascript:void(0)">Something else here</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Dropdown header</li>
          <li><a href="javascript:void(0)">Separated link</a></li>
          <li><a href="javascript:void(0)">One more separated link</a></li>
        </ul>
      </li>
    </ul>
    <form class="navbar-form navbar-left">
      <input type="text" class="form-control col-lg-8" placeholder="Search">
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="javascript:void(0)">Link</a></li>
      <li class="dropdown">
        <a href="http://fezvrasta.github.io/bootstrap-material-design/bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="javascript:void(0)">Action</a></li>
          <li><a href="javascript:void(0)">Another action</a></li>
          <li><a href="javascript:void(0)">Something else here</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('user/logout') }}">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <h1>My Galleries</h1>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
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
          <td>{{ $gallery->name }}</td>
          <td><a href="{{ url('gallery/view/' . $gallery->id )}}">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @endif
  </div>
  <div class="col-md-4">
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
