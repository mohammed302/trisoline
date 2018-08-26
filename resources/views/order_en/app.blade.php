<!DOCTYPE html>
<html lang="en">

  <head>
      
    <meta charset="utf-8">

    <title>Orders  @yield('title')</title>

    
    <link rel="stylesheet" href="{{asset('style/orders/css/bootstrap.css')}}"/>
   
    <link rel="stylesheet" href="{{asset('style/orders/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('style/orders/css/normalize.css')}}"/>    
    <link rel="stylesheet" href="{{asset('style/orders/css/style.css?v=2')}}"/>
      @yield('css')
        
     <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo|Changa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      
  </head>

  <body>
        @yield('content')
 
 
      
      
        <script src="{{asset('style/orders/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('style/orders/js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('style/orders/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('style/orders/js/custom.js')}}"></script>
       @yield('js')
  </body>

</html>