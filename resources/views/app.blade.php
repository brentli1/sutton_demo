<!DOCTYPE html>
<html>
  <head>
    <title>Sutton Center</title>
    <meta id="token" name="csrf-token" content="{!! csrf_token() !!}" />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>
    <div class="site-wrapper">
      <!-- Navigation -->
      @include('site.top_nav')

      <!-- Main Body -->
      <div id="app" class="main-body">
        <router-view keep-alive transition transition-mode="out-in">
        </router-view>
      </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
