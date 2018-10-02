@extends('front_en.app')
@section('title', '| How to   ')
@section('content')

<div class="page-title parallax parallax1">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">How to </h1>
                </div><!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                        <li>How to  </li>
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
                    <h1 class="title ">How to </h1>
                </div>
                <p class="text-center"><?=$about_us->descriptione_en?>
           </p>
            </div>

        </div>
    </div>
</section>
@endsection