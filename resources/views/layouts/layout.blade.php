<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
  <script src="{{ asset('js/script.js') }}"></script>
  <title>
    @yield('title')
  </title>
</head>
<body>
  <h1>
    @yield('title')
  </h1>
  @section('menubar')
  <h2 class="menutitle">Menu</h2>
  <ul>
    <li>@show</li>
  </ul>
  <hr size="1">
  <div class="content">
    @yield('content')
  </div>    
  <div class="footer">
    @yield('footer')
  </div>  
</body>
</html>