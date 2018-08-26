@extends('front_en.app')
@section('title', '| order ')
@section('content')
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">Order</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}"> Home</a></li>
                            <li>  order</li>
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
                        <h1 class="title">  {{$order->work->title_e}}</h1>

                        {{$order->message}}
                    </div>
                    @foreach($replies as $r)
                        @if($r->user_id==0)
                    <div class="mcontainer">
                        <img src="{{asset('img/av.png')}}" alt="Avatar" style="width:100%;">
                        <p>{{$r->massege}}</p>
                        <span class="time-right">
                            {{ Carbon\Carbon::parse($r->time)->diffForHumans() }}</span>
                    </div>
@else
                    <div class="mcontainer darker">
                        <img src="{{asset('img/av.png')}}" alt="Avatar" class="right" style="width:100%;">
                        <p>  <p>{{$r->massege}}</p></p>
                        <span class="time-left">
                            {{ Carbon\Carbon::parse($r->time)->diffForHumans() }}</span>
                    </div>
                        @endif
@endforeach
                </div>
                <form class="form-horizontal" method="post"  id="myform"

                      action="{{route('fronten.reply.post')}}" role="form" style="
    width: 100%;
">

                    {!! csrf_field() !!}
                    <div class="flash-message">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))

                                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            @endif
                        @endforeach
                    </div>
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
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">
Reply

                            </label>
                            <div class="col-md-9">
                                <input type="hidden" value="{{$id}}" name="id">
                                <textarea name="reply" cols="40" rows="5"  required=""></textarea>

                            </div>
                        </div>



                    </div>







                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-5 col-md-9 text-center">
                                <button type="submit" class="btn blue">Add</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



@endsection

