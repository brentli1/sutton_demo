<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sutton Center</title>
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
  <!-- Main Body -->
  <section class="main-body">
    <div class="landing">
      <div class="landing__logo-wrapper">
        <img src="{{ asset('/images/main-logo.png') }}" class="landing__logo" alt="Sutton Center">
      </div>
      @yield('content')
    </div>
  </section>
</body>
</html>
