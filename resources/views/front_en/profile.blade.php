@extends('front_en.app')
@section('title', ' | Profile')

@section('content')
     <div class="page-title parallax parallax1">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="page-title-heading">
                        <h1 class="title">Profile </h1>
                    </div><!-- /.page-title-captions -->  
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><i class="fa fa-home"></i><a href="{{route('fronten.index')}}">Home </a></li>
                            <li> Profile</li>
                        </ul>                   
                    </div><!-- /.breadcrumbs --> 
                </div><!-- /.col-md-12 -->  
            </div><!-- /.row -->  
        </div><!-- /.container -->                      
    </div><!-- /.page-title --> 
<br><br>

          <section class="flat-row padingbotom">
    <!-- /Profile -->
    
         
              
            <!-- left column -->
            <div class=" col-md-2 "></div>
            <!-- edit form column -->
            <div class=" col-md-8  col-sm-6 col-xs-12 personal-info">
              <h3> Personal Information</h3>
            <form  method="post"   enctype="multipart/form-data" 
                   action="{{route('fronten.profile.post')}}" role="form" id="updateProfile">
                {!! csrf_field() !!}
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div> 
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>خطأ!</strong> هناك مشكلة في الاتي.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif	
                <div class="form-group" style="
    height: 50px;
">
                  <label class=" col-md-2">Name :</label>
                  <div class="col-md-10">
                      <input class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="ALi" 
                             type="text" required="">
                  </div>
                </div>
              <div class="form-group" style="
    height: 50px;
">
                  <label class="col-md-2">Address :</label>
                  <div class="col-md-10">
                      <input class="form-control" name="address" value="{{Auth::user()->address}}
                             "
                             type="text" required="">
                  </div>
                </div>
                   <div class="form-group" style="
    height: 50px;
">
                  <label class="col-md-2">Tel :</label>
                  <div class="col-md-10">
                      <input class="form-control" name="tel" value="{{Auth::user()->tel}}" 
                            
                             type="text" required="">
                  </div>
                </div>
                <div class="form-group" style="
    height: 50px;
">
                  <label class="col-md-3">Email</label>
                  <div class="col-md-9">
                    <input class="form-control" name="email" value="{{Auth::user()->email}}"
                           placeholder="aliebr2himali@gmail.com" type="text" required="">
                  </div>
                </div>
                  <div class="form-group" style="
    height: 50px;
">
                  <label class="col-md-3" >Current Password  </label>
                  <div class="col-md-9">
                    <input class="form-control"  name="current_password" id="current_password"
                           placeholder="" type="password">
                  </div>
                </div>
                <div class="form-group" style="
    height: 50px;
">
                  <label class="col-md-3" >Password </label>
                  <div class="col-md-9">
                    <input class="form-control" id="npassword"
                           name="password" placeholder="" type="password">
                  </div>
                </div>
                <div class="form-group" style="
    height: 50px;
">
                  <label class="col-md-3">Password Confirm</label>
                  <div class="col-md-9">
                    <input class="form-control"
                id="confirm_new_password"          name="password_confirm" 
                placeholder="" type="password">
                  </div>
                </div>
                <div class="form-group" style="
    height: 50px;
">
                  <div class="col-md-10 text-center">
                      <input class="btn btn-primary" value="Update" type="submit">
                  
                    <input class="btn btn-default" value="Cancel" type="reset">
                  </div>
                </div>
             
            </div>
                </div> 
                      </form>
              </section>
  @endsection
  @section('js')





<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>




<script>
   var $cp = $('#current_password'),
    $np = $('#npassword'),
    $cnp = $('#confirm_new_password');
    $('#updateProfile').validate({
        errorElement: 'span', //default input error message container

        errorClass: 'help-block', // default input error message class

        focusInvalid: false, // do not focus the last invalid input

        ignore: "",
        rules: {
            name: {
            required: true,
           
        },
        email: {
            required: true,
            email: true
        },
      
         current_password: {
            required: function () {
                return $np.val().length > 0 || $cnp.val().length > 0
            }
        },
        password: {
               minlength: 6,
            required: function () {
                return $cp.val().length > 0 || $cnp.val().length > 0
            }
        },
       password_confirm: {
            required: function () {
                return $cp.val().length > 0 || $np.val().length > 0},
                          minlength: 6,
            equalTo: "#npassword"
            
        }
        },
        messages: {// custom messages for radio buttons and checkboxes
           

        },
        invalidHandler: function (event, validator) { //display error alert on form submit   



        },
        highlight: function (element) { // hightlight error inputs

            $(element)

                    .closest('.form-group').addClass('has-error'); // set error class to the control group

        },
        success: function (label) {

            label.closest('.form-group').removeClass('has-error');

            label.remove();

        },
        errorPlacement: function (error, element) {

            if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  

                error.insertAfter($('#register_tnc_error'));

            } else if (element.closest('.input-icon').size() === 1) {

                error.insertAfter(element.closest('.input-icon'));

            } else {

                error.insertAfter(element);

            }

        },
        submitHandler: function (form) {

            form.submit();

        }

    });


</script>
@endsection