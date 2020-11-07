<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="home-section">
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
      
    <div class="site-wrap">
        <div class="site-mobile-menu site-navbar-target">
          <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
              <span class="icon-close2 js-menu-toggle"></span>
            </div>
          </div>
          <div class="site-mobile-menu-body"></div>
        </div>

        @yield('header')

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p id="msg">{{ $message }}</p>
        </div>
        @endif
        
        @yield('content')

        @include('layouts.footer')

    </div>

    @include('layouts.javascripts')
    @yield('javascript')
</body>
</html>
