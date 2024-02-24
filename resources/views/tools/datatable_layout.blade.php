<div class="card" style="min-height: 85vh;height:auto;">
    <div class="card-content">
        <div class="card-body p-0">
           {{--  <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-between flex-wrap mb-1">
                        <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-secondary waves-effect waves-light">
                                    Show <span id="optionNo">10</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split waves-effect" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <span class="dropdown-item pageLength" val="10">10</span>
                                    <span class="dropdown-item pageLength" val="20">20</span>
                                    <span class="dropdown-item pageLength" val="50">50</span>
                                    <span class="dropdown-item pageLength" val="100">100</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="action-btns">
                                <div class="btn-dropdown ">
                                    <div class="btn-group dropdown actions-dropodown">
                                        <button type="button" class="border btn btn-outline-secondary  dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu custm-action-dropdown">
                                                <a class="dropdown-item delete" href="javascript:void(0)"><i data-feather="trash"></i> Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="table-responsive "  style="overflow: hidden;">
                <table class="table   dataTableCls " id="dataTableId" style="width:100%" cellspacing="0" style="border: 1px solid grey;overflow:scroll;">
                    <thead >
                        <tr>
                            <th>
                                <div class="form-check form-check-inline d-flex justify">
                                    <input class="form-check-input parentCheckbox " type="checkbox" id="parentCheckbox1" onclick="event.stopPropagation()" />
                                    <label class="form-check-label" for="parentCheckbox1" style="margin-right: 5px !important;margin-left: 5px !important">#</label>
                                    <i data-feather="trash-2" class="delete "></i>
                                </div>
                            </th>
                            <th>Actions</th>
                        </tr>
                        <tr class="spinnerTr">
                            <td colspan="100" class="text-center" id="spiinerTd">
                                {{-- <div id="custDtOverlay"><h2>Loading .. Please wait</h2></div> --}}
                                <div>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody id="dynamicTablebody">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


