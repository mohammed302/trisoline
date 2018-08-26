@extends('admin.app')
@section('title', 'إضافة سلايدر')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">    </a>
    </li>
    <li>إضافة سلايدر</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-plus"></i>
                <span class="caption-subject  sbold uppercase">إضافة سلايدر</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" method="post"  id="myform"
   enctype="multipart/form-data" 
                  action="{{route('sliders.store')}}" role="form">

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
                <div class="form-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">الصورة </label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 200px;  overflow: hidden;">

                                </div>
                                <div>
                                    <span class="btn default btn-file">

                                        <input type="file" name="imgPath" accept="image/*" required="">
                                    </span>
                                    <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
               
                    <div class="form-group ">
                        <label class="col-md-3 control-label">
                            الفرع

                        </label>
                        <div class="col-md-3">

                            <select class="form-control" name="branch">
@if(Auth::user()->type==1)
  <option value="0">الرئيسية</option>
                                <option value="1">الرياض</option>
                                <option value="2">الصين</option>
                                <option value="3">تركيا</option>
                                @else
                                @if(Auth::user()->branch==1)
                                <option value="1">الرياض</option>
                                @elseif(Auth::user()->branch==2) 
                                <option value="2">الصين</option>
                                 @elseif(Auth::user()->branch==3) 
                                <option value="3">تركيا</option>
                                @endif
                                @endif
                                
                            </select>
                        </div>
                    </div>


                </div>







                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn blue">إضافة</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>


@endsection
@section('js')


<script>
    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "Value must not equal arg.");
    $('#myform').validate({
        errorElement: 'span', //default input error message container

        errorClass: 'help-block', // default input error message class

        focusInvalid: false, // do not focus the last invalid input

        ignore: "",
        rules: {
            field: {
                required: true


            },
         
        },
        messages: {// custom messages for radio buttons and checkboxes

          
            imgPath: {
                required: "يرجى اختيار الصورة "

            },
           
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
//just for the demos, avoids form submit


</script>
@endsection