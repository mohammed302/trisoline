@extends('front.app')

@section('content')

<div id="slideshow">
    @foreach($sliders as $slider)
    <div style="" class="crop">
       <img src="{{asset('img/thumbnail/'. $slider->img)}}" class="img-responsive" style="">
   </div>
  @endforeach
 
</div>

            

    <section class="flat-row section-image">
        <div class="container">
            <div class="row">
                <div class="col-md-12">  
                    <div class="title-section style3 text-center padding-lr140">
                        <h1 class="title">من نحن</h1>
                        <div class="sub-title style2">
                            {{$home_setting->about}}
                        </div>
                    </div>         
                </div><!-- /.col-md-12 -->  
            </div>
       </div> 
    </section> 
     <section class="flat-row bg-section">
        <div class="container">   
         <div class="row">
                <div class="col-md-12">  
                    <div class="title-section style3 text-center">
                        <h1 class="title">خدماتنا</h1>
                    </div>          
                </div>
            </div>
            <ul id="data-effect" class="data-effect wrap-iconbox clearfix">
                <li>
                    <div class="iconbox effect bg-image text-center">
                        <div class="box-header">
                            <div class="box-icon">
                                <i class="icon_currency"></i>
                            </div>
                        </div>
                        <div class="box-contentt">
                            <h5  class="box-title">{{$home_setting->service1}}</h5>  
                            <p>{{$home_setting->service1_desc}}</p> 
                        </div>
                        <div class="effecthover">
                            <img src="{{asset('style/web/images/imagebox/1.jpg')}}" alt="image">
                        </div>
                    </div>
                </li>
                <li>
                    <div class="iconbox effect bg-image text-center">
                        <div class="box-header">
                            <div class="box-icon">
                                <i class="icon_search-2"></i>
                            </div>
                        </div>
                        <div class="box-contentt">
                            <h5  class="box-title">{{$home_setting->service2}}</h5>  
                            <p>{{$home_setting->service2_desc}}</p> 
                        </div>
                        <div class="effecthover">
                            <img src="{{asset('style/web/images/imagebox/1.jpg')}}" alt="image">
                        </div>
                    </div>
                </li>   
                <li>
                    <div class="iconbox effect bg-image text-center">
                        <div class="box-header">
                            <div class="box-icon">
                                <i class=" icon_currency"></i>
                            </div>
                        </div>
                        <div class="box-contentt">
                            <h5  class="box-title">{{$home_setting->service3}}</h5>  
                            <p>{{$home_setting->service3_desc}}</p> 
                        </div>
                        <div class="effecthover">
                            <img src="{{asset('style/web/images/imagebox/1.jpg')}}" alt="image">
                        </div>
                    </div>
                </li>
            </ul>
        </div> 
    </section>
@if(sizeof($works)>0)
    <section class="flat-row v4 section-testimonials2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 reponsive-onehalf">
                    <div class="title-section style2 left">
                        <h1 class="title">أعمالنا</h1>
                       
                    </div>
                </div>
                <div class="col-md-6 reponsive-onehalf">
                    <div class="btn-showall float-right">
                        <a href="{{route('front.works')}}" class="flat-button">جميع اعمالنا</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-imagebox flat-carousel" data-item="5" data-nav="false" data-dots="false" data-auto="false"> 
          @foreach($works as $work)
            <div class="imagebox">
                <div class="imagebox-image"> 
                     <?php $temp  = explode('|',$work->img );?>
                    <a href=""><img src="{{asset('img/'.$temp[0])}}" style="width:100%;height: 210px" alt="image"></a> 
                </div> 
                <div class="imagebox-content">
                 <h5 class="imagebox-title"><a href="{{route('front.work.details',$work->id)}}" widht="">{{$work->title}}</a></h5>
                  <p class="imagebox-category">
                  @if($work->branch==1)
                  السعودية
                  @elseif($work->branch==2)
                  الصين
                  @else
                  تركيا
                  @endif
                  
                  </p>
                </div>
            </div>
          @endforeach
          
        </div>
    </section> 
@endif
    
   <section class="flat-row @if(sizeof($works)>0) bg-section @endif ">
<!--Currency Converter widget by FreeCurrencyRates.com -->

<div id='gcw_mainFgnXE0kNB' class='gcw_mainFgnXE0kNB' style="direction: ltr;"></div>

<script>function reloadFgnXE0kNB(){ var sc = document.getElementById('scFgnXE0kNB');if (sc) sc.parentNode.removeChild(sc);sc = document.createElement('script');sc.type = 'text/javascript';sc.charset = 'UTF-8';sc.async = true;sc.id='scFgnXE0kNB';sc.src = 'https://freecurrencyrates.com/en/widget-horizontal-editable?iso=USDCNY&df=1&p=FgnXE0kNB&v=fits&source=boc&width=900&width_title=240&firstrowvalue=1&thm=A6C9E2,FCFDFD,4297D7,5C9CCC,FFFFFF,C5DBEC,FCFDFD,2E6E9E,000000&title=Currency%20Converter&tzo=-480';var div = document.getElementById('gcw_mainFgnXE0kNB');div.parentNode.insertBefore(sc, div);} reloadFgnXE0kNB(); </script>
<!-- put custom styles here: .gcw_mainFgnXE0kNB{}, .gcw_headerFgnXE0kNB{}, .-->    
<style>
    .gcw_info-bgFgnXE0kNB,.gcw_info-signFgnXE0kNB{
        display: none;
    }
    
</style>
   </section>
    <section class="flat-row @if(sizeof($works)==0) bg-section @endif  ">
        <div class="container">
          <div class="row">
                <div class="col-md-12">  
                    <div class="title-section style3 text-center">
                        <h1 class="title">اتصل بنا</h1>
                    </div>          
                </div>
            </div>
                 
            
                <div class="row">
                    <div class="col-lg-4">
                        <div class="info-box text-center">
                            <h3>السعودية</h3>
                            <ul>
                                <li>{{$home_setting->address1}}</li>
                                <li>البريد الإلكتروني: {{$home_setting->email1}}</li>
                                <li>الهاتف: {{$home_setting->tel1}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info-box text-center">
                            <h3> الصين</h3>
                            <ul>
                                <li>{{$home_setting->address2}}</li>
                                <li>البريد الإلكتروني: {{$home_setting->email2}}</li>
                                <li>الهاتف: {{$home_setting->tel2}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info-box text-center">
                            <h3> تركيا</h3>
                            <ul>
                                <li>{{$home_setting->address3}}</li>
                                <li>البريد الإلكتروني: {{$home_setting->email3}}</li>
                                <li>الهاتف: {{$home_setting->tel3}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            
        </div>
          
    </section>

 
@endsection
@section('js')
<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow> div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  10000);
</script>
@endsection
