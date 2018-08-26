@extends('front_en.app')
@section('title', '| '.$new->title_e)
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">{{$new->title_e}} </h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                            <li>News Details </li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <!-- Services Details -->
    <section class="flat-row services-details">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="item-wrap">
                        <div class="item item-details">
                            <div class="featured-item">
                                <img src="{{asset('img/thumbnail/'.$new->img)}}" alt="image">
                            </div><!-- /.feature-post -->
                            <div class="content-item">
<h4>   
  {{$new->created_at->todatestring()}}
</h4>
         
                                <h2 class="title-item">{{$new->title_e}}</h2>
                                <p><?=$new->description_e?></p>
                            </div><!-- /.content-item -->
                        </div><!-- /.item -->

                    </div><!-- /.item-wrap -->
                </div><!-- /.Col-lg-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>



@endsection