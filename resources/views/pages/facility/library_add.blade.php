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
{{ Html::style('plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ Html::style('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}
{{ Html::style('plugins/jquery-tags-input/jquery.tagsinput.css') }}
{{ Html::style('plugins/bootstrap-datepicker/css/datepicker3.css') }}
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
{{ Html::style('plugins/icheck/skins/all.css') }}
{{ Html::style('css/plugins.css') }}
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
            Facility Create <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Estate Facilities</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Facility Library</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Create Facility Library</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Create Facility
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title="">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                                </a>
                                <a href="javascript:;" class="reload" data-original-title="" title="">
                                </a>
                                <a href="javascript:;" class="remove" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="library/library_add" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-body">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Facility Image</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="hidden" value="" name="..."><input type="file" name="file" accept="image/*">
                                                    </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Facility Type</label>
                                        <div class="col-md-4">
                                            <select class="form-control" id="facility_type" name="facility_type" data-placeholder="Select...">
                                                @foreach($facility_types as $key => $value)
                                                    <option value="{{$value->id}}">{{$value->type_name}}</option>
                                                @endforeach
                                            </select>
                                            <!-- /input-group -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Facility Name</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Enter Facility Name" name="facility_name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Facility Location</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" placeholder="Enter Facility Location" name="facility_location">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Deposit(Refundable)</label>
                                        <div class="col-md-9">
                                            <div class="input-inline input-medium">
                                                <input id="charge3" type="text" value="0.00" name="deposit" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Facility Charge</label>
                                        <div class="col-md-9">
                                            <div class="input-inline input-medium">
                                                <input id="charge1" type="text" value="0.00" name="facility_charge" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Administrative Charge</label>
                                        <div class="col-md-9">
                                            <div class="input-inline input-medium">
                                                <input id="charge2" type="text" value="0.00" name="administrative_charge" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Equipment</label>
                                        <div class="col-md-8">
                                            <input id="equipment" type="text" class="form-control tags" name="equipment" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Operating Hours</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Specail days</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="icheck-inline">
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='0'> Su </label>
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='1'> Mo </label>
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='2'> Tu </label>
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='3'> We </label>
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='4'> Th </label>
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='5'> Fr </label>
                                                    <label>
                                                    <input type="checkbox" class="icheck" name="special" value='6'> Sa </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_0" style="display:none;">
                                        <label class="control-label col-md-4">Sunday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start_0">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_0">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_1" style="display:none;">
                                        <label class="control-label col-md-4">Monday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start_1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_2" style="display:none;">
                                        <label class="control-label col-md-4">Tuesday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start_2">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_3" style="display:none;">
                                        <label class="control-label col-md-4">Wednesday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start_3">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_4" style="display:none;">
                                        <label class="control-label col-md-4">Thursday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start_4">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_5" style="display:none;">
                                        <label class="control-label col-md-4">Friday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="start_5">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="special_6" style="display:none;">
                                        <label class="control-label col-md-4">Saturday</label>
                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">Start</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default " name="start_6">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="control-label col-md-4">End</label>
                                            <div class="col-md-8">
                                                <div class="input-icon">
                                                    <i class="fa fa-clock-o"></i>
                                                    <input type="text" class="form-control timepicker timepicker-default" name="end_6">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group last">
                                        <label class="col-md-3 control-label">Based Rule</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="icheck-inline">
                                                    <label>
                                                    <input type="radio" name="based" checked class="icheck" value="1" id="rule_session"> Session Based </label>
                                                    <label>
                                                    <input type="radio" name="based" class="icheck" value="0" id="rule_time"> Time Based </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="session_based">
                                        <label class="control-label col-md-3">Session</label>
                                        <div class="col-md-4">
                                            <select name="session_value" class="form-control">
                                                <option value="1">Hourly Session</option>
                                                <option value="2">2 hours per Session</option>
                                                <option value="3">3 hours per Session</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description</label>
                                        <div class="col-md-8">
                                            <textarea class="wysihtml5 form-control" rows="6" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Regulations</label>
                                        <div class="col-md-8">
                                            <textarea class="wysihtml5 form-control" rows="6" name="regulation"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Status</label>
                                        <div class="col-md-4">
                                            <select name="status" class="form-control">
                                                <option value="1">In Operation</option>
                                                <option value="0">Suspended</option>
                                            </select>                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Reservation Required</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <div class="icheck-inline">
                                                    <label>
                                                    <input type="radio" name="reservation" class="icheck" value="1"> Yes </label>
                                                    <label>
                                                    <input type="radio" name="reservation" checked class="icheck" value="0"> No </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Date Range</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="mm/dd/yyyy">
                                                <input type="text" class="form-control" name="from">
                                                <span class="input-group-addon">
                                                to </span>
                                                <input type="text" class="form-control" name="to">
                                            </div>
                                            <!-- /input-group -->
                                            <span class="help-block">
                                            Select date range </span>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label col-md-4">Frame</label>
                                            <div class="col-md-8">
                                                <select name="frame" class="form-control">
                                                    <option value="0">Year</option>
                                                    <option value="1">Month</option>
                                                    <option value="2">Week</option>
                                                </select>             
                                            </div>                               
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <div class="icheck-inline">
                                                        <label>
                                                        <input type="checkbox" name="recurring" class="icheck" value="1">Recurring </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn btn-circle green">Create</button>
                                            <a href="{{url('facility/library')}}" type="button" class="btn btn-circle default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
        </div>
    <!-- END CONTENT -->
    <div>
</div>
<!-- END CONTAINER -->

@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ Html::script('plugins/fuelux/js/spinner.min.js') }}
{{ Html::script('plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}
{{ Html::script('plugins/jquery-tags-input/jquery.tagsinput.min.js') }}
{{ Html::script('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
{{ Html::script('plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}
{{ Html::script('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}
{{ Html::script('plugins/icheck/icheck.min.js') }}
{{ Html::script('js/facility/library_add.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   Library_Add.init();
}); 
</script>
</body>
<!-- END BODY -->
</html>