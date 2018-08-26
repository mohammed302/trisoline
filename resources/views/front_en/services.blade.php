@extends('front_en.app')
@section('title', '| Services  ')
@section('content')
   <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">Services</h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                            <li>Services</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 

    <!-- Services item -->
    <section class="flat-row section-iconbox padding2 bg-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-section style3 text-center">
                        <h1 class="title">Services</h1>
                    </div>
                </div>
               
            </div>
            <div class="row">
             @foreach($services as $service)
                <div class="col-lg-4">
                    <div class="iconbox style3 box-shadow2">
                        <div class="box-header">
                            <div class="box-icon">
                                <i class="ti-desktop"></i>
                            </div>
                        </div>
                        <div class="box-content">
                            <h5  class="box-title">{{$service->title_e}}</h5>  
                            <p> {{$service->descriptione_en}}</p> 
                        </div>
                    </div>     
                </div> 
                 @endforeach
            </div>  
        </div>
    </section> 

    @endsection