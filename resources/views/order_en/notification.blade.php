@extends('order_en.app')

@section('content')


<!-- Start Header -->
<div class="main">
    <div class="overlay">
        <div class="container table">
            <div class="row-table">
                <div class="intro text-center">
                    <br>

                    <a href="{{route('orders_en.index')}}" rel="home " style="float: right;">
                        <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                    </a>

                    <h1>  <span style="color:red">  notifications  </span></h1>
                 
                    @foreach($notification as $n)
                    <div class="alert alert-info">
                       {{$n->content_e}}
                    </div>
                    @endforeach
                   {{$notification->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header -->
@endsection
