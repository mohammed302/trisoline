<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>{{$setting->name}}  @yield('title') </title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/stylesheets/bootstrap.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/stylesheets/style.css')}}">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/stylesheets/responsive.css')}}">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/stylesheets/colors/color1.css')}}" id="colors">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/stylesheets/animate.css')}}">

    <!-- Animation headline Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/stylesheets/headline.css')}}">



    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('style/web/revolution/css/settings.css')}}">
    

    <!-- Favicon and touch icons  -->

    <link href="{{asset('style/web/icon/favicon.png')}}" rel="icon">
<style>
  
    .tp-mask-wrap{
        overflow:inherit !important;
    }
    .project-dynamic .data-effect li{
        float: right;
    }
.page-title-heading{
margin-top:20px;
}
.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-default {
    border-color: #ddd;
}
.panel-group .panel-heading {
    border-bottom: 0;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-default>.panel-heading+.panel-collapse>.panel-body {
    border-top-color: #ddd;
}
.panel-group .panel-heading+.panel-collapse>.list-group, .panel-group .panel-heading+.panel-collapse>.panel-body {
    border-top: 1px solid #ddd;
}
.panel-body {
    padding: 15px;
}
.panel-group .panel+.panel {
    margin-top: 5px;
}
.panel-group .panel {
    margin-bottom: 0;
    border-radius: 4px;
}
.panel-default {
    border-color: #ddd;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}

    .login a{

        color:#fff;
    }
    .login li a{

        color:#000;
    }
    .mcontainer {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .mcontainer::after {
        content: "";
        clear: both;
        display: table;
    }

    .mcontainer img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .mcontainer img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }
.project-dynamic .entry .content-post {
    position: absolute;
    top: 0;
}
#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
#myModal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}
/* Modal Content (image) */
#myModal .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 170px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
 .project-dynamic .entry .content-post{
        top:130px;
    }
     .featured-post:hover  .content-post{
        top:0;
    }
    .project-dynamic .entry .category {
    margin-top: -96px;
}
</style>
    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
</head>                                 
<body class="header_sticky"> 
    <!-- Preloader -->
    <div id="loading-overlay">
        <div class="loader"></div>
    </div> 

    <!-- Boxed -->
    <div class="boxed">

  
    
     <div class="top style4 background-661 padding-none">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-6">                      
                        <div class="wrap-top margin-top9 margin-left_2 clearfix">
                            <ul class="flat-information style2 before-white float-left">
                                <li><i class="fa fa-map-marker"></i><a href="#">{{$home_setting->address1}}</a></li>
                                <li><i class="fa fa-envelope"></i><a href="#">{{$home_setting->email1}}</a></li>
                                <li><i class="fa fa-phone"></i><a href="#">{{$home_setting->tel1}}</a></li>
                            </ul>
                        </div>
                    </div><!-- /.col-md-7 -->       
                    <div class="col-md-5 col-sm-6">
                        <div class="wrap-top clearfix">
                           
                                 <aside  class="widget  float-right margin-left29">
                                   
                                <div class="btn-click style2">
                                      @if(!Auth::check())
                                    <a href="#" class="flat-button" data-toggle="modal" data-target="#exampleModal">تسجيل الدخول</a>
                                     <a href="#" class="flat-button" data-toggle="modal" data-target="#exampleModall">تسجيل العميل</a>
                              @else
                                 <ul class="unstyled" style="
    padding-top: 11px;
">
                                  <li style="
    text-align: right;
" class="dropdown login"><a href="#" data-toggle="dropdown" role="button" aria-expanded="true" class="dropdown-toggle">
                                {{Auth::user()->name}} <span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu"><li style="
    text-align: right;
"><a href="{{ route('front.profile') }}"><i class="fa fa-user"></i>حسابي </a>
                                      <li style="
    text-align: right;
"><a href="{{ route('orders.index') }}"> <i class="fa fa-object-group  "></i> طلباتي </a></li>
                                <li style="
    text-align: right;
"><a href="{{ route('users.logout') }}"> <i class="fa fa-sign-out"></i> تسجيل الخروج</a></li>
                        </li></ul></li>
                                     @endif
                                 </ul>
                                </div>
                              
                            </aside>
                            
                            <div class="float-right flat-language color-white margin-top12">                        
                               <ul class="unstyled">
                                <li class="current"><a href="#">عربي</a>
                                    <ul class="unstyled">
                                        <li class="en"><a href="{{route('fronten.index')}}">انجليزي</a></li>
                                    </ul>
                                 </li>
                            </ul>
                            </div>
                        </div>
                    </div>        
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top -->

        <div class="flat-header-wrap">
            <!-- Header -->            
            <header id="header" class="header header-style2 header-absolute">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div id="logo" class="logo">
                                <a href="{{route('front.index')}}" rel="home">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
                            </div><!-- /.logo -->
                        </div>
                        <div class="col-lg-9">
                            <div class="flat-wrap-header">
                                <div class="nav-wrap clearfix">        
                                    <nav id="mainnav" class="mainnav style2 color-661 float-left">
                                         <ul class="menu">
                                          
                                        <li class=" @if(Request::segment(1)=='')
                            active
                            @endif ">
                                            <a href="{{route('front.index')}}">الصفحة الرئيسية
                                              </a>
                                            
                                        </li>
                                        <li class=" @if(Request::segment(1)=='about_us' )
                            active
                            @endif "><a href="{{route('front.about_us')}}">من نحن</a></li>
                                        <li class=" @if(Request::segment(1)=='services' )
                            active
                            @endif "><a href="{{route('front.services')}}">خدماتنا</a></li>
                                        <li  class=" @if(Request::segment(1)=='works' )
                            active
                            @endif" ><a href="{{route('front.works')}}">اعمالنا</a></li>
                                        <li  class=" @if(Request::segment(1)=='branch' )
                            active
                            @endif "><a >الفروع</a>
                                        	<ul class="submenu"> 
                                                <li><a href="{{route('front.branch',1)}}">السعودية</a></li>
                                                  <li><a href="{{route('front.branch',3)}}">تركيا</a></li>
                                                    <li><a href="{{route('front.branch',2)}}">الصين</a></li>
                                            </ul>
                                        </li>
                                        <li  class=" @if(Request::segment(1)=='news' )
                            active
                            @endif" ><a href="{{route('front.news')}}">الاخبار</a></li>
                                        <li  class=" @if(Request::segment(1)=='faq' )
                            active
                            @endif" ><a href="{{route('front.faqs')}}">الاسئلة الشائعة</a></li>
                                        <li  class=" @if(Request::segment(1)=='term' )
                            active
                            @endif" ><a href="{{route('front.conditions')}}">الشروط والقوانين</a></li>
                                        <li  class=" @if(Request::segment(1)=='contact' )
                            active
                            @endif"><a href="{{route('front.contact')}}">اتصل بنا</a></li>
                                     
                                        
                                      
                                                               
                                    </ul><!-- /.menu -->
                                    </nav><!-- /.mainnav -->  
                                    <div class="top-search">                        
                                        <form action="#" id="searchform-all" method="get">
                                            <div>
                                                <input type="text" id="input-search" class="sss" placeholder="Search...">
                                                <input type="submit" id="searchsubmit">
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="menu menu-extra style2 color-661">
                                        <li id="s" class="show-search">
                                            <a href="#search" class="flat-search"><i class="fa fa-search"></i></a>
                                        </li>
                                        
                                    </ul> 
                                    <div class="btn-menu">
                                        <span></span>
                                    </div><!-- //mobile menu button --> 
                                </div><!-- /.nav-wrap -->
                                
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
  @yield('content')
    <!-- Footer -->
 
   <footer class="footer widget-footer">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-3 col-sm-6 reponsive-mb30">  
                    <div class="widget-logo">
                        <div id="logo-footer" class="logo">
                             <a href="{{route('front.index')}}" rel="home">
                                <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                            </a>
                        </div>
                      
                        <ul class="flat-information">
                            <li><i class="fa fa-map-marker"></i><a href="#">{{$home_setting->address1}}</a></li>
                            <li><i class="fa fa-phone"></i><a href="#">{{$home_setting->tel1}}</a></li>
                            <li><i class="fa fa-envelope"></i><a href="#">{{$home_setting->email1}}</a></li>
                        </ul>           
                    </div>         
                </div><!-- /.col-md-3 --> 

                <div class="col-lg-3 col-sm-6 reponsive-mb30">  
                    <div class="widget widget-out-link clearfix">
                        <h5 class="widget-title">روابط </h5>
                        <ul class="one-half">
                            <li><a href="{{route('front.index')}}">الرئيسية</a></li>
                            <li><a href="{{route('front.about_us')}}"> من نحن</a></li>
                            <li><a href="{{route('front.services')}}l">الخدمات</a></li>
                            <li><a href="{{route('front.works')}}">أعمالنا</a></li>

                        </ul>
                        <ul class="one-half">
                            <li><a href="{{route('front.news')}}">الأخبار</a></li>
                            <li><a href="{{route('front.faqs')}}">الأسئلة الشائعة</a></li>
                            <li><a href="{{route('front.conditions')}}">الشروط والقوانين</a></li>
                            <li><a href="{{route('front.contact')}}">اتصل بنا</a></li>

                        </ul>
                    </div>
                </div><!-- /.col-md-3 -->

                <div class="col-lg-3 col-sm-6 reponsive-mb30">
                    <div class="widget widget-recent-new">
                        <h5 class="widget-title"> أخر الأخبار</h5>
                        <ul class="popular-new">
                           @foreach($fnews as $f)
                            <li>
                                <div class="text">
                                    <h6><a href="{{route('front.news.details',$f->id)}}">{{$f->title}}    </a></h6>

                                </div>
                            </li>
                  @endforeach
                        </ul>
                    </div>
                </div><!-- /.col-md-3 -->

                <div class="col-lg-3 col-sm-6 reponsive-mb30">
                    <div class="widget widget-letter">
                        <h5 class="widget-title">القائمة البريدية</h5>
                        <p class="info-text">اشترك في أخر الأخبار</p>
                        <form class="flat-mailchimp" method="post" id='emailform' action="{{route('front.email')}}" data-mailchimp="true">
      {{ csrf_field() }}
                            <div class="field clearfix" id="subscribe-content"> 
                                <p class="wrap-input-email">
                                    <input type="email" " name="femail" placeholder="البريد الإلكتروني">
                                </p>
                                <p class="wrap-btn">
                                    <button type="submit"  class="flat-button subscribe-submit" title="Subscribe now">ااشترك</button>
                                </p>
                            </div>
                            <div id="subscribe-msg"></div>
                        </form>
                    </div>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->    
        </div><!-- /.container -->
    </footer>

    <!-- Bottom -->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="copyright"> 
                        <p> <a href="{{route('front.index')}}">{{$setting->name}}</a>. جميع الحقوق محفوظة {{ date("Y")}}&copy;
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <ul class="social-links style2 text-right">
                        <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                      
                    </ul> 
                </div>
            </div>          
        </div><!-- /.container -->
    </div><!-- bottom --
    <!-- Go Top -->
    <a class="go-top">
        <i class="fa fa-angle-up"></i>
    </a>       
    </div>
    
    
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> تسجيل دخول</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="col-lg-12">
             @if (count($errors) > 0)
             <div class="alert alert-danger">
                    <strong>خطأ!</strong> هناك مشكلة في الاتي.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif	
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div> 
                        <div class="margin-left_12">
                            <form id="loginform" class="contactform style4 clearfix" method="post" action="{{route('login')}}" novalidate="novalidate">
                                <span class="flat-input"><input name="email" id="email" type="email" placeholder="البريد الالكتروني" required="required"></span>
                                <span class="flat-input"><input name="password" id="password" type="password" placeholder="كلمة المرور"></span>
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button" id="submit" title="تسجيل الدخول">تسجيل الدخول</button></span>
                          {{ csrf_field() }}
                            </form>
                        </div>      
                    </div>
      </div>
      
    </div>
  </div>
</div>

    <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تسجيل عميل جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="col-lg-12">
                        <div class="margin-left_12">
                            <form id="registerform" class="contactform style4 clearfix" method="post" action="./contact/contact-process.php" novalidate="novalidate">
                            <span class="flat-input"><input name="rname"  type="text" placeholder="اسم العميل او الشركة" required="required"></span>
                             <span class="flat-input"><input name="address"  type="text" placeholder="العنوان" required="required"></span>
                             <span class="flat-input"><input name="tel"  type="text" placeholder="رقم الجوال" required="required"></span>
                                <span class="flat-input"><input name="remail"  type="email" placeholder="البريد الالكتروني" required="required"></span>
                                <span class="flat-input"><input name="rpassword"  type="password" placeholder="كلمة المرور"></span>
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button" id="submit" title="انشاء حساب">انشاء حساب</button></span>
                            </form>
                        </div>      
                    </div>
      </div>
      
    </div>
  </div>
</div>
    
    <!-- Javascript -->
    <script src="{{asset('style/web/javascript/jquery.min.js')}}"></script>
    <script src="{{asset('style/web/javascript/tether.min.js')}}"></script>
    <script src="{{asset('style/web/javascript/bootstrap.min.js')}}"></script> 
    <script src="{{asset('style/web/javascript/jquery.easing.js')}}"></script>    
    <script src="{{asset('style/web/javascript/jquery-waypoints.js')}}"></script>    
    <script src="{{asset('style/web/javascript/jquery-validate.js')}}"></script> 
    <script src="{{asset('style/web/javascript/jquery.cookie.js')}}"></script>
    
    
    <script src="{{asset('style/web/javascript/owl.carousel.js')}}"></script>
    <script src="{{asset('style/web/javascript/jquery.flexslider-min.js')}}"></script>
    <script src="{{asset('style/web/javascript/headline.js')}}"></script>
    <script src="{{asset('style/web/javascript/parallax.js')}}"></script>
   

    <script src="{{asset('style/web/javascript/main.js')}}"></script>

    <!-- Revolution Slider -->
    <script src="{{asset('style/web/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/slider.js')}}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->    
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('style/web/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <!----->
      <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  <script>
  

        
$('#emailform').validate({
rules: {
    femail: {
required: true,
email:true
},

},
messages: {
    femail: {
required: "مطلوب  ",
email:'ادخل بريد صحيح'
}

},
submitHandler: function (form) {
       var _token = $("input[name='_token']").val();
        var email = $("input[name='femail']").val()
      

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('front.email')}}",
            type: 'POST',
            data: {_token: _token, email: email },
            success: function (data) {
               toastr.info('تم الاشتراك بنجاح');
            },
            error: function (data)
            {
                  console.log(data);
                //  toastr.options.timeOut = 1500; // 1.5s
                toastr.error('البريد مسجل بفعل ');

            }
        });

}
});
</script>
        <script>

$('#loginform').validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        email: {
            required: "البريد الالكتروني مطلوب",
            email: 'ادخل بريد الكتروني صحيح'
        },
        password: {
            required: "كلمة المرور مطلوبة",
            minlength: 'طول كلمة المرور على الاقل 6 '

        }
    },
    submitHandler: function (form) {
        var _token = $("input[name='_token']").val();
        var email = $("input[name='email']").val()
        var password = $("input[name='password']").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{url('login')}}",
            type: 'POST',
            data: {_token: _token, email: email, password: password, },
            success: function (data) {
                window.location.href = "{{route('front.index')}}";
            },
            error: function (data)
            {
                  console.log(data);
                //  toastr.options.timeOut = 1500; // 1.5s
                toastr.error('خطأ في اسم المستخدم او كلمة المرور');

            }
        });

    }
});

$('#registerform').validate({
    rules: {
         rname: {
            required: true,
           
        },
        remail: {
            required: true,
            email: true
        },
         rtel: {
            required: true,
            email: true
        },
         raddress: {
            required: true,
            email: true
        },
        password: {
            required: true,
            minlength: 6
        },
        password_confirm: {
            required: true,
            minlength: 6,
            equalTo: "#password"
        },
    },
    messages: {
         rname: {
            required: "الاسم مطلوب"
          
        },
        tel: {
            required: "الهاتف مطلوب"

        },
        address: {
            required: "العنوان مطلوب"

        },
        remail: {
            required: "البريد الالكتروني مطلوب",
            email: 'ادخل بريد الكتروني صحيح'
        },
        rpassword: {
            required: "كلمة المرور مطلوبة",
            minlength: 'طول كلمة المرور على الاقل 6 '

        },
           password_confirm: {
            required: "يرجى تاكيد كلمة المرور ",
            equalTo: "كلمة المرور غير متطابقة",
            minlength: "طول كلمة قصير يجب ان يكون 6 او كثر"

        },
    },
    submitHandler: function (form) {
        

        var _token = $("input[name='_token']").val();
          var name = $("input[name='rname']").val();
        var email = $("input[name='remail']").val()
        var password = $("input[name='rpassword']").val();
       var address = $("input[name='address']").val();
       var tel = $("input[name='tel']").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{url('register')}}",
            type: 'POST',
            data: {_token: _token, email: email, password: password,name:name,address:address,tel:tel },
            success: function (data) {
                window.location.href = "{{route('front.index')}}";
            },
            error: function (data)
            {
                console.log(data);
                var dt = '';
                $.each(data.responseJSON, function (key, value) {
                    dt = dt + '<li>' + value + '</li>';
                });
                toastr.error(dt);


            }
        });

    }
});
        </script>
      @yield('js')
</body>
</html>