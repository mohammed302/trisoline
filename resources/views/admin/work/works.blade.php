@extends('admin.app')
@section('title', 'عرض  الأعمال')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li> @if(Auth::user()->branch==1 || Auth::user()->branch==2 )
المنتجات
@else
 الاعمال
 @endif</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>@if(Auth::user()->branch==1 || Auth::user()->branch==2 )
المنتجات
@else
 الاعمال
 @endif</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
            <a href="{{ Route('works.create')}}" class="btn blue">إضافة</a>
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

                        <th >@if(Auth::user()->branch==1 || Auth::user()->branch==2 )
المنتج
@else
 العمل
 @endif </th>
                        <th >الفرع </th>
                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($works as $c)
                    <tr>

                        <td data-title="رقم ">{{ $co}}</td>
                           
                        <td  class='noter' data-title="العمل">{{$c->title }}

                        </td>

                        <td  class='noter' data-title="الفرع">
                            @if($c->branch==1)
                            الرياض
                            @elseif($c->branch==2)
                            الصين
                            @else
                            تركيا
                            @endif

                        </td>
                        <td data-title="خيارات">


                            <a href="#"	value="{{route("works.destroy",$c)}}"
                               data-token="{{ csrf_token() }}"
                               data-id="{{ $c->id }}" 
                               class="delete-post-link"
                               > <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                            <a href="{{route("works.edit",$c)}}" >
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>




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
        @if(Auth::user()->branch==1 || Auth::user()->branch==2 )
text: "هل تريد حذف المنتج؟",
@else
 text: "هل تريد حذف العمل؟",
 @endif 
        
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
</script>
@endsection