@extends('front.app')
@section('title', ' | اعادة تعيين كلمة المرور')
@section('content')
<!-- Content-->



<div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">  إعادة تعيين كلمة المرور </h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الصفحة الرئيسة</a></li>
                            <li>إعادة تعيين كلمة المرور</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 
    <br>
    <br>
<!-- Content
================================================== -->
    <section class="flat-row padingbotom">
<div class="container ">

    <!-- Submit Page -->
    <div class="sixteen columns">
        <div class="my-account" style="margin-top:30px !important;">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <span class="notification-item notification notice closeable">{{ Session::get('alert-' . $msg) }} </span>
                </p>
                @endif
                @endforeach
            </div>
            <form class="login"role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">


                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="password1">البريد الالكتروني:
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </label>
                   </div>
                  <div class="form-group">
                    <label for="password1">كلمة المرور الجديدة:
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </label>
                  </div>

               <div class="form-group">
                    <label for="password2">تكرار كلمة المرور:
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </label>
               </div>

               <div class="form-group">
                    <input type="submit" style="height:54px;" class="button border fw margin-top-10" name="login" value="تحديث" />
               </div>

            </form>

        </div>
    </div>

</div>
    </section>
@endsection

