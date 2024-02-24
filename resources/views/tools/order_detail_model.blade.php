<div class="modal fade text-left" id="OrderDetailModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabelOrder" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100" id="myModalLabelOrder"><span id="orderNUMBER"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="col-md-12 col-12">
                        <!-- Responsive tables start -->
                        <div class="table-responsive">
                            {{-- <h3 style="background-color: rgb(31, 26, 26);text-align:center;padding:2px;width:100%;">Order Detail</h3> --}}
                            <table class="table table-bordered">
                                <thead class="table-active">
                                    <tr>
                                        <th class="pr-5" scope="col">Category</th>
                                        <th class="pr-5" scope="col">Subcategory</th>
                                        <th class="pr-5" scope="col">Item</th>
                                        <th class="pr-5" scope="col">TagItem</th>
                                        <th class="pr-5" scope="col">ProcessQuantity</th>
                                    </tr>
                                </thead>
                                <tbody id="order_detail_dynamic_body">

                                </tbody>
                            </table>
                        </div>
                        <!-- Responsive tables end -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="cancel" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
</div>
