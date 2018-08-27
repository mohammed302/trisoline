@extends('order_en.app')

@section('content')

 <div class="tick">   
      
      <div class="container">
        <a href="{{route('orders_en.index')}}" rel="home">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
          <h1><span style="color:red">  Order </span></h1>
          <table class="table table-bordered table-hover">

        <thead >
          <tr class="bar">
                 <th>number</th>
            <th>title</th>
            <th>replies</th>
          <th>status</th>
            <th> last update </th>
               <th> close</th>
          </tr>
        </thead>

        <tbody>
          @foreach($orders as $o)  
          @foreach($o->clinet_orders as $co)
         
          <tr>
                <td>{{$co->id}}</td>
              <td>
                  <a href="{{route('orders_en.creplies',$co->id)}}">
                
                {{  $co->work->title_e}}
                
                  </a> 
              </td>
            <td>{{$co->replies->count()}}</td>
            <td>
                @if($co->status==0)
               opened
                @else
                closed
                @endif
                
            </td>
            <td>
                <?php $t=$co->replies->last();
                $c=$co->replies->count();
                ?>
               
                @if($c>0)
                
                            {{ Carbon\Carbon::parse($t['time'])->diffForHumans() }}
                          @else
                          {{ Carbon\Carbon::parse($co->created_at)->diffForHumans() }}
                          @endif
                            </span>
              </td>
               <td> <a href="#"	value="{{route("orders_en.close",$co->id)}}"
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
        title: "are you sure  ",
     
  text: "close order؟",



        
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
     
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


                    swal("done !", "done.", "success");

                  //  $(that).closest('tr').remove();


                }

            });
        } else {
            //   t=1;
            swal("cancelء", "cancel", "error");


        }
    }
    );




});
</script>
@endsection

