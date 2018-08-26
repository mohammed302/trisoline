@extends('admin.app')
@section('title', 'عرض  الطلب')
@section('breadcrumb')
<link rel="stylesheet" href="{{asset('style/orders/css/creat.css')}}"/>
<link rel="stylesheet" href="{{asset('style/orders/css/ticks.css')}}"/>
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>عرض الطلب</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content order">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>عرض الطلب</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
            <form class="form-horizontal" method="post"  id="myform"
                  enctype="multipart/form-data" 
                  action="{{route('admin.reply.post')}}" role="form" >

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
                            الرد

                        </label>
                        <div class="col-md-9">
                            <input type="hidden" value="{{$id}}" name="id">
                            <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                            <textarea name="reply" placeholder=""  ></textarea>
                            <script>
CKEDITOR.replace('reply');
                            </script>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            الملف

                        </label>
                        <div class="col-md-9">
                            <input name="imgPath" type="file" accept="image/*" >

                        </div>
                    </div>


                </div>







                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn blue">إضافة</button>

                        </div>
                    </div>
                </div>
            </form>
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

                <a>تفاصيل الطلب :<?php echo $order->message;?></a>

                <hr>
                @if($order->img!=null)
                 <?php $temp  = explode('|',$order->img );?>
       <?php $i=0?> 
        
       @foreach($temp as $te)
       <span class="dow"> |<a href="{{asset('img/'.$te)}}" target="_blank">    الملف المرفق</a>
                
                </span>
       @endforeach
                @endif
                <hr>
            </div>
            <br>
            <br>
            @foreach($replies as $r)
            @if($r->user_id!=0)
            <div class="ch-co">
                <div class="im">
                    <a><img src="{{asset('style/orders/imag/ico.jpg')}}" width="40px" height="40px">  {{$r->user->name}}</a>
                    <a  style="float:left"> <?php Carbon\Carbon::setLocale('ar'); ?>
                        {{ Carbon\Carbon::parse($r->time)->diffForHumans() }} </a></div>
                <hr>
                <a><?php echo $r->massege ?></a>
                <hr>
                @if($r->img!=null)
                <span class="dow"> |<a href="{{asset('img/'.$r->img)}}">     الملف المرفق</a></span>
                @endif
            </div>

            <hr>
            @else
            <div class="ch-ad">

                <div class="im">
                    <a><img src="{{asset('style/orders/imag/ico.jpg')}}" width="40px" height="40px"> {{$r->emp->name}}</a>
                    <a  style="float:left"><?php Carbon\Carbon::setLocale('ar'); ?>
                        {{ Carbon\Carbon::parse($r->time)->diffForHumans() }} </a></div>
                <hr>
                <a><?= $r->massege ?></a>
                <hr>
                @if($r->img!=null)
                <span class="dow"> |<a href="{{asset('img/'.$r->img)}}" target="_blank">     الملف المرفق</a></span>
                @endif

                <hr>
            </div>

            @endif
            @endforeach

            <!--  
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
  
                          <th >رقم </th>
                          <th >الرد </th>
                          <th >المستخدم </th>
                          <th >التاريخ </th>
  
                         
  
                        
                      </tr>
                  </thead>
  
                  <tbody>
            <?php $co = 1; ?>
                      @foreach($replies as $c)
                      <tr>
  
                          <td data-title="رقم ">{{ $co}}</td>
                          <td  class='noter' data-title="الرد">
                              {{$c->massege}}
                          </td>
  
                          <td  class='noter' data-title="السمتخدم">
                              @if ($c->user_id!=0)
                           
                              {{$c->user->name}}
                              @else
                              الإدارة
                              @endif
                          </td>
                          <td  class='noter' data-title="التاريخ">
            <?php Carbon\Carbon::setLocale('ar'); ?>
                      {{ Carbon\Carbon::parse($c->time)->diffForHumans() }}
                          </td>
                     
                      </tr>
            <?php $co++; ?>
                      @endforeach  
                  </tbody>
              </table>-->
        </div>
    </div>
</div>
@endsection
@section('js')


<script>
    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "Value must not equal arg.");
    $('#myform').validate({
        errorElement: 'span', //default input error message container

        errorClass: 'help-block', // default input error message class

        focusInvalid: false, // do not focus the last invalid input

        ignore: "",
        rules: {
            reply: {
                required: true


            },
        },
        messages: {// custom messages for radio buttons and checkboxes

            reply: {
                required: "يرجى ادخال   الرد "

            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   



        },
        highlight: function (element) { // hightlight error inputs

            $(element)

                    .closest('.form-group').addClass('has-error'); // set error class to the control group

        },
        success: function (label) {

            label.closest('.form-group').removeClass('has-error');

            label.remove();

        },
        errorPlacement: function (error, element) {

            if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  

                error.insertAfter($('#register_tnc_error'));

            } else if (element.closest('.input-icon').size() === 1) {

                error.insertAfter(element.closest('.input-icon'));

            } else {

                error.insertAfter(element);

            }

        },
        submitHandler: function (form) {

            form.submit();

        }

    });
//just for the demos, avoids form submit

    $("#myform22").validate({
        rules: {
            field: {
                required: true,
                minlength: 5
            }
        }
    });

</script>
@endsection
