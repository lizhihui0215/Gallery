<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="javascript:void(0)">Gallery</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="javascript:void(0)">Home</a></li>
    </ul>
    <form class="navbar-form navbar-left">
      <input type="text" class="form-control col-lg-8" placeholder="Search">
    </form>
    <ul class="nav navbar-nav navbar-right">
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
