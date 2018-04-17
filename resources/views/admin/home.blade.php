<!DOCTYPE html>
<html lang="en">
<head>
            <title> Admin </title>
        @include('admin.include.script_top')
        @stack('css')
</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('admin.include.menu')
        @include('admin.include.topnav')
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <footer>
          <div class="pull-right">
            Admin by<a href="https://colorlib.com"> lethu</a>
          </div>
          <div class="clearfix"></div>
        </footer>
      </div>
    </div>
      @include('admin.include.script_bottom')
  </body>
</html>
