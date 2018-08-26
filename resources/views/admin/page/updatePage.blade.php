@extends('admin.app')
@section('title', 'تعديل صفحة')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}"> </a>
    </li>
    <li>تعديل صفحة</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit"></i>
                <span class="caption-subject  sbold uppercase">تعديل صفحة</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" method="post" id="myform"
                  enctype="multipart/form-data"
                  action="{{route('page.update',$page->id)}}" role="form">

                {!! csrf_field() !!}
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                                                                             class="close"
                                                                                             data-dismiss="alert"
                                                                                             aria-label="close">&times;</a>
                    </p>
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
المحتوى

                        </label>
                        <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <div class="col-md-9">
                            <textarea name="desc" placeholder="المحتوى"  >{{$page->descriptione}}</textarea>
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
                        <textarea name="endesc" placeholder="ال محتوىبالإنكليزي"  >{{$page->descriptione_en}}</textarea>
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

<script type="text/javascript" src="{{asset('style/assets/global/scripts/components-dropdowns.js')}}"></script>
<script>

        
$(".chosen-select").chosen({ max_selected_options: 1 });
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
                }, "Value must not equal arg.");
        $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
                }, "Value must not equal arg.");
        $('#myform').validate({
errorElement: 'span', //default input error message container

        errorClass: 'help-block', // default input error message class

        focusInvalid: false, // do not focus the last invalid input

        ignore: "",
        rules: {
            desc: {
                required: true


            }

              
        },
        messages: {// custom messages for radio buttons and checkboxes

            desc: {
                required: "يرجى ادخال الوصف"


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


</script>
@endsection