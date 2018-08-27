@extends('order.app')

@section('content')

<div class="tick">   

    <div class="container">
        <a href="{{route('orders.index')}}" rel="home">
            <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
        </a>
        <h1>قسم<span style="color:red"> منتجاتي</span></h1>
            <div class="button-m">  
        <a  href="{{route('orders.new_product')}}" class="btn btn-default" role="button">اضافة منتج جديد </a>
            </div>
        <table class="table table-bordered table-hover">

            <thead >
                <tr class="bar">
                    <th>المنتج</th>
                    <th>الحالة</th>
                    <th>أخر تحديث</th>
                    <th> خيارات</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $p)  
                <tr>
                    <td>
                        {{$p->title}}
                    </td>
                    <td> @if($p->status==0 || $p->status==2)
                        لم تتم الموافقة
                        @else
                        تمت الموافقة
                        @endif</td>
                    <td>
                          <?php Carbon\Carbon::setLocale('ar'); ?>
                        {{ Carbon\Carbon::parse($p->created_at)->diffForHumans() }}

                    </td>
                    <td>
                        <a href="#"	value="{{route("orders.new_product.destroy",$p)}}"
                           data-token="{{ csrf_token() }}"
                           data-id="{{ $p->id }}" 
                           class="delete-post-link"
                           > <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                     <!--   <a href="{{route("works.edit",$p)}}" >
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>-->
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div> 
@endsection
@section('js')
<meta name="_token" content="{{ csrf_token() }}" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" type="text/css" />
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
