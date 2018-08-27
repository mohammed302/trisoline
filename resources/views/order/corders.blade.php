@extends('order.app')

@section('content')

 <div class="tick">   
      
      <div class="container">
        <a href="{{route('orders.index')}}" rel="home">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
          <h1>قسم<span style="color:red"> طلبات منتجاتي</span></h1>
          <table class="table table-bordered table-hover">

        <thead >
          <tr class="bar">
             <th>رقم الطلب</th>
            <th>الموضوع</th>
            <th>الردود</th>
             <th>الحالة</th>
            <th>أخر تحديث</th>
            <th> اغلاق</th>
          </tr>
        </thead>

        <tbody>
          @foreach($orders as $o)  
          @foreach($o->clinet_orders as $co)
         
          <tr>
                   <td>{{$co->id}}</td>
              <td>
                  <a href="{{route('orders.creplies',$co->id)}}">
                
                {{  $co->work->title}}
                
                  </a> 
              </td>
            <td>{{$co->replies->count()}}</td>
            <td>
                @if($co->status==0)
                مفتوح
                @else
                جاهز
                @endif
                
            </td>
            <td>
                <?php $t=$co->replies->last();
                $c=$co->replies->count();
                ?>
                 <?php Carbon\Carbon::setLocale('ar'); ?>
                @if($c>0)
                
                            {{ Carbon\Carbon::parse($t['time'])->diffForHumans() }}
                          @else
                          {{ Carbon\Carbon::parse($co->created_at)->diffForHumans() }}
                          @endif
                            </span>
              </td>
                </td>
                <td> <a href="#"	value="{{route("orders.close",$co->id)}}"
                           data-token="{{ csrf_token() }}"
                           data-id="{{ $co->id }}" 
                           class="delete-post-link"
                           > <i class="fa fa-close" aria-hidden="true"></i>
                        </a></td>
          </tr>
          @endforeach
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
     
  text: "هل تريد اغلاق الطلب؟",



        
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


                    swal("تم !", "تم  بنجاح.", "success");

                  //  $(that).closest('tr').remove();


                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء الاغلاق", "error");


        }
    }
    );




});
</script>
@endsection
