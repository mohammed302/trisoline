<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>طلب جديدة </title>

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

        <div class="header">
            <br>
            <a href="{{route('front.index')}}" rel="home" style="
               margin-right: 24px;
               ">
                <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
            </a>
            <div class="hed">  
                <h1>طلب  <span style="color:red"> جديد </span></h1>
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
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>
            <div class="container">
                <form id="order" class="contactform style4 clearfix" method="post" action="{{route('orders.new.post')}}" 
                      enctype="multipart/form-data"   >
                    {!! csrf_field() !!}
                    <div class="row">           
                        <div class="open col-lg-12 nopadding ">

                            <input type="text" class="form-control" name="title"  placeholder="العنوان">  


                        </div>
                        <div class="open col-lg-12 nopadding ">

                            <select class="form-control" name="branch">

                                <option value="1">الرياض</option>
                                <option value="2">الصين</option>
                                <option value="3">تركيا</option>
                            </select>


                        </div>
                        <div class="col-lg-12 nopadding">
                            <textarea id="txtEditor" class="message" name="message"></textarea> 
                        </div>

                        <div class="attachment">
                            <label class="btn btn-default btn-file">
                                <input type="file" name="imgPath[]"  required="" multiple>
                                 
                            </label>
                               <button class="add_more">  اضافة ملف أخر</button>
                        </div>



                        <div class="op col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-ticket"></i> فتح الطلب  
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

        <script>

$('.add_more').click(function(e){
        e.preventDefault();
        $(this).before(" <br><label class='btn btn-default btn-file'><input name='imgPath[]' type='file' /> </label>");
    });
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