var recordIds = [];


function recycleIcon(id, deleted_at, arr = '') {
    var IconHTML = "";

    if (forceDeleteFlag) {
        if (deleted_at != null && deleted_at != '') {
            // var IconHTML = "<i val=" + id + " class='icon-refresh-cw feather  ml-50 restore_single'></i>"
            var IconHTML = '<div class="m-50 d-inline">' + feather.icons['refresh-cw'].toSvg({ class: 'font-medium-3 text-danger restore_single', val: id }) + '</div>';
        } else {
            if (arr.length > 0) {
                if ($.inArray(id, arr) == -1) {
                    var IconHTML = '<div class="m-50 d-inline">' + feather.icons['delete'].toSvg({ class: 'font-medium-3 text-danger recycle_single', val: id }) + '</div>';
                } else {
                    var IconHTML = "";
                }
            } else {
                var IconHTML = '<div class="m-50 d-inline">' + feather.icons['delete'].toSvg({ class: 'font-medium-3 text-danger recycle_single', val: id }) + '</div>';
            }
            // var IconHTML = '<div class="m-50 d-inline">' + feather.icons['delete'].toSvg({ class: 'font-medium-3 text-danger recycle_single', val: id }) + '</div>';

        }
    }
    return IconHTML;
}

function checkBoxIcon(id, i) {

    var IconHTML = '<div class="form-check form-check-inline"><input class="form-check-input childCheckbox" type="checkbox" value="' + id + '" id="childCheckbox' + id + '" /><label class="form-check-label" for="childCheckbox' + id + '">' + i + '</label></div></div>';

    return IconHTML;
}
PermissionUpdate = $('#PermissionUpdate').val(); // this permission set from datatable as per given permission , its over-right by particular form to more restrictions
PermissionDelete = $('#PermissionDelete').val(); // this permission set from datatable as per given permission , its over-right by particular form to more restrictions

function actionIcon(id, deleted_at, sideBarFlag = false, arr = '') {
    var IconHTML = "";
    if ($.inArray(id, arr) == -1) {
        $('#document_type').prop('readonly', true);
    } else {
        $('#document_type').prop('readonly', false);
    }
    if (deleted_at != null && deleted_at != '') {
        if (arr.length > 0) {
            if ($.inArray(id, arr) == -1) {
                var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
            } else {
                var DeleteIconHTML = "";
            }
        } else {
            var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
        }

        if (PermissionDelete) {
            IconHTML += DeleteIconHTML;
            feather.replace();
        }
    }
    else {
        if (sideBarFlag) {
            var EditIconHTML = '<div class="m-50 d-inline">' + feather.icons['edit'].toSvg({ class: 'font-medium-3 text-primary editSideBar', val: id }) + '</div>';
        } else {
            var EditIconHTML = '<div class="m-50 d-inline">' + feather.icons['edit'].toSvg({ class: 'font-medium-3 text-primary edit', val: id }) + '</div>';
        }
        if (arr.length > 0) {
            if ($.inArray(id, arr) == -1) {
                var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
            } else {
                var DeleteIconHTML = "";
            }
        } else {
            var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
        }

        if (PermissionUpdate) {
            IconHTML += EditIconHTML;
            feather.replace();
        }
        if (PermissionDelete) {
            IconHTML += DeleteIconHTML;
            feather.replace();
        }
    }
    return IconHTML;
}

function processActionIcon(id, EditRequest = false, ReceiveEditRequest = false, deleted_at) {
    var IconHTML = "";
    if (deleted_at != null && deleted_at != '') {
        if (arr.length > 0) {
            if ($.inArray(id, arr) == -1) {
                var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
            } else {
                var DeleteIconHTML = "";
            }
        } else {
            var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
        }
        if (PermissionDelete) {
            IconHTML += DeleteIconHTML;
            feather.replace();
        }
    } else {
        if (EditRequest) {
            var EditIconHTML = '<div class="m-50 d-inline">' + feather.icons['edit'].toSvg({ class: 'font-medium-3 text-warning edit', val: id }) + '</div>';
        } else {
            var EditIconHTML = "";
        }
        if (ReceiveEditRequest) {
            var ReceiveEditIconHTML = '<div class="m-50 d-inline">' + feather.icons['check-circle'].toSvg({ class: 'font-medium-3 text-primary sales_edit', val: id }) + '</div>';
        } else {
            var ReceiveEditIconHTML = "";
        }
        if (PermissionDelete) {
            var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
            IconHTML = EditIconHTML + ReceiveEditIconHTML + DeleteIconHTML;
        } else {
            IconHTML = EditIconHTML + ReceiveEditIconHTML;
        }
    }

    return IconHTML;
}

function actionInquiryIcon(id, deleted_at, sideBarFlag = false, arr = '') {
    var IconHTML = "";
    if (deleted_at != null && deleted_at != '') {
        if (arr.length > 0) {
            if ($.inArray(id, arr) == -1) {
                var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
            } else {
                var DeleteIconHTML = "";
            }
        } else {
            var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
        }

        if (PermissionDelete) {
            IconHTML += DeleteIconHTML;
            feather.replace();
        }
    } else {
        if (sideBarFlag) {
            if (sideBarFlag == 'inquiryPendding') {
                var EditIconHTML = '<div class="m-50 d-inline">' + feather.icons['edit'].toSvg({ class: 'font-medium-3 text-primary changeInquiryStatus', val: id }) + '</div>';
            } else {
                var EditIconHTML = "";
            }
        }
        if (arr.length > 0) {
            if ($.inArray(id, arr) == -1) {
                var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
            } else {
                var DeleteIconHTML = "";
            }
        } else {
            var DeleteIconHTML = '<div class="m-50 d-inline">' + feather.icons['trash'].toSvg({ class: 'font-medium-3 text-danger delete_single', val: id }) + '</div>';
        }

        if (PermissionUpdate) {
            IconHTML += EditIconHTML;
            feather.replace();
        }
        if (PermissionDelete) {
            IconHTML += DeleteIconHTML;
            feather.replace();
        }
    }
    return IconHTML;
}

/* Recycle Row */
var customRecycle = function (val) {
    var color = "";
    if (val != null && val != "") {
        color = "danger";
        return "<div class='badge badge-pill badge-light-" + color + "' >Deleted</div>";
    } else {
        color = "success"
        return "<div class='badge badge-pill badge-light-" + color + "' >Safe</div>";
    }
}

// /* Status Row */
// var customStatus = function (val) {
//     var color = "";
//     if (val == 'DEACTIVE') {
//         color = "danger";
//         return "<div class='badge badge-pill badge-light-" + color + "' > " + val + "</div>";
//     } else if(val == 'ACTIVE'){
//         color = "success"
//         return "<div class='badge badge-pill badge-light-" + color + "' > " + val + " </div>";
//     }else{
//         return '';
//     }
// }

function customStatus(val) {
    var str = '';
    switch (val) {
        case "ACTIVE":
            str = '<span class="badge badge-glow bg-info">' + val + '</span>'
            break;
        case "DEACTIVE":
            str = '<span class="badge badge-glow bg-danger">' + val + '</span>'
            break;

        default:
            str = '<span class="badge badge-glow bg-danger">Not Found</span>'
            break;
    }
    return str;
}

/* $(document).on("change",".parentCheckbox",function(){
    // $('input:checkbox').not(this).prop('checked', this.checked);
    if(this.checked){
        $('.childCheckbox').trigger('click');
    }else{
        $('.childCheckbox').trigger('click');
        $('input:checkbox').not(this).prop('checked', false);
        recordIds = [];
    }
}); */

$(document).on("change", ".childCheckbox", function () {

    if (this.checked) {
        recordIds.push($(this).val());
        // check all children
        var lenchk = $('.childCheckbox');
        var lenchkChecked = $('.childCheckbox:checked');

        //if all siblings are checked, check its parent checkbox
        if (lenchk.length == lenchkChecked.length) {
            $('input:checkbox').not(this).prop('checked', this.checked);
        } else {
            $('.parentCheckbox').prop('checked', false);
        }
    } else {
        var removeItem = $(this).val();
        recordIds = jQuery.grep(recordIds, function (value) {
            return value != removeItem;
        });
        $('.parentCheckbox').prop('checked', false);
    }
});

// Scrollbar - For Sidebar Only
/* if ($(".data-items").length > 0) { //from old theme
    new PerfectScrollbar(".data-items", { wheelPropagation: false })
} */

// mac chrome checkbox fix
/* if (navigator.userAgent.indexOf("Mac OS X") != -1) {
    $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
} */

/*Delete Single Record Clicl*/
$(document).on("click", '.delete_single', function () {
    delete_record_single($(this).attr('val'));
});
/*Restore Single Record Clicl*/
$(document).on("click", '.restore_single', function () {
    restore_record_single($(this).attr('val'));
});
/*Recycle Single Record Clicl*/
$(document).on("click", '.recycle_single', function () {
    recycle_record_single($(this).attr('val'));
});

/* change Status */
$(document).on("click", '.changeInquiryStatus', function () {
    change_inquiry_status($(this).attr('val'));
});

/*Delete Multiple Record */
$(document).on("click", '.delete', function (value) {
    if (recordIds.length > 0) {
        delete_record(recordIds);
    }
    else {
        error_msg('Please Select Rows to Delete!');
    }
});

// function delete_record_single(id) {
//     recordIds = [];
//     recordIds.push(id);
//     delete_record(recordIds);
// }

function delete_record_single(id) {
    recordIds = [];
    recordIds.push(id);
    delete_record(recordIds);
}

function change_inquiry_status(id) {
    recordIds = [];
    recordIds.push(id);
    change_record_status(recordIds);
}

function recycle_record_single(id) {
    recordIds = [];
    recordIds.push(id);
    recycle_record(recordIds);
}

function restore_record_single(id) {
    recordIds = [];
    recordIds.push(id);
    restore_record(recordIds);
}

/* Edit Record */
$(document).on("click", '.edit', function () {
    var url = EditUrl;
    var new_url = url.replace(':id', $(this).attr('val'));
    window.location.href = new_url;
});

/* Receive Edit Record */
$(document).on("click", '.sales_edit', function () { // for process only
    var url = SalesEditUrl;
    var new_url = url.replace(':id', $(this).attr('val'));
    window.location.href = new_url;
});

function RecordArrayEmpty() {
    recordIds = [];
    $('.parentCheckbox').prop("checked", false).change();
}

/*** change status Record AJax ***/
function change_record_status(recordIds) {
    var themeClass = "";
    if (localStorage.getItem('light-layout-current-skin') == 'light-layout') {
        themeClass = "";
        themeTextColor = "";
    } else {
        themeClass = "dark-box";
        themeTextColor = "text-white";
    }

    Swal.fire({
        title: "Are you sure you want to Update status pendding to complete " + recordIds.length + " Row(s) ?",
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Updated it!',
        customClass: {
            popup: themeClass,
            htmlContainer: themeTextColor,
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false,
        willClose: () => {
            RecordArrayEmpty;
        }
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: ChangeStatusUrl,
                method: 'post',
                headers: {
                    Authorization: token
                },
                data: {
                    'id': recordIds,
                    '_token': "{{ csrf_token() }}",
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == true) {
                        success_msg(response.message);
                        get_data();
                    }
                    else {
                        error_msg(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 401) {
                        $('#Logout').click();;
                    }
                    else {
                        api_error_display(jqXHR);
                    }
                }
            });
        }
    })
}

/*** Delete Record AJax ***/
function delete_record(recordIds) {
    var themeClass = "";
    if (localStorage.getItem('light-layout-current-skin') == 'light-layout') {
        themeClass = "";
        themeTextColor = "";
    } else {
        themeClass = "dark-box";
        themeTextColor = "text-white";
    }

    Swal.fire({
        title: "Are you sure you want to remove " + recordIds.length + " Row(s) ?",
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            popup: themeClass,
            htmlContainer: themeTextColor,
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false,
        willClose: () => {
            RecordArrayEmpty;
        }
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: DeleteUrl,
                method: 'post',
                headers: {
                    Authorization: token
                },
                data: {
                    'id': recordIds,
                    '_token': "{{ csrf_token() }}",
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == true) {
                        success_msg(response.message);
                        get_data();
                    }
                    else {
                        error_msg(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 401) {
                        $('#Logout').click();;
                    }
                    else {
                        api_error_display(jqXHR);
                    }
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            cancel_delete();
        }
    })
}

function restore_record(recordIds) {
    var themeClass = "";
    if (localStorage.getItem('light-layout-current-skin') == 'light-layout') {
        themeClass = "";
        themeTextColor = "";
    } else {
        themeClass = "dark-box";
        themeTextColor = "text-white";
    }
    Swal.fire({
        title: "Are you sure you want to restore " + recordIds.length + " record(s) ?",
        //text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, restore it!',
        customClass: {
            popup: themeClass,
            htmlContainer: themeTextColor,
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false,
        willClose: () => {
            RecordArrayEmpty;
        },
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: RestoreUrl,
                method: 'post',
                headers: {
                    Authorization: token
                },
                data: {
                    'id': recordIds,
                    '_token': "{{ csrf_token() }}",
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == true) {
                        success_msg(response.message);
                        get_data();
                    }
                    else {
                        error_msg(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 401) {
                        $('#Logout').click();;
                    }
                    else {
                        api_error_display(jqXHR);
                    }
                }
            });
        }
    })
}

function recycle_record(recordIds) {
    var themeClass = "";
    if (localStorage.getItem('light-layout-current-skin') == 'light-layout') {
        themeClass = "";
        themeTextColor = "";
    } else {
        themeClass = "dark-box";
        themeTextColor = "text-white";
    }
    Swal.fire({
        title: "Are you sure you want to move " + recordIds.length + " record(s) into recycle ?",
        //text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes',
        customClass: {
            popup: themeClass,
            htmlContainer: themeTextColor,
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ms-1'
        },
        buttonsStyling: false,
        willClose: () => {
            RecordArrayEmpty;
        },
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: RecycleUrl,
                method: 'post',
                headers: {
                    Authorization: token
                },
                data: {
                    'id': recordIds,
                    '_token': "{{ csrf_token() }}",
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == true) {
                        success_msg(response.message);
                        get_data();
                    }
                    else {
                        error_msg(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 401) {
                        $('#Logout').click();;
                    }
                    else {
                        api_error_display(jqXHR);
                    }
                }
            });
        }
    })
}
