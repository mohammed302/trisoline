@extends('admin.app')
@section('title', 'تعديل  منتج')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">    </a>
    </li>
    <li>تعديل منتج</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit"></i>
                <span class="caption-subject  sbold uppercase">تعديل منتج</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" method="post"  id="myform"
                  enctype="multipart/form-data" 
                  action="{{route('client_products.update',$product)}}" role="form">
                <input type="hidden" name="_method" value="put">
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
                        <label class="control-label col-md-3">الملفات </label>
                        <div class="col-md-9">
                         <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 200px;  overflow: hidden;">
     
      
                                </div>
                                <div>
                                    <span class="btn default btn-file">

                                         <input type="file" name="imgPath[]" accept="image/*"  multiple>
                                    </span>
                                    <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
                                        حذف
                                    </a>
                                </div>
                            </div>
                               <button class="add_more">  اضافة صورة أخر</button>
                                                         <?php $temp  = explode('|',$product->img );?>
       <?php $i=0?> 
        
       @foreach($temp as $te)
     
       <a href="{{asset('img/'.$te)}}" target="_blank"  class="btn">الملف</a>
     
       <?php $i++; ?>
       @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            العنوان

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium"
                                   name="title"    placeholder="العنوان "
                                   required="" value="{{$product->title}}"
                                   >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            العنوان بالانكليزي

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium" 
                                   name="title_e"    placeholder="   العنوان بالانكليزي  "
                                   required="" value="{{$product->title_e}}"
                                   >

                        </div>
                    </div>
 <div class="form-group">
                        <label class="col-md-3 control-label">
                         الفرع

                        </label>
                        <div class="col-md-3">

                              <select class="form-control" name="branch">

                                <option value="1" @if($product->branch==1) selected="" @endif>السعودية</option>
                                <option value="2" @if($product->branch==2) selected="" @endif>الصين</option>
                                <option value="3" @if($product->branch==3) selected="" @endif>تركيا</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            المحتوى

                        </label>
                        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <div class="col-md-9">
                            <textarea name="desc" placeholder="المحتوى"  >{{$product->description}}</textarea>
                            <script>
CKEDITOR.replace('desc');
                            </script>



                        </div>
                    </div>






                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            المحتوى بالإنلكيزي

                        </label>
                        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <div class="col-md-9">
                            <textarea name="endesc" placeholder="المحتوى بالإنلكيزي"  >{{$product->description_en}}</textarea>
                            <script>
CKEDITOR.replace('endesc');
                            </script>



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
      $('.add_more').click(function(e){
        e.preventDefault();
        $(this).before(" <br><label class='btn btn-default btn-file'><input name='imgPath[]' type='file' /> </label>");
    });
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
            desc: {
                required: true

            },
            endesc: {
                required: true

            }
        },
        messages: {// custom messages for radio buttons and checkboxes

            title: {
                required: "يرجى ادخال العنوان "

            },
            title_e: {
                required: "يرجى ادخال العنوان "

            },
            imgPath: {
                required: "يرجى اختيار الصورة "

            },
            desc: {
                required: "يرجى  ادخال الوصف "

            },
            endesc: {
                required: "يرجى ادخال الوصف "

            }
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