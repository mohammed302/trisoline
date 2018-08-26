@extends('front.app')
@section('title', '| الشروط والقوانين  ')
@section('content')
<div class="page-title parallax parallax1">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">الشروط والقوانين</h1>
                </div><!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الرئيسية</a></li>
                        <li>الشروط والقوانين</li>
                    </ul>
                </div><!-- /.breadcrumbs -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.page-title -->


<br><br>

<section class="flat-row padingbotom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 history-text">
                <div class="title-section style3 left">
                    <h1 class="title"> الشروط والقوانين</h1>
                </div>
                <p>
                    <?=$term->descriptione?>
          </p>
            </div>

        </div>
    </div>
</section>
    @endsection