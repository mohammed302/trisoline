@extends('order_en.app')

@section('content')


<!-- Start Header -->
<div class="main">
    <div class="overlay">
        <div class="container table">
            <div class="row-table">
                <div class="intro text-center">
                    <br>

                    <a href="{{route('orders_en.index')}}" rel="home " style="float: left;">
                        <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                    </a>

                    <h1>  <span style="color:red">  Panel</span></h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dash-box dash-box-color-1">
                                    <div class="dash-box-icon">
                                        <i class="glyphicon glyphicon-cloud"></i>
                                    </div>
                                    <div class="dash-box-body">
                                        <span class="dash-box-count">{{$allproduct}}</span>
                                        <span class="dash-box-title"> my product</span>
                                    </div>

                                    <div class="dash-box-action">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dash-box dash-box-color-2">
                                    <div class="dash-box-icon">
                                        <i class="glyphicon glyphicon-download"></i>
                                    </div>
                                    <div class="dash-box-body">
                                        <span class="dash-box-count">{{$acceptproduct}}</span>
                                        <span class="dash-box-title"> product not accept   </span>
                                    </div>

                                    <div class="dash-box-action">

                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <a href="{{route('orders_en.notification')}}">
                                <div class="dash-box dash-box-color-3">
                                    <div class="dash-box-icon">
                                        <i class="glyphicon glyphicon-heart"></i>
                                    </div>
                                    <div class="dash-box-body">
                                        <span class="dash-box-count">{{$notification}}</span>
                                        <span class="dash-box-title"> notification </span>
                                    </div>

                                    <div class="dash-box-action">

                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="button-m">
                        <a  href="{{route('orders_en.new')}}" class="btn btn-default" role="button"> new order </a>
                        <a  href="{{route('orders_en.myoreders')}}" class="btn btn-default" role="button">orders </a>
                        <a  href="{{route('orders_en.mycoreders_user')}}" class="btn btn-default" role="button">order Products</a>
                        <a  href="{{route('orders_en.clinet_product')}}" class="btn btn-default" role="button">my product </a>

                        <a  href="{{route('orders_en.mycoreders')}}" class="btn btn-default" role="button"> order to my product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
@endsection
