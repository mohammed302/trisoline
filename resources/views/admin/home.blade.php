@extends('admin.app')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}"> </a>
    </li>
    <li>الرئيسية</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <!-- BEGIN PAGE BASE CONTENT -->
    <!-- BEGIN DASHBOARD STATS 1-->
    <div class="row">
        @if(Auth::user()->type==1)
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 blue">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$users}}">0</span>
                    </div>
                    <div class="desc">المستخدمين </div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 red">
                <div class="visual">
                    <i class="fa fa-book"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$works}}">0</span></div>
                    <div class="desc">الأعمال</div>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2  purple">
                <div class="visual">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$orders}}">0</span></div>
                    <div class="desc">الطلبات</div>
                </div>

            </div>
        </div>
      
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 green">
                <div class="visual">
                    <i class="fa fa-map"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$prodicts}}">0</span></div>
                    <div class="desc">منتجات لم تتم الموافقة عليها</div>
                </div>

            </div>
        </div>
     
        @elseif(Auth::user()->type==2)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 red">
                <div class="visual">
                    <i class="fa fa-book"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$works}}">0</span></div>
                    <div class="desc">
                        @if(Auth::user()->type==2)

  @if(Auth::user()->branch==1)
                              المنتجات
                              @elseif(Auth::user()->branch==2)
                              المنتجات
                              @else
                             الأعمال
                              @endif
@endif
                        
                        </div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2  purple">
                <div class="visual">
                    <i class="fa fa-file-text-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$orders}}">0</span></div>
                    <div class="desc">الطلبات</div>
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="dashboard-stat dashboard-stat-v2 green">
                <div class="visual">
                    <i class="fa fa-map"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span class="counter" data-counter="counterup" data-value="{{$offers}}">0</span></div>
                    <div class="desc">العروض</div>
                </div>

            </div>
        </div>
        @endif
    </div>
    <div class="row">

        <div class="col-md-6 col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase"> أخر الردود</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto;
                         height: auto;"><div class="scroller" style="height: auto; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                            <ul class="feeds">
                                @foreach($replies as $r)
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc"><?= $r->massege ?>
                                                    من : 
                                                    @if($r->user_id!=0)
                                                    {{$r->user->name}}
                                                    @else
                                                    {{$r->emp->name}}
                                                    @endif
                                                    طلب رقم   :
                                                    <a href='{{route("admin.replies",$r->order_id)}}'>{{$r->order_id}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">    <?php Carbon\Carbon::setLocale('ar'); ?>
                                            {{ Carbon\Carbon::parse($r->time)->diffForHumans() }} </div>
                                    </div>
                                </li>

                                @endforeach


                            </ul>
                        </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px; height: 161.002px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; left: 1px;"></div></div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-blue"></i>
                        <span class="caption-subject font-blue bold uppercase"> أخر الطلبات</span>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="slimScrollDiv" 
                         style="position: relative; overflow: hidden; width: auto; height: auto;">
                        <div class="scroller" style="height: auto; overflow: hidden; width: auto;" data-always-visible="1" data-rail-visible="0" data-initialized="1">
                            <ul class="feeds">
                                @foreach($borders as $r)
                                <li>
                                    <div class="col1">
                                        <div class="cont">
                                            <div class="cont-col1">
                                                <div class="label label-sm label-info">
                                                    <i class="fa fa-check"></i>
                                                </div>
                                            </div>
                                            <div class="cont-col2">
                                                <div class="desc">
                                                    @if($r->work_id!=0)                        

                                                    <a href='{{route("admin.replies",$r->id)}}'>{{$r->work->title}}</a>
                                                    رقم الطلب
                                                    {{$r->id}}
                                                    @else
                                                    <a href='{{route("admin.replies",$r->id)}}'>{{$r->title}}</a>

                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col2">
                                        <div class="date">    الطلب عند:
                                            @if($r->emp_id!=0)
                                            {{$r->emp->name}}
                                            @else
                                            الإدارة
                                            @endif

                                        </div>
                                    </div>
                                </li>

                                @endforeach


                            </ul>
                        </div><div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px; height: 161.002px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; left: 1px;"></div></div>

                </div>
            </div>
        </div>


    </div>
    @endsection
