@extends('layout.app')
@php

use App\Models\Booking;
$totalBooking = Booking::count();

@endphp

@section('title') Dashboard @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/css/plugins/charts/chart-apex.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/charts/apexcharts.css') }}">
<style>
    /* .resize-triggers>div {
    background: #eee;
    overflow: auto;
}
<style>
.resize-triggers, .resize-triggers>div, .contract-trigger:before {
    content: " ";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    overflow: hidden;
} */
    .custom-bl {
        /* break large string and eclipse */
        padding-top: 1mm;
        /*  display: block;
            overflow:hidden;
            text-overflow:ellipsis; */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .custom-bl:hover {
        overflow: visible;
        white-space: normal;
        height: auto;
        /* just added this line */
        z-index: 5;
    }

    /* .custom-dc{
            height: 12rem;
        }
        .control-label{
            text-transform: capitalize;
        } */
    .card-body a {
        color: #625f6e !important;
        text-decoration: none;
    }

</style>
@endsection

@section('sidebar') @include('sidebar.main') @endsection

@section('content')

<section id="dashboard-analytics">
    <!-- Stats Vertical Card -->

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row avg-sessions pt-50">
                        <div class="col-12 mb-1">
                            <p class="mb-1"><b>Total Booking</b></p>
                            <span style="color:blue">{{ $totalBooking }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Stats Vertical Card -->
</section>
@endsection

@section('js')
@endsection
