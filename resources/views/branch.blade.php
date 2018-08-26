@extends('front_en.app')
@section('title', '| branch  '.$title)
@section('content') 

<div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container slide-overlay" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

    <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
    <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
        <div class="slotholder"></div>

        <ul><!-- SLIDE  -->

        @foreach($sliders as $slider)
       
            <!-- SLIDE -->
            <li data-index="rs-3051" data-transition="fade" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">                        
                <!-- <div class="overlay">
                </div> -->
                <!-- MAIN IMAGE -->
                <img src="{{asset('img/thumbnail/'. $slider->img)}}"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                <!-- LAYERS -->
                <!-- LAYER NR. 12 -->
                <div class="tp-caption title-slide" 
                     id="slide-3051-layer-1" 
                     data-x="['left','left','left','left']" data-hoffset="['35','20','50','50']" 
                     data-y="['middle','middle','middle','middle']" data-voffset="['-82','-82','-82','-82']" 
                     data-fontsize="['60','60','50','33']"
                     data-lineheight="['70','70','50','35']"
                     data-fontweight="['700','700','700','700']"
                     data-width="none"
                     data-height="none"
                     data-whitespace="nowrap"

                     data-type="text" 
                     data-responsive_offset="on"                             

                     data-frames='[{"delay":100,"speed":3000,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                     data-textAlign="['left','left','left','left']"
                     data-paddingtop="[10,10,10,10]"
                     data-paddingright="[0,0,0,0]"
                     data-paddingbottom="[0,0,0,0"
                     data-paddingleft="[0,0,0,0]"

                     style="z-index: 16; white-space: nowrap;    text-shadow: 4px 4px #f2c21a">
                </div>

                <!-- LAYER NR. 12 -->
                <div class="tp-caption sub-title position" 
                     id="slide-3051-layer-3" 
                     data-x="['left','left','left','left']" data-hoffset="['35','25','50','50']" 
                     data-y="['middle','middle','middle','middle']" data-voffset="['-122','-122','-122','-122']"
                     data-fontsize="['16',16','16','14']" 
                     data-fontweight="['600','600','600','600']"
                     data-width="['660','660','660','300']"
                     data-height="none"
                     data-whitespace="nowrap"

                     data-type="text" 
                     data-responsive_offset="on" 

                     data-frames='[{"delay":1100,"speed":3000,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                     data-textAlign="['left','left','left','left']"
                     data-paddingtop="[0,0,0,0]"
                     data-paddingright="[0,0,0,0]"
                     data-paddingbottom="[0,0,0,0]"
                     data-paddingleft="[0,0,0,0]"

                     style="z-index: 17; white-space: nowrap;text-transform:left;">
                </div>

                <!-- LAYER NR. 13 -->
                <div class="tp-caption sub-title" 
                     id="slide-3051-layer-4" 
                     data-x="['left','left','left','left']" data-hoffset="['35','20','50','50']" 
                     data-y="['middle','middle','middle','middle']" data-voffset="['12','12','-20,'-20']"
                     data-fontsize="['18',18','18','16']" 
                     data-lineheight="['30','30','22','16']"
                     data-fontweight="['400','400','400','400']"
                     data-width="['800',800','800','450']"
                     data-height="none"
                     data-whitespace="['nowrap',normal','normal','normal']" 

                     data-type="text" 
                     data-responsive_offset="on" 

                     data-frames='[{"delay":1100,"speed":3000,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                     data-textAlign="['left','left','left','left']"
                     data-paddingtop="[0,0,0,0]"
                     data-paddingright="[0,0,0,0]"
                     data-paddingbottom="[0,0,0,0]"
                     data-paddingleft="[0,0,0,0]"

                     style="z-index: 17; white-space: normal;"><br>
                </div>

         
            </li>

@endforeach  
        </ul>
    </div>
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
                    <a href="{{route('front.works.branch',$id)}}" class="flat-button">All @if($id==1 ||$id==2 )
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
                 Riyadh
                  @elseif($work->branch==2))
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

@if($id==1 ||$id==2 )
<section class="flat-row v4 section-testimonials2  bg-section">
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
                 Riyadh
                  @elseif($work->branch==2))
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


<section class="flat-row section-iconbox padding2  ">
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

<section class="flat-row section-iconbox section-testimonials2  bg-section">
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
@endsection
