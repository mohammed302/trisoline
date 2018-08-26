@extends('front_en.app')
@section('title', '| Contact us   ')
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title"> Contact us</h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home</a></li>
                            <li><a href="new-fullwidth.html">Contact us</a></li>

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
                            <div class="maps2" id='map3' style="width: 100%; height:320px; "></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="info-box text-center">
                            <h3>Saudi Arabia</h3>
                            <ul>
                                <li>{{$home_setting->address1e}}</li>
                                <li>Email : {{$home_setting->email1}}</li>
                                <li>Tel: {{$home_setting->tel1}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info-box text-center">
                            <h3> China</h3>
                            <ul>
                                <li>{{$home_setting->address2e}}</li>
                                <li>Email : {{$home_setting->email2}}</li>
                                <li>Tel: {{$home_setting->tel2}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="info-box text-center">
                            <h3> Turkey</h3>
                            <ul>
                                <li>{{$home_setting->address3e}}</li>
                                <li>Email : {{$home_setting->email3}}</li>
                                <li>Tel: {{$home_setting->tel3}}</li>
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
                                  novalidate="novalidate" action="">
                                   {{ csrf_field() }}
                                <span class="flat-input"><input name="name"  type="text" placeholder="name" required=""></span>
                                <span class="flat-input"><input name="email" type="email" placeholder="Email " required=""></span>
             
                                <span class="flat-input"><textarea name="comment" placeholder="Content" required=""></textarea></span>
                                <span class="flat-input">
                                    <button name="submit" type="submit" class="flat-button" title="Submit now"> Send </button></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtwK1Hd3iMGyF6ffJSRK7I_STNEXxPdcQ&region=GB"></script>
<script>
//map1
var mapOptions = {
	    center: { lat:  {{$map->Latitude}} , lng:  {{$map->longitude}} },
	    zoom: 12
	};
	var map = new google.maps.Map(document.getElementById('map1'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng( {{$map->Latitude}},{{$map->longitude}}) ,
    map: map,
    title: ' Address!'
  });
map.setCenter(marker.position);
//map2
var mapOptions = {
	    center: { lat:  {{$map2->Latitude}} , lng:  {{$map2->longitude}} },
	    zoom: 12
	};
	var map = new google.maps.Map(document.getElementById('map2'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng( {{$map2->Latitude}},{{$map2->longitude}}) ,
    map: map,
    title: ' Address!'
  });
map.setCenter(marker.position);
//map3
var mapOptions = {
	    center: { lat:  {{$map3->Latitude}} , lng:  {{$map3->longitude}} },
	    zoom: 12
	};
	var map = new google.maps.Map(document.getElementById('map3'), mapOptions)
var marker = new google.maps.Marker({
    position:new google.maps.LatLng( {{$map3->Latitude}},{{$map3->longitude}}) ,
    map: map,
    title: ' Address!'
  });
map.setCenter(marker.position);
</script>
    
    <script>

   $('#contact').validate({
    rules: {
        email: {
            required: true,
            email: true
        },
         name: {
            required: true
           
        },
        comment: {
            required: true
          
        }
        
    },
    messages: {
       
    },
    submitHandler: function (form) {
        var _token = $("input[name='_token']").val();
        var email = $("input[name='email']").val();
        var cname = $("input[name='name']").val();
        var comment = $("input[name='comment']").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('fronten.contact.post')}}",
            type: 'POST',
            data: {_token: _token, email: cemail, name: cname,  comment: comment },
            success: function (data) {
                    toastr.info(data);

            },
            error: function (data)
            {
                  console.log(data);
                //  toastr.options.timeOut = 1500; // 1.5s
                toastr.error('Error  ');

            }
        });

    }
}); 
    </script>
    
    @endsection