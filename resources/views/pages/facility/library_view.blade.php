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
            Facility View <small></small>
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
                            <form class="form-horizontal" role="form">
                                <div class="form-body">
                                    <h2 class="margin-bottom-20"> View Facility Info - {{$facility->facility_name}} </h2>
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
                                                <label class="control-label col-md-3">Facility Type:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->type_name}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Facility Name:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->facility_name}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Facility Location:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->facility_location}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Based Rule:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         <?php
                                                            switch ($facility->based) {
                                                                case 0:
                                                                    # code...
                                                                echo 'Time Based';
                                                                    break;
                                                                case 1:
                                                                    # code...
                                                                echo 'Hour Session';
                                                                    break;
                                                                case 2:
                                                                    # code...
                                                                echo '2 hrs per Session';
                                                                    break;
                                                                case 3:
                                                                    # code...
                                                                echo '3 hrs per Session';
                                                                    break;
                                                                
                                                                default:
                                                                    # code...
                                                                    break;
                                                            }
                                                         ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Facility Description:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         <?php echo $facility->description; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <h3 class="form-section"></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Operating Time:</label>
                                                <div class="col-md-9">
                                                    @foreach($facility_hours as $key2 => $value2)
                                                    <p class="form-control-static">
                                                         <?php
                                                            switch($value2->weekday){
                                                                case 0:
                                                                    $weekday = 'Sunday';
                                                                break;
                                                                case 1:
                                                                    $weekday = 'Monday';
                                                                break;
                                                                case 2:
                                                                    $weekday = 'Tuesday';
                                                                break;
                                                                case 3:
                                                                    $weekday = 'Wednesday';
                                                                break;
                                                                case 4:
                                                                    $weekday = 'Thursday';
                                                                break;
                                                                case 5:
                                                                    $weekday = 'Friday';
                                                                break;
                                                                case 6:
                                                                    $weekday = 'Saturday';
                                                                break;
                                                            }
                                                            $time1 = new \DateTime($value2->start);
                                                            $start = $time1->format('g:i A');
                                                            $time2 = new \DateTime($value2->end);
                                                            $end = $time2->format('g:i A');
                                                         ?>
                                                         {{$weekday}}: {{$start}} - {{$end}}
                                                    </p><br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Deposit(Refundable):</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->deposit}} $
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Facility Charge:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->facility_charge}} $
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Administrative/Service Charge:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->service_charge}} $
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Reservation required:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->reservation?'Yes':'No'}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Facility status:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->status?'In Operation':'Suspended'}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Equipments:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         {{$facility->equipment}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Regulations:</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">
                                                         <?php echo $facility->rules;?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    @if ( !($user->role>=4 && $user->role<=9))
                                                    <a type="button" class="btn btn-success" href="{{url('facility/library/library_book/'.$facility->id)}}">Book</a>
                                                    <a type="button" class="btn btn-primary" href="{{url('facility/library/library_edit/'.$facility->id)}}">Edit</a>
                                                    @endif
                                                    <a type="button" class="btn default" href="{{url('facility/library')}}">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
{{ Html::script('plugins/jquery.mockjax.js') }}
{{ Html::script('plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}
{{ Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
</script>
</body>
<!-- END BODY -->
</html>