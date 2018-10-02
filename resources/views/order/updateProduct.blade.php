<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>تعديل منتج  </title>

        <script src="{{asset('style/orders/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('style/orders/js/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('style/orders/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('style/orders/js/editor.js')}}"></script>

        <script>
 function extractContent(html) {

    return (new DOMParser).parseFromString(html, "text/html") . 
        documentElement . textContent;

}
$(document).ready(function () {
    //$("#txtEditor").Editor();
});
$(document).submit(function () {
 // $("#txtEditor").val($("#txtEditor").Editor("getText"));
});
$(document).ready(function () {
  //$("#txtEditor2").Editor();
 
   //  $("#txtEditor2").Editor("setText",'{{strip_tags($product->description_en)}}');
});
$(document).submit(function () {
   // $("#txtEditor2").val($("#txtEditor").Editor("getText"));
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
            <a href="{{route('orders.index')}}" rel="home" style="
               margin-right: 24px;
               ">
                <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
            </a>
            <div class="hed">  
                <h1>تعديل  <span style="color:red"> منتج </span></h1>
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
                
                  <?php $temp  = explode('|',$product->img );?>
       <?php $i=0?> 
        
  
    @foreach($temp as $te)
 <div class="col-lg-6 col-md-6 col-sm-12 imgbox" style="
    margin-bottom: 20px;
">
   <div class="portfolio-box">
            <?php   $info = pathinfo(asset('img/'.$te))?>
@if ($info["extension"] == "mp4" )
<video controls  style="width: 100%; height: 300px;">
    <source src="{{asset('img/'.$te)}}" type="video/mp4">

  Your browser does not support HTML5 video.
</video>
@else
     <img src="{{asset('img/'.$te)}}"  style="height: 150px;width: 200px" class="img1 img-responsive">
@endif
   
    <div class="portfolio-box-caption">
        <div class="portfolio-box-caption-content">
            <form action="{{route('img.delete',$te)}}" method="get">

                {!! csrf_field() !!}
                <input type="hidden"  name="post_id" value="{{$product->id}}"/>
             
                <button type="submit" class="btn btn-danger"  name="submit{{$i}}">حذف</button>
            </form>
         </div>
        </div>
      </div>
     </div>
 
    <?php $i++;?>
@endforeach
                <form id="order" class="contactform style4 clearfix" method="post" 
                      action="{{route('orders.new_product.update',$product->id)}}" 
                      enctype="multipart/form-data"  >
                    {!! csrf_field() !!}
                    <div class="row">           
                        <div class="open col-lg-12 nopadding ">

                            <input type="text" class="form-control" name="title" value="{{$product->title}}"  placeholder="العنوان">  


                        </div>
                        <div class="open col-lg-12 nopadding ">

                            <input type="text" class="form-control" name="title_e" value="{{$product->title_e}}"  placeholder="العنوان بالانجليزي">  


                        </div>
                           <div class="open col-lg-12 nopadding ">

                            <select class="form-control" name="branch">

                                <option value="1" @if($product->branch==1) selected="" @endif>السعودية</option>
                                <option value="2" @if($product->branch==2) selected="" @endif>الصين</option>
                                <option value="3" @if($product->branch==3) selected="" @endif>تركيا</option>
                            </select>


                        </div>
                        <div class="col-lg-12 nopadding">
                            <textarea id="txtEditor" class="message" value="" name="desc"style="
    width: 100%;
    height: 200px;
">{{strip_tags($product->description)}}</textarea> 
                        </div>
                        <div class="col-lg-12 nopadding">
                            <textarea id="txtEditor2" class="message" value=""  name="endesc"style="
    width: 100%;
    height: 200px;
">{{strip_tags($product->description_en)}}</textarea> 
                        </div>
                                                  
                        <div class=" col-lg-12 attachment">
                            <label class="btn btn-default btn-file">
                                <input type="file" name="imgPath[]"  multiple>

                            </label>
                            <button class="add_more">  اضافة ملف أخر</button>
                        </div>



                        <div class="op col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary" name="submit">
                                <i class="fa fa-btn fa-ticket"></i> تعديل 
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

$('.add_more').click(function (e) {
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
         message_e: {
            required: true
        },
        title_e: {
            required: true
        },
    },
    messages: {
        message: {
            required: "المحتوى مطلوب  "

        },
        title: {
            required: "العنوان مطلوب  "

        },
          message_e: {
            required: "المحتوى مطلوب  "

        },
        title_e: {
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