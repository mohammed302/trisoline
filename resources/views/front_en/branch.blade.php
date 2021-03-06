@extends('front_en.app')
@section('title', '| branch  '.$title)
@section('content') 

<style>
    .tp-bgimg defaultimg {
        margin-top:100px;
    }
    .tp-bgimg{
        margin-top:120px;
    }
</style>
 <div id="slideshow">
    @foreach($sliders as $slider)
    <div style="" class="crop">
       <img src="{{asset('img/thumbnail/'. $slider->img)}}" class="img-responsive" style="">
   </div>
  @endforeach
 
</div>
<section class="flat-row bg-section">
    <div class="container">   
        <div class="row">
            <div class="col-md-12">  
                <div class="title-section style3 text-center">
                    <h1 class="title">Services  {{$title}} Branch</h1>
                </div>          
            </div>
        </div>
     <div class="row">
             @foreach($services as $service)
                <div class="col-lg-4">
                    <div class="iconbox style3 box-shadow2">
                        <div class="box-header">
                            <div class="box-icon">
                                <i class="ti-desktop"></i>
                            </div>
                        </div>
                        <div class="box-content">
                            <h5  class="box-title">{{$service->title_e}}</h5>  
                            <p> {{$service->descriptione_en}}</p> 
                        </div>
                    </div>     
                </div> 
                 @endforeach
            </div>  
    </div> 
</section>
@if(sizeof($works)>0)
<section class="flat-row v4 section-testimonials2">
    <div class="container">
        <div class="row">
            <div class="col-md-6 reponsive-onehalf">
                <div class="title-section style2 left">
                    <h1 class="title">@if($id==1 ||$id==2 )
Product
@else
 Project
 @endif  {{$title}}</h1>
                    <div class="sub-title">

                    </div>
                </div>
            </div>
            <div class="col-md-6 reponsive-onehalf">
                <div class="btn-showall float-right">
                    <a href="{{route('fronten.works.branch',$id)}}" class="flat-button">All @if($id==1 ||$id==2 )
Products
@else
 Projects
 @endif</a>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-imagebox flat-carousel" data-item="5" data-nav="false" data-dots="false" data-auto="false"> 
          @foreach($works as $work)
            <div class="imagebox">
                <div class="imagebox-image"> 
                  <?php $temp  = explode('|',$work->img );?>
                    <a href=""><img src="{{asset('img/'.$temp[0])}}" style="width:270px;height: 210px" alt="image"></a> 
                </div> 
                <div class="imagebox-content">
                 <h5 class="imagebox-title"><a href="{{route('fronten.work.details',$work->id)}}" widht="">{{$work->title_e}}</a></h5>
                  <p class="imagebox-category">
                  @if($work->branch==1)
                 Saudi Arabia
                  @elseif($work->branch==2)
               China
                  @else
                Turkey
                  @endif
                  
                  </p>
                </div>
            </div>
          @endforeach
    </div>
</section> 
@endif

@if($id==1 ||$id==2 )
@if(sizeof($products)>0)
<section class="flat-row v4 section-testimonials2  @if(sizeof($works)>0) bg-section @endif">
    <div class="container">
        <div class="row">
            <div class="col-md-6 reponsive-onehalf">
                <div class="title-section style2 left">
                    <h1 class="title">

 Project
   {{$title}}</h1>
                    <div class="sub-title">

                    </div>
                </div>
            </div>
            <div class="col-md-6 reponsive-onehalf">
                <div class="btn-showall float-right">
                    <a href="{{route('fronten.products.branch',$id)}}" class="flat-button">
All Projects
 </a>
                </div>
            </div>
        </div>
    </div>
    <div class="wrap-imagebox flat-carousel" data-item="5" data-nav="false" data-dots="false" data-auto="false"> 
          @foreach($products as $work)
            <div class="imagebox">
                <div class="imagebox-image"> 
                   <?php $temp  = explode('|',$work->img );?>
                    <a href=""><img src="{{asset('img/'.$temp[0])}}" style="width:270px;height: 210px" alt="image"></a> 
                </div> 
                <div class="imagebox-content">
                 <h5 class="imagebox-title"><a href="{{route('fronten.product.details',$work->id)}}" widht="">{{$work->title_e}}</a></h5>
                  <p class="imagebox-category">
                 @if($work->branch==1)
                 Saudi Arabia
                  @elseif($work->branch==2)
               China
                  @else
                Turkey
                  @endif
                  
                  </p>
                </div>
            </div>
          @endforeach
    </div>
</section> 
@endif
@endif
@if(sizeof($offers)>0)
<section class="flat-row section-iconbox padding2   @if(sizeof($works)==0) bg-section @endif">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="title-section style3 left">
                    <h1 class="title">Our Offers</h1>
                </div>
            </div>
            <div class="col-md-7">
                <div class="title-section padding-left50">
                    <div class="sub-title style3">
                     Our Offers in {{$title}} Branch
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $i=1;?>
            @foreach ($offers as $offer)
          
            <img id="myImg{{$i}}" src="{{asset('img/thumbnail/'.$offer->img)}}"
                 style="height: 200px;    margin-left: 2%;
    margin-bottom: 2px "
                 alt="{{$offer->title_e}}" width="300" height="200">
<?php $i++;?>
            @endforeach
       

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                  <?php $i=1;?>
               @foreach ($offers as $offer)
                var img{{$i}} = document.getElementById('myImg{{$i}}');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                
                img{{$i}}.onclick = function () {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                }
              <?php $i++;?>
            @endforeach 

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }
            </script>       
        </div>  
    </div>
</section>
@endif
<section class="flat-row section-iconbox section-testimonials2  @if(sizeof($works)>0) bg-section @endif  @if(sizeof($offers)==0) bg-section @endif">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="title-section style3 left">
                    <h1 class="title">Address</h1>
                </div>
            </div>
            <div class="col-md-7">
                <div class="title-section padding-left50">
                    <div class="sub-title style3">
                     
                           <?php echo nl2br($b_setting->address1e)?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="flat-maps box-shadow3 margin-bottom-73">
                    <div class="maps2" id='map2' style="width: 100%; height: 520px; "></div> 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
  <!--  <script src="{{asset('style/web/javascript/gmap3.min.js')}}"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwK1Hd3iMGyF6ffJSRK7I_STNEXxPdcQ&region=GB"></script>
<script>

var mapOptions = {
	    center: { lat:  {{$b_setting->Latitude}} , lng:  {{$b_setting->longitude}} },
	    zoom: 14
	};
	var map = new google.maps.Map(document.getElementById('map2'), mapOptions)
var map = new google.maps.Map(document.getElementById('map2'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng( {{$b_setting->Latitude}},{{$b_setting->longitude}}) ,
    map: map,
    title: 'Address'
  });
map.setCenter(marker.position);
myMarker.setMap(map);
</script>

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
