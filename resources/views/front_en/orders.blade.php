@extends('front_en.app')
@section('title', '| Orders')
@section('content')
   <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">My Orders </h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                            <li> My Orders</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 
<br><br>
   <section class="flat-row padingbotom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 history-text">
                    <div class="title-section style3 left">
                        <h1 class="title">My Orders </h1>
                    </div>
                    <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name </th>
        <th>Status <th>
       
      </tr>
    </thead>
    <tbody>
        <?php $i=1;?>
        @foreach($orders as $order)
      <tr>
        <td>{{$i}}</td>
        <td>{{$order->work->title_e}}</td>
        <td><a href=" {{route('fronten.replies',$order->id)}}"><i class="fa fa-eye"></i> </a></td>
     
      </tr>
      <?php $i++?>
  @endforeach
    </tbody>
  </table>
  </div>
                </div>
                
            </div>
        </div>
    </section>      



@endsection

