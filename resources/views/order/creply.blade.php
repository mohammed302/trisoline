<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>تفاصيل الطلب  </title>

        <script src="{{asset('style/orders/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('style/orders/js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('style/orders/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('style/orders/js/editor.js')}}"></script>

        <script>
$(document).ready(function () {
    $("#txtEditor").Editor();
});
$(document).submit(function () {
    $("#txtEditor").val($("#txtEditor").Editor("getText"));
});
        </script>

        <link rel="stylesheet" href="{{asset('style/orders/css/bootstrap.css')}}"/>
        <link rel="stylesheet" href="{{asset('style/orders/css/bootstrap-rtl.css')}}"/>
        <link rel="stylesheet" href="{{asset('style/orders/css/font-awesome.css')}}"/>
        <link rel="stylesheet" href="{{asset('style/orders/css/editor.css')}}"/>
        <link rel="stylesheet" href="{{asset('style/orders/css/creat.css')}}"/>


        <link href="https://fonts.googleapis.com/css?family=Amiri|Cairo|Changa" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    </head>

    <body>
        <link rel="stylesheet" href="{{asset('style/orders/css/ticks.css')}}"/>



        <div class="tics">
            <div class="container">
                <br>
                <a href="{{route('order.index')}}" rel="home">
                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                </a>
                <div class="tic-p">
                    <h1><span style="color:red"> الطلب</span></h1>
                    <div class="tit">
                        <a><span>{{$id}}#</span> 
                            @if($order->work_id!=0)
                            {{  $order->work->title}}
                            @else
                            {{$order->title}}
                            @endif



                        </a>
                        <hr>
                    </div>
                    <div class="tic-in">
                        <a>أسم المستخدم :
                            {{$order->user->name}}
                        </a><br>

                        <a>وقت الإضافة :
                            <?php Carbon\Carbon::setLocale('ar'); ?>
                            {{ Carbon\Carbon::parse($order->time)->diffForHumans() }}
                        </a>
                    </div>
                    <hr>

                    <a>تفاصيل الطلب:{{$order->message}}</a>

                    <hr>
                    @if($order->img!=null)
                    <?php $temp = explode('|', $order->img); ?>
                    <?php $i = 0 ?> 

                    @foreach($temp as $te)
                    <span class="dow"> <a href="{{asset('img/'.$te)}}" target="_blank">    الملف المرفق</a>

                    </span>
                    <br>
                    <br>
                    @endforeach
                    @endif
                    <hr>
                </div>
                <form class="form-horizontal" method="post"  id="myform"

                      action="{{route('orders.creply.post')}}" role="form" style="
                      width: 100%;
                      "   enctype="multipart/form-data" >

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
                    <div class="col-lg-12 nopadding">
                        <input type="hidden" value="{{$id}}" name="id">
                        <textarea id="txtEditor" name='reply'></textarea> 
                    </div>
                    <hr>
                    <br>
                    <div class="attachment">
                        <label class="btn btn-default btn-file">
                            <input name="imgPath" type="file" accept="image/*" >
                        </label>
                    </div>
                    <div class="att">
                        <button type="submit" class="btn btn-primary" style="
                                margin-top: 20px;
                                ">إضافة رد</button>
                    </div>
                </form>


                <hr>
                @foreach($replies as $r)
                @if($r->user_id!=0)
                <div class="@if (Auth::user()->id!=$r->user_id)ch-co @else ch-ad @endif">
                    <div class="im">
                        <a><img src="{{asset('style/orders/imag/ico.jpg')}}" width="40px" height="40px">  {{$r->user->name}}</a>
                        <a  style="float:left"> <?php Carbon\Carbon::setLocale('ar'); ?>
                            {{ Carbon\Carbon::parse($r->time)->diffForHumans() }} </a></div>
                    <hr>
                    <a><?= $r->massege ?></a>
                    <hr>
                    @if($r->img!=null)
                    الملف المرفق   <span class="dow"> |<a href="{{asset('img/'.$r->img)}}">    Download</a></span>
                    @endif
                </div>

                <hr>
                @else
                <div class="ch-ad">

                    <div class="im">
                        <a><img src="{{asset('style/orders/imag/ico.jpg')}}" width="40px" height="40px"> {{$r->emp->name}}
                            @if($r->emp->type==3)
                            <br>قسم:{{$r->emp->dep->name}}
                            @endif
                        </a>
                        <a  style="float:left"><?php Carbon\Carbon::setLocale('ar'); ?>
                            {{ Carbon\Carbon::parse($r->time)->diffForHumans() }} </a></div>
                    <hr>
                    <a><?= $r->massege ?></a>
                    <hr>
                    @if($r->img!=null)
                    الملف المرفق   <span class="dow"> |<a href="{{asset('img/'.$r->img)}}">    Download</a></span>
                    @endif
                    <hr>
                </div>

                @endif
                @endforeach



            </div>
        </div> 
    </div>




    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

    <script>


$('#order').validate({
    rules: {
        message: {
            required: true
        },
        title: {
            required: true
        },
    },
    messages: {
        message: {
            required: "المحتوى مطلوب  "

        },
        title: {
            required: "العنوان مطلوب  "

        }
    },
    submitHandler: function (form) {
        var _token = $("input[name='_token']").val();
        var msg = $(".message").val()
        var title = $("input[name='title']").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('orders.new.post')}}",
            type: 'POST',
            data: {_token: _token, message: msg, work_id: id, branch: br},
            success: function (data) {
                toastr.success('تم الطلب بنجاح');
                var msg = $(".message").val("");
            },
            error: function (data)
            {
                console.log(data);
//  toastr.options.timeOut = 1500; // 1.5s
                toastr.error('خطأ');

            }
        });

    }
});
    </script>


</body>

</html>