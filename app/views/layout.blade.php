<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', 'Control de pedidos')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    {{ HTML::script('assets/js/jquery.js') }}

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
     {{ HTML::script('assets/js/jquery-ui.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/admin.js') }}

    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->
    
    @yield('js')

  </head>
  <body>
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}
      <div class="container">
      @yield('menu')
<br>
<br>
<br>
      @yield('content')
      </div>

    </div>
    {{ HTML::style('assets/css/jquery-ui.css', array('media' => 'screen')) }}
  
  </body>
  </script>
</html>