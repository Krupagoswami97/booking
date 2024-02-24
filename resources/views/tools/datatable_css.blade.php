<!-- Start: DataTable CSS-->
{{-- <link rel="stylesheet" href="{{ asset('plugins/datatable/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/datatables-select/css/select.bootstrap4.min.css')}}">
 --}}
<!-- END: DataTable CSS-->
{{--  <link rel="stylesheet" href="{{asset('plugins/datatable5/datatables.min.css')}}"> --}}


<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('theme/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.css"/> --}}

<style>

table tr td{
    @if (isset($tableLineFlag) && $tableLineFlag == true)
        white-space: nowrap;
        overflow: hidden;
        /* width: 100%; */
    @endif
    text-overflow: ellipsis;   /* not working */
}
.actionBtn{
    white-space: nowrap;
    overflow: hidden;
}
#custDtOverlay {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 12rem;
    left: 0px;
    z-index: 99999;
    background-color: gray;
    filter: alpha(opacity=100);
    -moz-opacity: 0.75;
    opacity: 100;
    display: none;
}
#custDtOverlay h2 {
    position: fixed;
    margin-left: 40%;
    top: 35rem;
}
</style>
