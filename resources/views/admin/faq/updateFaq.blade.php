@extends('admin.app')
@section('title', 'تعديل  سؤال')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">    </a>
    </li>
    <li>تعديل سؤال</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-edit"></i>
                <span class="caption-subject  sbold uppercase">تعديل سؤال</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" method="post"  id="myform"

                  action="{{route('faqs.update',$faq)}}" role="form">
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
                        <label class="col-md-3 control-label">
                            السؤال

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium"
                                   name="qusation"    placeholder="السؤال "
                                   required="" value="{{$faq->qusation}}"
                                    >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            الجواب
                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium"
                                   name="answer"    placeholder=" الجواب "
                                   required="" value="{{$faq->answer}}"
                                    >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
السؤال بالانكليزي

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium"
                                   name="qusationen"    placeholder=" السؤال بالانكليزي"
                                   required="" value="{{$faq->qusation_en}}"
                                    >

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">
الجواب بالانكليزي
                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium"
                                   name="answeren"    placeholder=" الجواب بالانكليزي "
                                   required="" value="{{$faq->answer_en}}"
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

           qusation: {

                    required: "يرجى ادخال السؤال "

                },

                answer: {

                    required: "يرجى ادخال الجواب "

                },
                qusationen: {

                    required: "يرجى ادخال السؤال "

                },

                answeren: {

                    required: "يرجى ادخال الجواب "

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

    $("#myform22").validate({
        rules: {
            field: {
                required: true,
                minlength: 5
            }
        }
    });

</script>
@endsection