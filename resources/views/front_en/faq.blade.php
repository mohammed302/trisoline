@extends('front_en.app')
@section('title', '| Faqs   ')
@section('content')
 <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">Faqs </h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home</a></li>
                            <li>Faqs</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 
<br><br>
    <section class="flat-row padingbotom">
        <div class="container">
  <h2> Faqs</h2>
  
  <div class="panel-group" id="accordion">
      <?php $i=1;?>
      @foreach($faqs as $faq)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">{{$faq->qusation_en}}</a>
        </h4>
      </div>
      <div id="collapse{{$i}}" class="panel-collapse collapse in">
        <div class="panel-body">{{$faq->answer_en}}</div>
      </div>
    </div>
      <?php $i++;?>
      @endforeach
  
  </div> 
</div>
    </section>      

    @endsection