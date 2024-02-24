{{-- model --}}
<div class="modal fade text-left" id="countryModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Country Master </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="countryform">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        @php $fieldname = "country_name"; @endphp  {{-- must be lowercase and with underscore  --}}
                        {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                        {{ Form::text($fieldname,null, ['id' => $fieldname,'class' => 'form-control','placeholder' => 'Enter '.str_replace("_"," ",$fieldname)]) }}
                        <span class="error invalid-feedback {{$fieldname}}_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save_country" class="btn btn-success" >Submit</button>
                    <button type="cancel" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
{{-- model --}}
<div class="modal fade text-left" id="stateModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">State Master </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="stateform">
                @csrf
                <input type="hidden">
                <div class="modal-body">
                    <div class="form-group">
                        @php $fieldname = "state_name"; @endphp  {{-- must be lowercase and with underscore  --}}
                        {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                        {{ Form::text($fieldname,null, ['id' => $fieldname,'class' => 'form-control','placeholder' => 'Enter '.str_replace("_"," ",$fieldname)]) }}
                        <span class="error invalid-feedback {{$fieldname}}_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save_state" class="btn btn-success" >Submit</button>
                    <button type="cancel" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
{{-- model --}}
<div class="modal fade text-left" id="districtModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">District Master </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="districtform">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        @php $fieldname = "district_name"; @endphp  {{-- must be lowercase and with underscore  --}}
                        {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                        {{ Form::text($fieldname,null, ['id' => $fieldname,'class' => 'form-control','placeholder' => 'Enter '.str_replace("_"," ",$fieldname)]) }}
                        <span class="error invalid-feedback {{$fieldname}}_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save_district" class="btn btn-success" >Submit</button>
                    <button type="cancel" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
{{-- model --}}
{{-- model --}}
<div class="modal fade text-left" id="talukaModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Taluka Master </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="talukaform">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        @php $fieldname = "taluka_name"; @endphp  {{-- must be lowercase and with underscore  --}}
                        {{ Form::label( str_replace("_"," ",$fieldname), null, ['class' => 'required control-label']) }}
                        {{ Form::text($fieldname,null, ['id' => $fieldname,'class' => 'form-control','placeholder' => 'Enter '.str_replace("_"," ",$fieldname)]) }}
                        <span class="error invalid-feedback {{$fieldname}}_error"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save_taluka" class="btn btn-success" >Submit</button>
                    <button type="cancel" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
{{-- model --}}

