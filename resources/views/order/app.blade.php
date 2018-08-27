<!DOCTYPE html>
<html lang="en">

  <head>
      
    <meta charset="utf-8">

    <title>لوحة التحكم  @yield('title')</title>

    
    <link rel="stylesheet" href="{{asset('style/orders/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('style/orders/css/bootstrap-rtl.css')}}"/>
    <link rel="stylesheet" href="{{asset('style/orders/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('style/orders/css/normalize.css')}}"/>    
    <link rel="stylesheet" href="{{asset('style/orders/css/style.css?v=4')}}"/>
      @yield('css')
      <style>
          
      </style> 
     <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo|Changa" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
</style>
  </head>

  <body>
        @yield('content')
 
 
      
      
        <script src="{{asset('style/orders/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('style/orders/js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('style/orders/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('style/orders/js/custom.js')}}"></script>
        @if(Auth::check())
 <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
 <script>
      //instantiate a Pusher object with our Credential's key
   var pusher = new Pusher('c669cdf21aa77182c327');

      //Subscribe to the channel we specified in our Laravel Event
   //var channel = pusher.subscribe('ChatMessage{{Auth::user()->id}}');
   var channel = pusher.subscribe('my-channel{{Auth::user()->id}}');

      //Bind a function to a Event (the full Laravel class)
     // channel.bind('App\\Events\\chat-message}', addMessage);
channel.bind('App\\Events\\NotificationEvent', addMessage);
      function addMessage(data) {
         toastr.options.timeOut = 1500; // 1.5s
                    toastr.info(data.message['message']+' '+data.message['name']);
       

    }
        $('.datetimepicker4').datetimepicker({ pickTime: false }); 
    </script>
    @endif
       @yield('js')
  </body>

</html>