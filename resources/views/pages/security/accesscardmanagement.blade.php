@include('includes/head')
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo">
@include('includes/header')
{{ Html::style('plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}
{{ Html::style('plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ Html::style('plugins/bootstrap-datepicker/css/datepicker3.css') }}
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    @include('includes/sidebar')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content row">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
            Access Card Management <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Estate Security</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Access Card Management</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-truck"></i>Access Cards
                            </div>
                            <div class="actions">
                                <a href="javascript:;" class="btn blue btn-sm btn-new">
                                <i class="fa fa-plus"></i> Request for additional Access Card </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="access_cards_tb">
                                <thead>
                                    <tr>
                                        <th>
                                            Card No.
                                        </th>
                                        <th>
                                            Requested by
                                        </th>
                                        <th>
                                            Issued to
                                        </th>
                                        <th>
                                            Requested on
                                        </th>
                                        <th>
                                            Activated on
                                        </th>
                                        <th>
                                            Expiry Date
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Activity
                                        </th>
                                        <th>
                                            Report Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END CONTENT -->
    <div>
</div>
<!-- END CONTAINER -->

<!-- BEGIN MODALS -->
<div id="new_request" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Access Cards</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="edit-form">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Name ( Owner / Tenant )</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="requested_by" placeholder="">              
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">BIK & Unit No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="unit_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Contact No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="contact_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-5">Documents Required</label>
                            <div class="col-md-7">
                                <select class="form-control select-priority" name="document_type" data-placeholder="Select..." >
                                    <option value="2">Owner</option>
                                    <option value="1">Tenant</option>                                    
                                </select>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-5">Exception Type</label>
                            <div class="col-md-7">
                                <select class="form-control select-priority" name="exception_type" data-placeholder="Select..." >
                                    <option value="0"></option>
                                    <option value="1">Additional</option>
                                    <option value="2">Lost</option>
                                    <option value="3">Damaged</option>
                                </select>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Access Card Charge</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="card_charge" placeholder="$37.45 inclusive of GST" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Card Serial No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="exception_card_no" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if ( $user->role<4 )
                        <hr>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">No. of Access Card Issued</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="card_quantity" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Access Card Serial No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="card_no" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Amount Collected</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="amount_collected" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        <button type="button" class="btn blue btn-ok">Create</button>
    </div>
</div>

<div id="issue_request" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Issue of Access Cards</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="issue-form">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Unit No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_unit_no" placeholder="" readonly="">         
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Lease expiring on</label>                            
                            <div class="col-md-7">
                                <div class="input-group date date-picker" id="issue_lease_expiring_on" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                    <input type="text" class="form-control">
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Proximity Card No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_proximity_card_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Transponder Disc No</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_transponder_disc_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <hr>                   
                        <div class="form-group row">
                            <label class="control-label col-md-5">Additional / Replacement</label>
                        </div>    
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Proximity Card No</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_add_proximity_card_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                            <label class="col-md-3 control-label">Card Receipt No</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_add_card_receipt_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Transponder Disc No</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_add_transponder_disc_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                            <label class="col-md-3 control-label">Disc Receipt No</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_add_disc_receipt_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-5 control-label">Payment</label>
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_payment" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>

                        <hr>
                        <div class="form-group row">
                            <label class="control-label col-md-10">Applicable To Loss Of Proxmitiy Cards/Transponder Disc</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">No. of proximity card lost</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_proximity_cards_lost" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                            <label class="col-md-3 control-label">Card No.</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_proximity_lost_cards_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">No. of transponder disc lost</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_transponder_discs_lost" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                            <label class="col-md-3 control-label">Disc No.</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="issue_transponder_lost_discs_no" placeholder="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>                            
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        <button type="button" class="btn blue btn-ok">Create</button>
    </div>
</div>

<!-- END MODALS -->
@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/jquery.mockjax.js') }}
{{ Html::script('plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ Html::script('plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}
{{ Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ Html::script('js/security/accesscardmanagement.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
    AccessCardManagement.init();

    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            orientation: "left",
            autoclose: true
        });
        //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
    }
});

function showIssueCard(unit_no){

    $('#issue_request input').val('');
    $('#issue_request input[name=issue_unit_no]').val(unit_no);
    $('#issue_request').modal('show');
}

$('#issue_request').on('click', '.btn-ok', function(){
  
    var data = new FormData();
    data.append('unit_no',$('#issue_request input[name=issue_unit_no]').val());
    data.append('lease_expiring_on',moment($('#issue_lease_expiring_on').datepicker('getDate')).format('YYYY-MM-DD'));
    data.append('proximity_card_no',$('#issue_request input[name=issue_proximity_card_no]').val());
    data.append('transponder_disc_no',$('#issue_request select[name=transponder_disc_no]').val());
    data.append('add_proximity_card_no',$('#issue_request select[name=add_proximity_card_no]').val());
    data.append('add_card_receipt_no',$('#issue_request input[name=add_card_receipt_no]').val());
    data.append('add_transponder_disc_no',$('#issue_request input[name=add_transponder_disc_no]').val());
    data.append('add_disc_receipt_no',$('#issue_request input[name=add_disc_receipt_no]').val());
    data.append('payment',$('#issue_request input[name=payment]').val());
    data.append('proximity_cards_lost',$('#issue_request input[name=proximity_cards_lost]').val());
    data.append('proximity_lost_cards_no',$('#issue_request input[name=proximity_lost_cards_no]').val());    
    data.append('transponder_discs_lost',$('#issue_request input[name=transponder_discs_lost]').val());
    data.append('transponder_lost_discs_no',$('#issue_request input[name=transponder_lost_discs_no]').val());    

    var url = $('meta[name=base_url]').attr('content')+"security/accesscardmanagement/issue_accesscard";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url:url,
        method:'post',
        contentType:false,
        processData:false,
        data:data,
        success:function(resp){
           
            $('#issue_request').modal('hide');
        },
        error:function(error){
            console.log(error);
            $('#issue_request').modal('hide');
        }
    });
    //console.log(data);
});       

</script>
</body>
<!-- END BODY -->
</html>