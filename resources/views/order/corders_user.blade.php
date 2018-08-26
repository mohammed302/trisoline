@extends('order.app')

@section('content')

 <div class="tick">   
      
      <div class="container">
        <a href="{{route('orders.index')}}" rel="home">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
          <h1>قسم<span style="color:red"> طلبات المنتجات</span></h1>
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
          @foreach($orders as $co)  
   
         
          <tr>
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
          </tr>
          @endforeach
           
        </tbody>

      </table>
    </div>
 </div> 
@endsection
