@extends('front_en.app')
@section('title', '| '.$work->title_e)
@section('content')
    <!-- Page title -->
    <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="title">{{$work->title_e}} </h1>
                    </div><!-- /.page-title-captions -->
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                            <li> 
                            
                             @if($t==1)
                                @if($work->branch==1 || $work->branch==2)
                               Product details
                                @else
                              Work details
                                @endif
                               @else
                             Work details
                               @endif</li>
                        </ul>
                    </div><!-- /.breadcrumbs -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.page-title -->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- Blog posts -->
    <section class="flat-row project-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-post">
                        <div class="single-text1">
                         <?=$work->description_e?>
                        </div>

                    </div>
                </div><!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="featured-single">
<div class="product-slider">
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
       <?php $temp  = explode('|',$work->img );?>
       <?php $i=0?> 
        
       @foreach($temp as $te)
      <div class="item @if($i==0)active @endif"> 
     
       <?php   $info = pathinfo(asset('img/'.$te))?>
@if ($info["extension"] == "mp4" )
<video controls  style="width: 100%; height: 300px;">
    <source src="{{asset('img/'.$te)}}" type="video/mp4">

  Your browser does not support HTML5 video.
</video>
@else
     <img src="{{asset('img/'.$te)}}"  id="myImg{{$i}}" style="height: 300px" class="img1 img-responsive">
@endif
      </div>
       <?php $i++; ?>
       @endforeach
      
    </div>
  </div>
  <div class="clearfix">
    <div id="thumbcarousel" class="carousel slide" data-interval="false">
     <div class="carousel-inner">
        <div class="item active">
             <?php $i=0?> 
             @foreach($temp as $te)
          <div data-target="#carousel" data-slide-to="{{$i}}" class="thumb">
                   <?php   $info = pathinfo(asset('img/'.$te))?>
@if ($info["extension"] == "mp4"  )
                <img 
                  src="{{asset('img/vid.png')}}">

              @else
              <img 
                  src="{{asset('img/'.$te)}}">
           
              @endif
          </div>
     
         <?php $i++; ?>
       @endforeach
        </div>
      
      </div>
      <!-- /carousel-inner --> 
      </div>
    <!-- /thumbcarousel --> 
    
  </div>
</div>
                     

                    </div>
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

  <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
    <section class="flat-row page-contact">
@if($t==1)
        <div class="container">
            <div class="wrap-formcontact">
                <div class="row">
                    <h2>Order</h2>
                    <div class="col-lg-7">
                        <div class="margin-left_12">
                            <form id="order" class="contactform style4 clearfix" method="post" action="" novalidate="novalidate">
                                {{ csrf_field() }}
                                <input type="hidden" name="work_id" value="{{$work->id}}">
                                <input type="hidden" name="branch" value="{{$work->branch}}">
                                <span class="flat-input"><textarea name="message" class="message" placeholder="Messages" required=""></textarea></span>
                                @if(Auth::check())
                                <span class="flat-input"><button name="submit" type="submit" class="flat-button"  title="Submit now"> Order</button></span>
                                    @else
                                    <span class="flat-input"><button  id="nologin" type="button" class="flat-button"  > Order</button></span>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endif
    </section>



@endsection
@section('js')
   <script>
                // Get the modal
                var modal = document.getElementById('myModal');

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                  <?php $i=0;?>
            @foreach($temp as $te)
                  <?php   $info = pathinfo(asset('img/'.$te))?>
                      @if ($info["extension"] != "mp4"  )
                var img{{$i}} = document.getElementById('myImg{{$i}}');
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                
                img{{$i}}.onclick = function () {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                }
              <?php $i++;?>
                  @endif
            @endforeach 

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function () {
                    modal.style.display = "none";
                }
            </script>    
    <script>
        $( "#nologin" ).click(function() {
            toastr.error('Login');
        });

        $('#order').validate({
            rules: {
                message: {
                    required: true
                },

            },
            messages: {


            },
            submitHandler: function (form) {
                var _token = $("input[name='_token']").val();
                var msg = $(".message").val()
                var id = $("input[name='work_id']").val();
                var br = $("input[name='branch']").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
                    }
                });
                $.ajax({
                    url: "{{route('front.work.order')}}",
                    type: 'POST',
                    data: {_token: _token, message: msg, work_id: id,branch: br},
                    success: function (data) {
                        toastr.success('Done');
                        var msg = $(".message").val("");
                    },
                    error: function (data)
                    {
                        console.log(data);
//  toastr.options.timeOut = 1500; // 1.5s
                        toastr.error('Error');

                    }
                });

            }
        });
    </script>
@endsection
