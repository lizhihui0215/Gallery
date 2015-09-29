<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Gallery App</title>
    <link rel="stylesheet" href="{{ url(elixir('css/all.css')) }}">
    <script type="text/javascript">
      var baseURL = "{{ url('/') }}"
    </script>
  </head>
  <body>
    <div class="container">
      @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
      @endif
      @if(Session::has('flash_error'))
        <div class="alert alert-danger">{{ Session::get('flash_error') }}</div>
      @endif

      @yield('content')
    </div>
    <script type="text/javascript" src="{{ asset('js/vendor/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ url( elixir('js/all.js') ) }}"></script>
  </body>
</html>
