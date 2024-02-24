@extends('layout.app')
@php
$pageTitle = "Booking";
$pageIndexUrl = route('booking.index');
$pageCreateUrl = route('booking.create');
$mainDashboard = route('main_dashboard');
$tableLineFlag = true;
@endphp
@section('title') {{$pageTitle}} @endsection

@section('css')
@include('tools.datatable_css')
@endsection

@section('breadcrumbs')
<div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h2 class="content-header-title float-start mb-0">{{$pageTitle}}</h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{$mainDashboard}}">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ $pageIndexUrl }}">{{$pageTitle}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ (isset($id) && !empty($id)) ? 'Update' : 'New' }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4 class="card-title">{{ (isset($id) && !empty($id)) ? 'Update' : 'New' }} {{$pageTitle}}</h4>
                </div>
                <div class="card-body py-2 my-25">
                    <form id="form1" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mb-2">
                                @php $fieldname = "customer_name"; @endphp {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                                {{ Form::text($fieldname,null, [
                                    'class' => 'form-control '.$fieldname,
                                    'placeholder' => 'Enter '.str_replace("_"," ",$fieldname),
                                    'id' => $fieldname,
                                ]) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                @php $fieldname = "customer_email"; @endphp {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                                {{ Form::text($fieldname,null, [
                                    'class' => 'form-control '.$fieldname,
                                    'placeholder' => 'Enter '.str_replace("_"," ",$fieldname),
                                    'id' => $fieldname,
                                ]) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                @php $fieldname = "booking_type"; @endphp  {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                                {{ Form::select($fieldname, ["Full Day" => "Full Day","Half Day" => "Half Day","Custom" => "Custom"], null, ['id'=>$fieldname,'class' => 'form-control select2 fm2 text-capitalize '.$fieldname,'placeholder' => 'Please Select Booking Type']) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 col-md-6 mb-2" id="slotDiv">
                                @php $fieldname = "booking_slot"; @endphp  {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                                {{ Form::select($fieldname, ["First Half" => "First Half","Second Half" => "Second Half"], null, ['id'=>$fieldname,'class' => 'form-control select2 fm2 text-capitalize '.$fieldname,'placeholder' => 'Please Select Booking Slot']) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                @php $fieldname = "booking_date"; @endphp {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                                {{ Form::text($fieldname,date('d-m-Y'), [
                                    'class' => 'form-control '.$fieldname,
                                    'placeholder' => 'Enter '.str_replace("_"," ",$fieldname),
                                    'id' => $fieldname,
                                ]) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 col-md-6 mb-2" id="fromBookingDiv">
                                @php $fieldname = "booking_from"; @endphp {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                                {{ Form::text($fieldname,null, [
                                    'class' => 'form-control '.$fieldname,
                                    'placeholder' => 'Enter '.str_replace("_"," ",$fieldname),
                                    'id' => $fieldname,
                                ]) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 col-md-6 mb-2" id="toBookingDiv">
                                @php $fieldname = "booking_to"; @endphp {{-- must be lowercase and with underscore --}}
                                {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'control-label']) }}
                                {{ Form::text($fieldname,null, [
                                    'class' => 'form-control  '.$fieldname,
                                    'placeholder' => 'Enter '.str_replace("_"," ",$fieldname),
                                    'id' => $fieldname,
                                ]) }}
                                <span class="error invalid-feedback {{$fieldname}}_error"></span>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <div id="hiddenField">

                                </div>
                                <button type="submit" id="save1" value="add" class="btn btn-primary glow  mt-1 me-1">Save</button>
                                <button type="submit" id="saveNclose1" class="btn btn-warning glow  mt-1 me-1">Save & Close </button>
                                <button type="reset" value="form1" class="reset btn btn-outline-success  mt-1 me-1">Reset</button>
                                <a href="{{ $pageIndexUrl }}" class="btn btn-outline-danger  mt-1 me-1 cancel">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<!-- BEGIN: Page JS-->
@include('tools.datatable_js')
<script src="{{asset('custom_js/dt_init.js?v='.time())}}"></script>
<script src="{{asset('custom_js/dt_index_file.js?v='.time())}}"></script>

<script>

    InfoStoreUrl = api_url + "/booking/store";

    $('button[class~="reset"]').click(function() {
        formName = this.value;
        formReset(formName);
    });

    function formReset(formName) {
        switch (formName) {
            case "form1":
                $("input[type=radio]").click();
                $('#UserProfile').attr('src', "{{ asset('media/defaults/symbol.png') }}");
                $("#FileUpload1").val(null);
                $("#UserProfile").html('Choose File');
                $("#showImage").html('');
                $(".select2").val(null).trigger('change');
                $("#form1")[0].reset();
                $('#category').empty();
                $('#category').append('<option value="">Please Select Category</option>')
                bind_category();
                $('#hiddenField').html('');
                break;
        }
    }

    $(document).on('change', '#booking_type', function() {
        var bookingType = $(this).val();
        if (bookingType == 'Half Day') {
            $('#slotDiv').removeClass('d-none');
            $('#toBookingDiv').addClass('d-none');
            $('#fromBookingDiv').addClass('d-none');
        } else if(bookingType == 'Custom'){
            $('#toBookingDiv').removeClass('d-none');
            $('#fromBookingDiv').removeClass('d-none');
            $('#slotDiv').addClass('d-none');
        }else {
            $('#slotDiv').addClass('d-none');
            $('#toBookingDiv').addClass('d-none');
            $('#fromBookingDiv').addClass('d-none');
        }


    });

    $(document).on('submit', '#form1', function(e) {

        e.preventDefault();

        $(".is-invalid").removeClass("is-invalid");
        $(".error").html("");
        var action = $('#save1').val();
        var url = '';
        if (action == 'add') {
            $("#hiddenField").html("");
            url = InfoStoreUrl;
            fd = new FormData(this);
        }
        if (action == 'edit') {
            url = InfoUpdateUrl;
            fd = new FormData(this);
            fd.append('id', $('#row').val());
        }
        $.ajax({
            url: url
            , method: 'post'
            , data: fd
            , contentType: false
            , cache: false
            , processData: false
            , headers: {
                Authorization: token
            }
            , success: function(response) {
                //console.log(response.results.data.id);
                if (response.success == true) {
                    var html = '<input type="hidden" name="row" value="' + response.results.records.id + '" id="row">';
                    $("#hiddenField").html(html);

                    success_msg(response.message);
                    if (e.originalEvent.submitter.id == "saveNclose1") {
                        window.location.href = $('.cancel').attr('href');
                    }
                } else {
                    error_msg(response.message);
                }
            }
            , error: function(jqXHR, textStatus, errorThrown) {
                ajax_error_event(jqXHR);
            }
        });
    });

    @if(isset($id) && !empty($id))
    $('button[class~="reset"]').addClass('d-none');
    $('#save1').val('edit');
    var html = '<input type="hidden" name="row" value="{{$id}}" id="row">';
    $("#hiddenField").html(html);
    $('#end_date').attr('disabled', true);

    $.ajax({
        url: EditUrl
        , method: 'post'
        , data: {
            id: "{{$id}}"
        }
        , cache: false
        , headers: {
            Authorization: token
        }
        , success: function(response) {
            console.log(response);
            if (response.success == true) {
                $.each(response.results.records, function(key, val) {
                    if (key == 'category_id') {

                    } else {
                        $("#" + key).val(val);
                    }
                });

            } else {
                error_msg(response.message);
            }
        }
        , error: function(jqXHR, textStatus, errorThrown) {
            ajax_error_event(jqXHR);
        }
    });
    @endif

</script>
@endsection
