@extends('front_en.app')
@section('title', '| Trems   ')
@section('content')
<div class="page-title parallax parallax1">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="title">Trems</h1>
                </div><!-- /.page-title-captions -->
                <div class="breadcrumbs">
                    <ul>
                        <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home</a></li>
                        <li>Trems</li>
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
                    <h1 class="title"> Trems </h1>
                </div>
                <p>
                    <?=$term->descriptione_en?>
          </p>
            </div>

        </div>
    </div>
</section>
    @endsection