@extends('front.app')
@section('title', '| من نحن  ')
@section('content')

<div class="page-title parallax parallax1">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">من نحن</h1>
                </div><!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الصفحة الرئيسية</a></li>
                        <li>من نحن</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->

<br>
<br>
<section class="flat-row padingbotom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 history-text text-center">
                <div class="title-section style3 text-center">
                    <h1 class="title ">من نحن</h1>
                </div>
                <p class="text-center"><?=$about_us->descriptione?>
           </p>
            </div>

        </div>
    </div>
</section>
@endsection