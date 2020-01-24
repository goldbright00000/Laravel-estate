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
{{ Html::style('plugins/bootstrap-datepicker/css/datepicker3.css') }}
{{ Html::style('plugins/datatables/extensions/Scroller/css/
dataTables.scroller.min.css') }}
{{ Html::style('plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('css/operations/financial.css') }}
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
            Facility Management <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Estate Facilities</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Facility Management</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Financial Tables
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse" data-original-title="" title="">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                            <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                @foreach($financialcode as $key => $value)
                                <li class="{{($value->id==1)?'active':''}}">
                                    <a href="#tab_{{$value->id}}" data-toggle="tab" aria-expanded="{{($value->id==1)?'true':''}}">
                                    {{$value->tb_name}} </a>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach($financialcode as $key => $value)
                                    <div class="tab-pane {{($value->id==1)?'active in':''}}" id="tab_{{$value->id}}" style="overflow-x: auto; overflow-y: hidden">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <button id="tab_{{$value->id}}_new" class="btn green">
                                                        Add New <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered" id="table_{{$value->id}}">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="vertical-align: middle;">
                                                             <center>Accounts Description</center>
                                                        </th>
                                                        <th colspan="4" rowspan="1">
                                                            <center>Current Month</center>
                                                        </th>
                                                        <th colspan="4" rowspan="1">
                                                            <center>Year To Date</center>
                                                        </th>
                                                        <th rowspan="2" style="vertical-align: middle;">
                                                            <center>YTD Last Yr</center>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            <center>Actual</center>
                                                        </th>
                                                        <th>
                                                            <center>Budget</center>
                                                        </th>
                                                        <th>
                                                            <center>Variance</center>
                                                        </th>
                                                        <th>
                                                            <center>%</center>
                                                        </th>
                                                        <th>
                                                            <center>Actual</center>
                                                        </th>
                                                        <th>
                                                            <center>Budget</center>
                                                        </th>
                                                        <th>
                                                            <center>Variance</center>
                                                        </th>
                                                        <th>
                                                            <center>%</center>
                                                        </th>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfooter>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td class="cm_actual_total"></td>
                                                        <td class="cm_budget_total"></td>
                                                        <td class="cm_variance_total"></td>
                                                        <td class="cm_percentage_total"></td>
                                                        <td class="ytd_actual_total"></td>
                                                        <td class="ytd_budget_total"></td>
                                                        <td class="ytd_variance_total"></td>
                                                        <td class="ytd_percentage_total"></td>
                                                        <td class="ytd_last_total"></td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </tfooter>
                                         </table>
                                    </div>
                                @endforeach
                            </div>
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
        <h4 class="modal-title">Create New Request</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="edit-form">
                    <div class="form-body">
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Building</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="building" placeholder="Building No">
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Floor</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="floor" placeholder="Floor No">
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 control-label">Unit</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="unit" placeholder="Unit No">
                                    <span class="input-group-addon">
                                    <i class="fa fa-building"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Moving Date</label>
                            <div class="col-md-8">
                                <div class="input-group date date-picker" id="moving_date" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                    <input type="text" class="form-control">
                                    <span class="input-group-btn">
                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
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
        <button type="button" class="btn blue btn-ok">Add</button>
    </div>
</div>
<!-- END MODALS -->
@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/jquery.mockjax.js') }}
{{ Html::script('plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}
{{ Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}
{{ Html::script('plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}
{{ Html::script('plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('js/operations/financial.js') }}
<script type="text/javascript">
var financialcode = <?php echo json_encode($financialcode);?>;
jQuery(document).ready(function() {
    Financial.init();    
}); 
</script>
</body>
<!-- END BODY -->
</html>