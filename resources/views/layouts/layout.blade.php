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
<body class="text-base text-color m-10">
  <div class="m-2.5 w-5/6  mx-auto">
    <h1 class="text-right tracking-tighter mt-10 mr-10 -mb-8 ml-0 h1-color text-4xl font-bold">
      @yield('title')
    </h1>
    @section('menubar')
    <h2 class="text-sm sm:text-lg m-0 font-bold sm:block hidden">Menu</h2>
    <ul class="text-lg list-none">
      <li>@show</li>
    </ul>
    <hr size="1">
    @yield('content')  
    <hr size="1">    
    <a class="pagetop" href="#"><div class="pagetop__arrow"></div></a>
  </div>  
  <div class="m-2.5 w-5/6 mx-auto footer-color text-base text-center">
    @yield('footer')
    <hr size="1">
  </div>    
</body>
</html>