@extends('admin.app')
@section('title', 'عرض  السجل')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>السجل</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>السجل</div>
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
                        <th >الاسم</th>
                        <th >العملية</th>
                        <th >التاريخ</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($logs as $c)
                    <tr>

                        <td data-title="رقم ">{{ $co}}</td>
                        <td data-title="الاسم ">
                            @if($c->user_id!=0)
                            
                            {{ $c->user->name}}
                        @else
                        مدير الموقع
                        @endif
                        
                        </td>
                        <td  class='noter' data-title="العملية">{{$c->name }}
                        <td  class='noter' data-title="التاريخ">{{$c->created_at }}

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


@endsection