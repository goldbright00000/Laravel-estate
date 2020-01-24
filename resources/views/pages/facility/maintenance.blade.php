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
            Estate Profile <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Estate Facility</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Maintenance & Repair</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_reversed_1_1" data-toggle="tab">
                            Maintenance & Repair </a>
                        </li>
                        <li>
                            <a href="#tab_reversed_1_2" data-toggle="tab">
                            Jobs </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab_reversed_1_1">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-truck"></i>Maintenance & Repair Requests
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn blue btn-sm btn-new">
                                        <i class="fa fa-plus"></i> New Request </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="maintenance_tb">
                                        <thead>
                                            <tr>
                                                <th>
                                                     Building-Floor-Unit
                                                </th>
                                                <th>
                                                     Type
                                                </th>
                                                <th>
                                                    Created Date
                                                </th>
                                                <th>
                                                    Assigned
                                                </th>
                                                <th>
                                                     Status
                                                </th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_reversed_1_2">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-truck"></i>Maintenance & Repair Jobs
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn blue btn-sm btn-new-job">
                                        <i class="fa fa-plus"></i> New Job </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="jobs_tb">
                                        <thead>
                                            <tr>
                                                <th>
                                                     Job Name
                                                </th>
                                                <th>
                                                     Job Description
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
        <h4 class="modal-title">Create Maintenance & Repair Request</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="edit-form">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Building-Floor-Unit</label>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="building" placeholder="Building No">
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                             <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="floor" placeholder="Floor No">
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="unit" placeholder="Unit No">
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Maintenance Type</label>
                            <div class="col-md-4">
                                <select class="form-control select-type" name="job_type" data-placeholder="Select..." >
                                    @foreach($jobs as $key => $value)
                                        <option value="{{$value->id}}" data-text="{{$value->job_name}}">{{$value->job_name}}</option>
                                    @endforeach
                                </select>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Priority</label>
                            <div class="col-md-4">
                                <select class="form-control select-priority" name="priority" data-placeholder="Select..." >
                                    <option value="3">High</option>
                                    <option value="2">Normal</option>
                                    <option value="1">Low</option>
                                </select>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Subject</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="subject" placeholder="Maintenance Subject">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Details</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" rows="5" name="details" placeholder="Maintenance Details"></textarea>
                            </div>
                        </div>
                        <h4>Uploads Attach Files</h4>
                        <hr>
                        <div class="row">
                            <div class="fileinput fileinput-new col-md-4" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
                                <div>
                                    <span class="btn default btn-file">
                                    <span class="fileinput-new">
                                    Select image </span>
                                    <span class="fileinput-exists">
                                    Change </span>
                                    <input type="hidden" value="" name=""><input type="file" name="attach1" accept="image/*">
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                    Remove </a>
                                </div>
                            </div>
                            <div class="fileinput fileinput-new col-md-4" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
                                <div>
                                    <span class="btn default btn-file">
                                    <span class="fileinput-new">
                                    Select image </span>
                                    <span class="fileinput-exists">
                                    Change </span>
                                    <input type="hidden" value="" name=""><input type="file" name="attach2" accept="image/*">
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                    Remove </a>
                                </div>
                            </div>
                            <div class="fileinput fileinput-new col-md-4" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
                                <div>
                                    <span class="btn default btn-file">
                                    <span class="fileinput-new">
                                    Select image </span>
                                    <span class="fileinput-exists">
                                    Change </span>
                                    <input type="hidden" value="" name=""><input type="file" name="attach3" accept="image/*">
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                    Remove </a>
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

<div id="new_job" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">New Job</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="edit-form">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" id="form_control_1" name="job_name">
                            <label for="form_control_1">Job Name</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <textarea class="form-control" rows="5" name="description"></textarea>
                            <label for="form_control_1">Job Description</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
        <button type="button" class="btn blue btn-ok">Add</button>
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
{{ Html::script('js/facility/maintenance.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   EstateMaintenance.init();
}); 
</script>
</body>
<!-- END BODY -->
</html>