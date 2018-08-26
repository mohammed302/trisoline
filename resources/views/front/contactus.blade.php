@extends('front.app')
@section('title', '| اتصل بنا  ')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title"> اتصل بنا</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('front.index')}}">الرئيسية</a></li>
                            <li><a href="new-fullwidth.html">ااتصل بنا</a></li>

                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

    <section class="flat-row page-contact">
          <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div> 
        <div class="container">
            <div class="wrap-infobox">
                <div class="row">
                    <div class="col-md-4">
                        <div class="flat-maps box-shadow3 margin-bottom-73">
                            <div class="maps2" id='map1' style="width: 100%; height: 320px; "></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="flat-maps box-shadow3 margin-bottom-73">
                            <div class="maps2" id='map2' style="width: 100%; height: 320px; "></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="flat-maps box-shadow3 margin-bottom-73">
                            <div class="maps2" id='map3' style="width: 100%; height: 320px; "></div>
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
        </div>
        <div class="container">
            <div class="wrap-formcontact">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="margin-left_12">
                            <form id="contact" class="contactform style4 clearfix" method="post" 
                                  novalidate="novalidate">
                                   {{ csrf_field() }}
                                <span class="flat-input"><input name="name" id="name" type="text" placeholder="الاسم" required="required"></span>
                                <span class="flat-input"><input name="email" id="email" type="email" placeholder="البريد الإلكتروني" required="required"></span>
             
                                <span class="flat-input"><textarea name="comment" placeholder="المحتوى" required="required"></textarea></span>
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button" title="Submit now"> ارسل الرسالة</button></span>
                            </form>
                        </div>
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
//map1
var mapOptions = {
	    center: { lat:  {{$map->Latitude}} , lng:  {{$map->longitude}} },
	    zoom: 12
	};
 var myLatLng = {lat:  {{$map->Latitude}} , lng:  {{$map->longitude}}};
	var map = new google.maps.Map(document.getElementById('map1'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng(<?= $map->Latitude?>, <?= $map->longitude?>) ,
    map: map,
    title: 'العتوان !'
  });
map.setCenter(marker.position);

//map2
var mapOptions = {
	    center: { lat:  {{$map->Latitude}} , lng:  {{$map->longitude}} },
	    zoom: 12
	};
 var myLatLng = {lat:  {{$map->Latitude}} , lng:  {{$map->longitude}}};
	var map = new google.maps.Map(document.getElementById('map2'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng(<?= $map2->Latitude?>, <?= $map2->longitude?>) ,
    map: map,
    title: ' العتوان!'
  });
map.setCenter(marker.position);
;
//map3
var mapOptions = {
	    center: { lat:  {{$map->Latitude}} , lng:  {{$map->longitude}} },
	    zoom: 12
	};
 var myLatLng = {lat:  {{$map->Latitude}} , lng:  {{$map->longitude}}};
	var map = new google.maps.Map(document.getElementById('map3'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng(<?= $map3->Latitude?>, <?= $map3->longitude?>) ,
    map: map,
    title: ' العتوان!'
  });
map.setCenter(marker.position);
Marker.setMap(map);
</script>
    <script>
   $('#contact').validate({
    rules: {
        email: {
            required: true,
            email: true
        },
         name: {
            required: true,
           
        },
        comment: {
            required: true,
          
        },
        
    },
    messages: {
        email: {
            required: "البريد الالكتروني مطلوب",
            email: 'ادخل بريد الكتروني صحيح'
        },
        name: {
            required: "  الاسم مطلوب",
          

        },
         comment: {
            required: "  المحتوى مطلوب",
          

        }
    },
    submitHandler: function (form) {
        var _token = $("input[name='_token']").val();
        var email = $("input[name='cemail']").val();
        var cname = $("input[name='cname']").val();
        var comment = $("input[name='comment']").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('front.contact.post')}}",
            type: 'POST',
            data: {_token: _token, email: cemail, name: cname,  comment: comment },
            success: function (data) {
                    toastr.info(data);

            },
            error: function (data)
            {
                  console.log(data);
                //  toastr.options.timeOut = 1500; // 1.5s
                toastr.error('خطأ  ');

            }
        });

    }
}); 
    </script>
    
    @endsection