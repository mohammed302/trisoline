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
          </tr>
          @endforeach
            @endforeach
        </tbody>

      </table>
    </div>
 </div> 
@endsection
