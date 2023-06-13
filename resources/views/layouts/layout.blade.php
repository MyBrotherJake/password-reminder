<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>
    @yield('title')
  </title>
</head>
<body class="text-base m-1.5 text-color max-w-full">
  <h1 class="text-right tracking-tighter mt-10 mr-0 -mb-8 ml-0 h1-color">
    @yield('title')
  </h1>
  @section('menubar')
  <h2 class="text-lg m-0 font-bold">Menu</h2>
  <ul class="text-lg list-none">
    <li>@show</li>
  </ul>
  <hr size="1">
  <div class="m-2.5 w-full  mx-auto">
    @yield('content')
  </div>
  <hr size="1">    
  <div class="w-full text-right mx-auto text-base m-2.5 footer-color">
    @yield('footer')
  </div>  
  <hr size="1">
</body>
</html>