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
                    <li class="breadcrumb-item active">{{$pageTitle}}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<section id="index">
    <!--  Action Start -->
    <div class="action-btns">
        <div class="btn-dropdown mr-1 mb-1 ">
            <a href="{{ $pageCreateUrl }}" class="btn btn-outline-primary pb-1 pt-1 add_new_button" tabindex="0">
                Add New</span>
            </a>
        </div>
    </div>
    <!-- //  Action End -->

    @include('tools.datatable_layout_sticky')
</section>
@endsection

@section('js')
@include('tools.datatable_js')
<script src="{{asset('custom_js/dt_init.js?v='.time())}}"></script>
<script src="{{asset('custom_js/dt_index_file.js?v='.time())}}"></script>

<script>
    dt_thead_set('BookingDate,CustomerName,Email,BookingType,BookingSlot,BookingTime');

    /* ---- PageUrl Begin ----- */
    GetDataUrl = api_url + "/booking/list";
    DeleteUrl = api_url + "/booking/delete";

    /* ---- PageUrl End ----- */

    get_data();

    function get_data() {

        /* Bind Table */
        $.ajax({
            url: GetDataUrl
            , method: 'post'
            , cache: false
            , data: {
                "indexFlag": "true"
            , }
            , headers: {
                Authorization: token
            }
            , beforeSend: function() {
                dt_ajax_before_send();
            }
            , success: function(response) {
                console.log(response);
                if (response.success == true) {
                    var records = "";
                    i = 1;
                    console.log(response.results.records);
                    $.each(response.results.records, function(key, val) {
                        records += '<tr id="row' + i + '">';
                        records += '<td>' + checkBoxIcon(val.id, i) + '</td>';
                        records += '<td>' + val.booking_date + '</td>';
                        records += '<td>' + nullCheck(val.customer_name) + '</td>';
                        records += '<td>' + nullCheck(val.customer_email) + '</td>';
                        records += '<td>' + nullCheck(val.booking_type) + '</td>';
                        records += '<td>' + nullCheck(val.booking_slot) + '</td>';
                        records += '<td>' + nullCheck(val.booking_from) + '</td>';
                        records += '</tr>';
                        i++;
                    });
                    $("#dynamicTablebody").append(records);
                } else {
                    error_msg(response.message);
                }
            }
            , error: function(jqXHR, textStatus, errorThrown) {
                ajax_error_event(jqXHR);
            }
            , complete: function() {
                ajax_complete_dt_initialize();
            }
        });
    }

    function dt_thead_set(theadString = "") {
        thString = thead_create(theadString);
        $('.dataTableCls thead tr:first').append(thString);
        $('.dataTableCls thead tr:first').clone(true).appendTo('.dataTableCls thead');
        $('.dataTableCls thead tr:last th:first').addClass('indexSearch no-sort');
        $('.dataTableCls thead th:last-child').addClass('sticky_title');
        $('.indexSearch').removeClass('sorting_asc');
    }

</script>

@endsection
