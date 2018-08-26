@extends('admin.app')
@section('title', 'عرض  منتجات العملاء')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>منتجات العملاء</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>منتجات العملاء</div>
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

                        <th >المنتج </th>
                        <th >المستخدم </th>
                        <th >الحالة </th>
                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($products as $c)
                    <tr>

                        <td data-title="رقم ">{{ $co}}</td>

                        </td>
                        <td  class='noter' data-title="المنتج">{{$c->title }}

                        </td>
                        <td  class='noter' data-title="المستخدم">{{$c->user->name }}

                        </td>
                        <td  class='noter' data-title="الفرع">
                            @if($c->status==1)
                            تمت الموافقة

                            @else
                            لم تتم الموافقة
                            @endif

                        </td>
                        <td data-title="خيارات">


                            <a href="#"	value="{{route("client_products.destroy",$c)}}"
                               data-token="{{ csrf_token() }}"
                               data-id="{{ $c->id }}" 
                               class="delete-post-link"
                               > <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                            <a href="{{route("client_products.edit",$c)}}" >
                                <i class="fa fa-eye" aria-hidden="true"></i></a>
                            @if($c->status==0)
                            <a href="#"	value="{{route("clientProduct.accept",$c)}}"
                               data-token="{{ csrf_token() }}"
                               data-id="{{ $c->id }}" 
                               class="accept-post-link"
                               >موافقة
                            </a>
                            @endif


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
        text: "هل تريد حذف المنتج؟",
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
                method: 'delete',
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
$('.accept-post-link').on('click', function (e) {
    var that = this;

    swal({
        title: "هل انت متاكد",
        text: "هل تريد موافقة على المنتج؟",
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


                    swal("تم الموافقة!", "تم الموافقة  بنجاح.", "success");

                    // $(that).closest('tr').remove();


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