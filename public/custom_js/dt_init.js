
function thead_create(str = "") {
    arr = str.split(",");
    var theadString = "";
    arr.forEach(function (val) {
        theadString += "<th>" + val + "</th>";
    });

    return theadString;
}

/* function dt_thead_set(theadString = "") {
    // Setup - add a text input to each footer cell
    thString = thead_create(theadString);
    $('.dataTableCls thead tr:first').append(thString);
    $('.dataTableCls thead tr:first').clone(true).appendTo('.dataTableCls thead');
    $('.dataTableCls thead tr:last th:first').addClass('indexSearch no-sort');
    $('.indexSearch').removeClass('sorting_asc');

} */
function dt_ajax_before_send() {
    recordIds = [];
    /* $("#dynamicTablebody").empty(); */
    $('#optionNo').html(10);
    $('.spinnerTr').removeClass('d-none');
    $('#dataTableId').dataTable().fnClearTable();
    $('#dataTableId').dataTable().fnDestroy();
}
/* function stopPropagation(evt) {
    if (evt.stopPropagation !== undefined) {
        evt.stopPropagation();
    } else {
        evt.cancelBubble = true;
    }
} */
function ajax_complete_dt_initialize() {
    $('.spinnerTr').addClass('d-none');
    var table = $('.dataTableCls').DataTable({
        /* orderCellsTop: true, */
        /*  ordering: false, */
        fixedHeader: true,
        scrollY: '50vh',
        scrollX: true,
        paging: true,
        responsive: false,
        /* processing: true, */
        /* columnDefs : [
            {
                targets: 0,
                render: $.fn.dataTable.render.ellipsis(20),
            },
        ], */
        /*  order: [[ 2, "asc" ]], */
        fixedColumns: {
            left: 0,
            right: 1
        },
        autoWidth: false,
        bInfo: true,
        select: true,
        dom:
            '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
            '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
            '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
            '>tip',
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search',
            searchPlaceholder: 'Search..'
        },
        buttons: [
            {
                extend: 'collection',
                className: 'btn btn-outline-secondary dropdown-toggle me-2',
                text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                buttons: [
                    {
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4;
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4;
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4.trim();
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        className: 'dropdown-item',
                        orientation: 'landscape',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4.trim();
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4;
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    /*  {
                       extend: 'colvis',
                       text: feather.icons['chevrons-down'].toSvg({ class: 'font-small-4 me-50' }) + 'ColumnVisible',
                       className: 'dropdown-item',
                       exportOptions: { columns: [ 0, ':visible' ] }
                     } */
                ],
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function () {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                    }, 50);
                }
            },
        ],
        // buttons: [
        //     {
        //         extend: 'excelHtml5',
        //         title: '',
        //         exportOptions: {
        //             columns: [':visible'],
        //         }
        //     },
        //     {
        //         extend: 'copyHtml5',
        //         exportOptions: {
        //             columns: [ 0, ':visible' ]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         exportOptions: {
        //             columns: ':visible'
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         text: 'Landscape pdf',
        //         orientation: 'landscape',
        //         pageSize: 'LEGAL',
        //         exportOptions: {
        //             columns: ':visible'
        //         }
        //     },
        //     {
        //         text: 'JSON',
        //         action: function ( e, dt, button, config ) {
        //             var data = dt.buttons.exportData();

        //             $.fn.dataTable.fileSave(
        //                 new Blob( [ JSON.stringify( data ) ] ),
        //                 'Export.json'
        //             );
        //         }
        //     },
        //     {
        //         extend: 'print',
        //         exportOptions: {
        //             /* stripHtml : false, */
        //             columns: ':visible',
        //             columns: [':visible'],
        //         }
        //     },
        //     {
        //         extend: 'colvis',
        //         /* title: '', */
        //         exportOptions: {
        //             columns: ':visible'
        //         }
        //     },
        // ],

    });

    // new jQuery.fn.dataTable.FixedHeader( table );


    function checkBox_CheckUncheck(state) {
        //var cols = table.column(0).nodes(); //all pages rows select only
        var cols = table.rows({ page: 'current' }).nodes(); //current page only
        console.log("cols-" + cols.length);

        recordIds = [];
        for (var i = 0; i < cols.length; i += 1) {
            if (cols[i].querySelector("input[type='checkbox']")) {
                cols[i].querySelector("input[type='checkbox']").checked = state;
                if (state) {
                    recordIds.push(cols[i].querySelector("input[type='checkbox']").value);
                }
            }
        }
    }

    $(document).on("change", ".parentCheckbox", function () {
        checkBox_CheckUncheck(this.checked);
    });

    /* $(':input[type="search"]').removeClass('form-control-sm'); */
    /* $('.dt-buttons').addClass(''); */
    /*$(':input[type="search"]').addClass('ag-grid-filter w-50 ');
    $(':input[type="search"]').attr('id','filter-text-box'); */
    /* $('.dataTables_length').addClass(' d-inline float-left'); */
    /* $('.dataTables_filter').addClass('d-inline float-right'); */

    $('.parentCheckbox').prop('checked', false);

    table.buttons().container().appendTo($('.col-md-6:eq(0)', table.table().container()));
    $(':input[type="search"]').attr('placeholder', "Search....");
    $('.dataTableCls thead tr:eq(2) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control dt-search square" placeholder="Search ' + title + '" />');

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table.column(i).search(this.value).draw();
            }
        });
    });

    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
    /*  $('.dataTables_paginate').addClass('float-right');
    $('#dataTableId_wrapper').children('.dt-buttons').addClass('flex-wrap'); */
    $(document).on('click', '.pageLength', function () {
        table.page.len($(this).attr('val')).draw();
        $('#optionNo').html($(this).attr('val'));
    });

}

function ajax_complete_datatable_initialization() {
    $('.spinnerTr').addClass('d-none');
    var table = $('.dataTableCls').DataTable({
        /* orderCellsTop: true, */
        /*  ordering: false, */
        fixedHeader: true,
        scrollY: '50vh',
        scrollX: true,
        paging: true,
        responsive: false,
        /* processing: true, */
        /* columnDefs : [
            {
                targets: 0,
                render: $.fn.dataTable.render.ellipsis(20),
            },
        ], */
        /*  order: [[ 2, "asc" ]], */
        autoWidth: false,
        bInfo: true,
        select: true,
        dom:
            '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
            '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
            '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
            '>tip',
        language: {
            sLengthMenu: 'Show _MENU_',
            search: 'Search',
            searchPlaceholder: 'Search..'
        },
        buttons: [
            {
                extend: 'collection',
                className: 'btn btn-outline-secondary dropdown-toggle me-2',
                text: feather.icons['share'].toSvg({ class: 'font-small-4 me-50' }) + 'Export',
                buttons: [
                    {
                        extend: 'print',
                        text: feather.icons['printer'].toSvg({ class: 'font-small-4 me-50' }) + 'Print',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4;
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'csv',
                        text: feather.icons['file-text'].toSvg({ class: 'font-small-4 me-50' }) + 'Csv',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4;
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'excel',
                        text: feather.icons['file'].toSvg({ class: 'font-small-4 me-50' }) + 'Excel',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4.trim();
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'pdf',
                        text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 me-50' }) + 'Pdf',
                        className: 'dropdown-item',
                        orientation: 'landscape',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4.trim();
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'copy',
                        text: feather.icons['copy'].toSvg({ class: 'font-small-4 me-50' }) + 'Copy',
                        className: 'dropdown-item',
                        exportOptions: {
                            format: {
                                header: function (data, columnIdx) {
                                    /* arr = $(this).closest('table thead').find('tr:first'); */

                                    let position = data.search("placeholder=");
                                    let result = data.substr(position);
                                    let fresult1 = result.replace("placeholder=", "");
                                    let fresult2 = fresult1.replace('"', '');
                                    let fresult3 = fresult2.replace('">', "");
                                    let fresult4 = fresult3.replace('Search', "");
                                    return fresult4;
                                    /* if(columnIdx==0){
                                        return '#';
                                    }
                                    else{
                                        console.log(data);
                                    } */
                                }
                            },
                            columns: [':visible']
                        }
                    },
                    /*  {
                       extend: 'colvis',
                       text: feather.icons['chevrons-down'].toSvg({ class: 'font-small-4 me-50' }) + 'ColumnVisible',
                       className: 'dropdown-item',
                       exportOptions: { columns: [ 0, ':visible' ] }
                     } */
                ],
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary');
                    $(node).parent().removeClass('btn-group');
                    setTimeout(function () {
                        $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                    }, 50);
                }
            },
        ],
        // buttons: [
        //     {
        //         extend: 'excelHtml5',
        //         title: '',
        //         exportOptions: {
        //             columns: [':visible'],
        //         }
        //     },
        //     {
        //         extend: 'copyHtml5',
        //         exportOptions: {
        //             columns: [ 0, ':visible' ]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         exportOptions: {
        //             columns: ':visible'
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         text: 'Landscape pdf',
        //         orientation: 'landscape',
        //         pageSize: 'LEGAL',
        //         exportOptions: {
        //             columns: ':visible'
        //         }
        //     },
        //     {
        //         text: 'JSON',
        //         action: function ( e, dt, button, config ) {
        //             var data = dt.buttons.exportData();

        //             $.fn.dataTable.fileSave(
        //                 new Blob( [ JSON.stringify( data ) ] ),
        //                 'Export.json'
        //             );
        //         }
        //     },
        //     {
        //         extend: 'print',
        //         exportOptions: {
        //             /* stripHtml : false, */
        //             columns: ':visible',
        //             columns: [':visible'],
        //         }
        //     },
        //     {
        //         extend: 'colvis',
        //         /* title: '', */
        //         exportOptions: {
        //             columns: ':visible'
        //         }
        //     },
        // ],

    });

    // new jQuery.fn.dataTable.FixedHeader( table );


    function checkBox_CheckUncheck(state) {
        //var cols = table.column(0).nodes(); //all pages rows select only
        var cols = table.rows({ page: 'current' }).nodes(); //current page only
        console.log("cols-" + cols.length);

        recordIds = [];
        for (var i = 0; i < cols.length; i += 1) {
            if (cols[i].querySelector("input[type='checkbox']")) {
                cols[i].querySelector("input[type='checkbox']").checked = state;
                if (state) {
                    recordIds.push(cols[i].querySelector("input[type='checkbox']").value);
                }
            }
        }
    }

    $(document).on("change", ".parentCheckbox", function () {
        checkBox_CheckUncheck(this.checked);
    });

    /* $(':input[type="search"]').removeClass('form-control-sm'); */
    /* $('.dt-buttons').addClass(''); */
    /*$(':input[type="search"]').addClass('ag-grid-filter w-50 ');
    $(':input[type="search"]').attr('id','filter-text-box'); */
    /* $('.dataTables_length').addClass(' d-inline float-left'); */
    /* $('.dataTables_filter').addClass('d-inline float-right'); */

    $('.parentCheckbox').prop('checked', false);

    table.buttons().container().appendTo($('.col-md-6:eq(0)', table.table().container()));
    $(':input[type="search"]').attr('placeholder', "Search....");
    $('.dataTableCls thead tr:eq(2) th').each(function (i) {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control dt-search square" placeholder="Search ' + title + '" />');

        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table.column(i).search(this.value).draw();
            }
        });
    });

    $('.dataTables_filter .form-control').removeClass('form-control-sm');
    $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');
    /*  $('.dataTables_paginate').addClass('float-right');
    $('#dataTableId_wrapper').children('.dt-buttons').addClass('flex-wrap'); */
    $(document).on('click', '.pageLength', function () {
        table.page.len($(this).attr('val')).draw();
        $('#optionNo').html($(this).attr('val'));
    });

}
