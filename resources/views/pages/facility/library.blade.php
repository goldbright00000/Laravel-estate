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
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('css/facility/library.css') }}
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
            Facility Library <small></small>
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
                    </li>
                </ul>
                <div class="page-toolbar">
                    @if ( !($user->role>=4 && $user->role<=9))
                    <a type="button" href="{{url('facility/library_add')}}" class="btn btn-success btn-add-facaility"><i class="fa fa-plus"></i>Add Facility</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <!--div class="col-md-12"-->
                    <!-- BEGIN PAGE CONTENT-->
                    @foreach($facility_types as $key => $value)
                        <?php $serach_keys = array_keys(array_column(json_decode(json_encode($facilities), true), 'facility_type'), $value->id);?>
                        @if(count($serach_keys)>0)
                           
                            @foreach($serach_keys as $key1 => $value1)
                                <div class="tiles col-md-4">
                                    <div class="tile image">
                                        <a class="tile-body" href="{{url('facility/library/library_view/'.$facilities[$value1]->id)}}">
                                            @if($facilities[$value1]->image_name)
                                            <img src="{{asset('uploads/images/facility/'.$facilities[$value1]->image_name.'.'.$facilities[$value1]->image_ext)}}" alt="">
                                            @else
                                            <img src="{{asset('img/icon-no-image.png')}}" alt="">
                                            @endif
                                        </a>
                                        <!--div class="tile-object">
                                            <div class="name">
                                                 {{$facilities[$value1]->facility_name}}
                                            </div>
                                        </div-->
                                    </div>
                                    <div class="tile-object">
                                        {{$facilities[$value1]->facility_name}} - {{$facilities[$value1]->facility_location}}
                                    </div>                                    
                                </div>
                                
                                
                            @endforeach
                        @endif
                    @endforeach
                    <!-- END PAGE CONTENT-->
                <!--/div-->
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
{{ Html::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ Html::script('js/service/moving.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   EstateMoving.init();
}); 
</script>
</body>
<!-- END BODY -->
</html>