@extends('admin.app')
@section('title', 'إعدادات الرئيسية ')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">    </a>
    </li>
    <li>إعدادات الرئيسية</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cog"></i>
                <span class="caption-subject  sbold uppercase">إعدادات الرئيسية</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" method="post"  id="myform"
enctype="multipart/form-data" 
                  action="{{route('admin.home.setting.update')}}" role="form">

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
                        <label class="col-md-3 control-label">
                            من نحن

                        </label>
                        <div class="col-md-6">
                            <textarea name="about" cols="40" rows="5"  required="">{{$hsetting->about}}</textarea>


                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            من نحن بالانكليزي
                        </label>
                        <div class="col-md-6">
                            <textarea name="about_en" cols="40" rows="5"  required="">{{$hsetting->about_en}}</textarea>
                           

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            الخدمة الأولي
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service1"    placeholder="الخدمة الأولى"
                                   required="" value="{{$hsetting->service1}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            وصف           الخدمة الأولي
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service1_desc"    placeholder="الخدمة الأولى"
                                   required="" value="{{$hsetting->service1_desc}}"
                                   >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            الخدمة الثانية
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service2"    placeholder="الخدمة الثانية"
                                   required="" value="{{$hsetting->service2}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            وصف           الخدمة الثانية
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service2_desc"    placeholder="الخدمة الثانية"
                                   required="" value="{{$hsetting->service2_desc}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            الخدمة الثالثة
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service3"    placeholder="الخدمة الثالثة"
                                   required="" value="{{$hsetting->service3}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            وصف           الخدمة الثالثة
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service3_desc"    placeholder="الخدمة الثالثة"
                                   required="" value="{{$hsetting->service3_desc}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E       الخدمة الأولي
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service1e"    placeholder="الخدمة الأولى"
                                   required="" value="{{$hsetting->service1e}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E        وصف           الخدمة الأولي
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service1e_desc"    placeholder="الخدمة الأولى"
                                   required="" value="{{$hsetting->service1e_desc}}"
                                   >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E        الخدمة الثانية
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service2e"    placeholder="الخدمة الثانية"
                                   required="" value="{{$hsetting->service2e}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            وصف     E      الخدمة الثانية
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service2e_desc"    placeholder="الخدمة الثانية"
                                   required="" value="{{$hsetting->service2e_desc}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E   الخدمة الثالثة
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service3e"    placeholder="الخدمة الثالثة"
                                   required="" value="{{$hsetting->service3e}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            وصف     E      الخدمة الثالثة
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="service3e_desc"    placeholder="الخدمة الثالثة"
                                   required="" value="{{$hsetting->service3e_desc}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            عنوان الفرع  الرياض
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="address1"    placeholder=" عنوان الفرع 1"
                                   required="" value="{{$hsetting->address1}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            عنوان الفرع  الصين
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="address2"    placeholder=" عنوان الفرع 2"
                                   required="" value="{{$hsetting->address2}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            عنوان الفرع  تركيا
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="address3"    placeholder=" عنوان الفرع 3"
                                   required="" value="{{$hsetting->address3}}"
                                   >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E       عنوان الفرع  الرياض
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="address1e"    placeholder=" عنوان الفرع 1"
                                   required="" value="{{$hsetting->address1e}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E     عنوان الفرع  الصين
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="address2e"    placeholder=" عنوان الفرع 2"
                                   required="" value="{{$hsetting->address2e}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            E         عنوان الفرع  تركيا
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="address3e"    placeholder=" عنوان الفرع 3"
                                   required="" value="{{$hsetting->address3e}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            بريد الفرع الرياض
                        </label>
                        <div class="col-md-6">

                            <input type="email" class="form-control input-medium"
                                   name="email1"    placeholder=" بريد الفرع 1"
                                   required="" value="{{$hsetting->email1}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            بريد الفرع الصين
                        </label>
                        <div class="col-md-6">

                            <input type="email" class="form-control input-medium"
                                   name="email2"    placeholder=" بريد الفرع 2"
                                   required="" value="{{$hsetting->email2}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            بريد الفرع تركيا
                        </label>
                        <div class="col-md-6">

                            <input type="email" class="form-control input-medium"
                                   name="email3"    placeholder=" بريد الفرع 3"
                                   required="" value="{{$hsetting->email3}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            تليفون الفرع الرياض
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="tel1"    placeholder=" تليفون الفرع 1"
                                   required="" value="{{$hsetting->tel1}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            تليفون الفرع الصين
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="tel2"    placeholder=" تليفون الفرع 2"
                                   required="" value="{{$hsetting->tel2}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            تليفون الفرع تركيا
                        </label>
                        <div class="col-md-6">

                            <input type="text" class="form-control input-medium"
                                   name="tel3"    placeholder=" تليفون الفرع 3"
                                   required="" value="{{$hsetting->tel3}}"
                                   >

                        </div>
                    </div>

                </div>







                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn blue">تعديل</button>

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
    $.validator.messages.required = " هذا الحقل مطلوب   !";
    $.validator.messages.email = "ادخل بريد الكتروني صحيح";
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

            name: {
                required: "يرجى ادخال الاسم "

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