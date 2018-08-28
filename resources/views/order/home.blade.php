@extends('order.app')

@section('content')


 <!-- Start Header -->
        <div class="main">
          <div class="overlay">
            <div class="container table">
              <div class="row-table">
               <div class="intro text-center">
<br>

                <a href="{{route('orders.index')}}" rel="home " style="float: right;">
                                    <img src="{{ asset('img/'.$setting->logo)}}" alt="image">
                                </a>
                   
                <h1>  <span style="color:red">  لوحة تحكم </span></h1>
             <div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="dash-box dash-box-color-1">
				<div class="dash-box-icon">
					<i class="glyphicon glyphicon-cloud"></i>
				</div>
				<div class="dash-box-body">
					<span class="dash-box-count">{{$allproduct}}</span>
					<span class="dash-box-title"> منتجاتي</span>
				</div>
				
				<div class="dash-box-action">
					
				</div>				
			</div>
		</div>
		<div class="col-md-4">
			<div class="dash-box dash-box-color-2">
				<div class="dash-box-icon">
					<i class="glyphicon glyphicon-download"></i>
				</div>
				<div class="dash-box-body">
					<span class="dash-box-count">{{$acceptproduct}}</span>
					<span class="dash-box-title"> منتجاتي تمت الموافقة عليها</span>
				</div>
				
				<div class="dash-box-action">
				
				</div>				
			</div>
		</div>
		
            <div class="col-md-4">
                <a href="{{route('orders.notification')}}">
			<div class="dash-box dash-box-color-3">
				<div class="dash-box-icon">
					<i class="glyphicon glyphicon-heart"></i>
				</div>
				<div class="dash-box-body">
					<span class="dash-box-count">{{$notification}}</span>
					<span class="dash-box-title">اشعارات </span>
				</div>
				
				<div class="dash-box-action">
				
				</div>				
			</div>
                </a>
		</div>
	</div>
</div>   
                <div class="button-m"> 
                    <a  href="{{route('orders.new')}}" class="btn btn-default" role="button">  فتح تذكرة </a>
                    <a  href="{{route('orders.myoreders')}}" class="btn btn-default" role="button">التذاكر </a>
                     <a  href="{{route('orders.mycoreders_user')}}" class="btn btn-default" role="button">طلبات المنتجات</a>
                    <a  href="{{route('orders.clinet_product')}}" class="btn btn-default" role="button">المنتجات </a>
                 
                     <a  href="{{route('orders.mycoreders')}}" class="btn btn-default" role="button">طلبات منتجاتي</a>
              
                </div>
               </div>
             </div>
            </div>
        </div>
      </div>
        <!-- End Header -->
@endsection
