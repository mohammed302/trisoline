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
                  action="{{route('clinet.order.creply.post')}}" role="form" >

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
            <div class="ch-co ch">
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
                <a	href="#"  value='{{route("clinet.order.destroy_replay",["id" =>$r])}}'
                               data-token="{{ csrf_token() }}"
                               data-id="{{ $r->id }}" 
                               class="delete-post-link"
                               > <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
            </div>

            <hr>
            @else
            <div class="ch-ad ch">

                <div class="im">
                    <a><img src="{{asset('style/orders/imag/ico.jpg')}}" width="40px" height="40px"> الادارة</a>
                    <a  style="float:left"><?php Carbon\Carbon::setLocale('ar'); ?>
                        {{ Carbon\Carbon::parse($r->time)->diffForHumans() }} </a></div>
                <hr>
                <a><?= $r->massege ?></a>
                <hr>
                @if($r->img!=null)
                <span class="dow"> |<a href="{{asset('img/'.$r->img)}}" target="_blank">     الملف المرفق</a></span>
                @endif
                     <a	href="#"  value='{{route("clinet.order.destroy_replay",["id" =>$r])}}'
                               data-token="{{ csrf_token() }}"
                               data-id="{{ $r->id }}" 
                               class="delete-post-link"
                               > <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
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



<meta name="_token" content="{{ csrf_token() }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
$('.delete-post-link').on('click', function (e) {
    var that = this;

    swal({
        title: "هل انت متاكد",
        text: "هل تريد حذف الرسالة؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
        confirmButtonText: "نعم!",
        cancelButtonText: "لا!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {


            $.ajax({
                method: 'get',
                url: $(that).attr('value'),
                data: {
                    _token: $(that).data('token')
                },
                success: function (data) {


                    swal("تم الحذف!", "تم حذف  بنجاح.", "success");

                    $(that).closest('.ch').remove();


                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء الحذف", "error");


        }
    }
    );




});
</script>
@endsection


