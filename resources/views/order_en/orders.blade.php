@extends('order_en.app')

@section('content')

 <div class="tick">   
      
      <div class="container">
        <a href="{{route('fronten.index')}}" rel="home">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
          <h1><span style="color:red"> ORDERS</span></h1>
          <table class="table table-bordered table-hover">

        <thead >
          <tr class="bar">
            <th>title</th>
            <th>replies</th>
            <th>status</th>
            <th>last update </th>
          </tr>
        </thead>

        <tbody>
          @foreach($orders as $o)  
          <tr>
              <td>
                  <a href="{{route('orders_en.replies',$o->id)}}">
                  @if($o->work_id!=0)
                {{  $o->work->title}}
                  @else
                 {{ $o->title}}
                  @endif
                  </a> 
              </td>
            <td>{{$o->replies->count()}}</td>
            <td>
                @if($o->status==0)
                opened
                @else
                closed
                @endif
                
            </td>
            <td>
                <?php $t=$o->replies->last();
                $c=$o->replies->count();
                ?>
               
                @if($c>0)
                
                            {{ Carbon\Carbon::parse($t['time'])->diffForHumans() }}
                          @else
                          {{ Carbon\Carbon::parse($o->created_at)->diffForHumans() }}
                          @endif
                            </span>
              </td>
          </tr>
          @endforeach
        </tbody>

      </table>
    </div>
 </div> 
@endsection
