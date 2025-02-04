<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/default.css') }}">
<style>
@import url('https://fonts.cdnfonts.com/css/jsmath-cmti10');
</style>
    @yield('css')
    @yield('js')
</head>
<body>
  <header class="header">
    <h1 class="title">@yield('title')</h1>
  </header>
  <main>
    <div class="content">
      @yield('content')
    </div>
  </main>
</body>
</html>