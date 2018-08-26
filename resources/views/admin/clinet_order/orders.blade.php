@extends('admin.app')
@section('title', 'عرض  طلبات العملاء')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>طلبات العملاء</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>طلبات العملاء</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">

            <br>
            <br>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>  
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th >رقم </th>
                          <th >رقم الطلب </th>
                        <th >الطلب </th>
                        <th >المستخدم </th>
                        <th >المحتوى </th>
                      

                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($orders as $c)
                    <tr>

                        <td data-title="رقم ">{{ $co}}</td>
                          <td data-title="رقم ">{{ $c->id}}</td>
                        <td  class='noter' data-title="الطلب">
                            
                      
                                                   
                                                    {{$c->work->title}}

                        </td>

                        <td  class='noter' data-title="السمتخدم">
                            {{$c->user->name}}
                        </td>
                        <td  class='noter' data-title="المحتوى">{{$c->message }}

                        </td>

                

                        <td data-title="خيارات">


                            <a href="{{route("clinet.order.replies",$c)}}"	
                               > <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>

                  
  <a	href="#"  value='{{route("clinet.order.destroy",["id" =>$c])}}'
                               data-token="{{ csrf_token() }}"
                               data-id="{{ $c->id }}" 
                               class="delete-post-link"
                               > <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $co++; ?>
                    @endforeach  
                </tbody>
            </table></div>
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
        text: "هل تريد حذف الطلب؟",
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

                    $(that).closest('tr').remove();


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
