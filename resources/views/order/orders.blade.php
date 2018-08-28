@extends('order.app')

@section('content')

 <div class="tick">   
      
      <div class="container">
        <a href="{{route('orders.index')}}" rel="home">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
          <h1>قسم<span style="color:red"> التذاكر</span></h1>
          <table class="table table-bordered table-hover">

        <thead >
          <tr class="bar">
            <th>الموضوع</th>
            <th>الردود</th>
            <th>الحالة</th>
            <th>أخر تحديث</th>
          </tr>
        </thead>

        <tbody>
          @foreach($orders as $o)  
          <tr>
              <td>
                  <a href="{{route('orders.replies',$o->id)}}">
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
                مفتوح
                @else
                جاهز
                @endif
                
            </td>
            <td>
                <?php $t=$o->replies->last();
                $c=$o->replies->count();
                ?>
                 <?php Carbon\Carbon::setLocale('ar'); ?>
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
