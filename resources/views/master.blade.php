<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Gallery App</title>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ url(elixir('css/site.css')) }}">
    <script type="text/javascript">
      var baseURL = "{{ url('/') }}"
    </script>
  </head>
  <body>
    <div class="container">
      @if (Auth::check())
      @include('partials.nav')
      @endif

      @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
      @endif
      @if(Session::has('flash_error'))
        <div class="alert alert-danger">{{ Session::get('flash_error') }}</div>
      @endif

      @yield('content')
    </div>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('js/vendor/vendor.js') }}"></script> -->
    <script type="text/javascript" src="{{ url( elixir('js/site.js') ) }}"></script>
  </body>
</html>
