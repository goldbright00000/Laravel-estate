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
{{ Html::style('plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('css/facility/library_view.css') }}
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
            Facility Book <small></small>
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
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                @if(strlen($error = $errors->first('error')))
                    <div id="prefix_1108441613502" class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Please Select Time Again.</div>
                @endif
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-equalizer font-green-haze"></i>
                                <span class="caption-subject font-green-haze bold uppercase">Facility</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form class="form-horizontal" action="{{url('facility/library/library_book')}}" method="post" role="form">
                                <div class="form-body">
                                    {{csrf_field()}}
                                    <input type="hidden" name="facility_id" value="{{$facility->id}}"/>
                                    <h2 class="margin-bottom-20"> Book Facility - {{$facility->facility_name}} </h2>
                                    <h3 class="form-section"></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="preview-pane col-md-12">
                                                <p style="text-align:center">
                                                    @if($facility->image_name)
                                                    <img src="{{asset('uploads/images/facility/'.$facility->image_name.'.'.$facility->image_ext)}}"/>
                                                    @else
                                                    <img src="{{asset('img/icon-no-image.png')}}" alt="">
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Disable Past Dates</label>
                                                <div class="col-md-3">
                                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                        <input type="text" class="form-control" name="bookdate" readonly="" style="cursor: pointer">
                                                        <span class="input-group-btn">
                                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                        </span>
                                                    </div>
                                                    <!-- /input-group -->
                                                    <span class="help-block">
                                                    Select date </span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="weekday" value=""/>
                                            <div class="form-group available-list" style="display: none">
                                                <label class="control-label col-md-3">Available Time: </label>
                                                <div class="col-md-4">
                                                    <p class="time-list form-control-static">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group" id="book_hours" style="display:none">
                                                <label class="control-label col-md-3">Book Hours</label>
                                                <div class="col-md-4">
                                                    <label class="control-label col-md-4">Start</label>
                                                    <div class="col-md-8">
                                                        <div class="input-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                            <input type="text" class="form-control timepicker timepicker-default" name="start">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="control-label col-md-4">End</label>
                                                    <div class="col-md-8">
                                                        <div class="input-icon">
                                                            <i class="fa fa-clock-o"></i>
                                                            <input type="text" class="form-control timepicker timepicker-default" name="end">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn btn-success">Ok</button>
                                                    <a type="button" class="btn default" href="{{url('facility/library')}}">Cancel</a>
                                                </div>
                                            </div>
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

<!-- BEGIN MODAL -->
<div id="book_success" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Your Booking is Sucessed</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form role="form" id="post-form" class="form-horizontal">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Deposit(Refundable): </label>
                                    <div class="col-md-9">
                                        <p class="form-control-static">
                                             {{$facility->deposit}} $
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Facility Charge: </label>
                                    <div class="col-md-9">
                                        <p class="form-control-static">
                                             {{$facility->facility_charge}} $
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Administrative Charge: </label>
                                    <div class="col-md-9">
                                        <p class="form-control-static">
                                             {{$facility->service_charge}} $
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Total:</label>
                                    <div class="col-md-9">
                                        <p class="form-control-static">
                                             {{$facility->deposit+$facility->facility_charge+$facility->service_charge}} $
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a type="button" class="btn blue btn-ok" href="{{url('facility/library')}}">Ok</a>
    </div>
</div>
<!-- END MODAL -->
@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/jquery.mockjax.js') }}
{{ Html::script('plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}
{{ Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ Html::script('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
{{ Html::script('js/facility/library_book.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   Library_Book.init();
   <?php if(strlen($error = $errors->first('success'))){  ?>
    $('#book_success').modal('show');
    <?php } ?>
});
</script>
</body>
<!-- END BODY -->
</html>