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
{{ Html::style('css/service/maintenance_detail.css') }}
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
            Detail View of Maintenance and Repair <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Estate Services</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Maintenance & Repair</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>View Detail</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="portlet box green" id="form_wizard_1">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-legal"></i>{{$maintenance->subject}}
                            </div>
                            <div class="tools hidden-xs">
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="#" class="form-horizontal" id="submit_form" method="POST">
                                <div class="form-wizard">
                                    <div class="form-body">
                                        <div class="tab-pane" id="tab4">
                                            <h3 class="block">Request Information</h3>
                                            <h4 class="form-section">Requested Job</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Job Name:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                        {{$maintenance->job_name}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Job Description:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                        {{$maintenance->description}}
                                                    </p>
                                                </div>
                                            </div>
                                            <h4 class="form-section">Maintenance & Request</h4>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Building-Floor-Unit:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                        {{$maintenance->building}}-{{$maintenance->level}}-{{$maintenance->unit}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Subject:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                        {{$maintenance->subject}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Details:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                        {{$maintenance->details}}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Priority:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                        @if($maintenance->priority==1)
                                                        Low
                                                        @elseif($maintenance->priority==2)
                                                        Normal
                                                        @elseif($maintenance->priority==3)
                                                        High
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Status:</label>
                                                <div class="col-md-4">
                                                    <p class="form-control-static">
                                                    @if($maintenance->status==0)
                                                    pending
                                                    @elseif($maintenance->status==1)
                                                    cancelled
                                                    @elseif($maintenance->status==2)
                                                    completed
                                                    @elseif($maintenance->status==3)
                                                    rejected
                                                    @endif
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
                <div class="col-md-6">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Attach Files
                            </div>
                            <div class="tools hidden-xs">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                @foreach($attaches as $key => $value)
                                <div class="preview-pane col-md-12">
                                    <p style="text-align:center">
                                        <img src="{{asset('uploads/images/attach/'.$value->file_type.'/'.$value->file_name.'.'.$value->file_ext)}}"/>
                                    </p>
                                </div>
                                @endforeach      
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

@include('includes/footer')
@include('includes/foot')
</script>
</body>
<!-- END BODY -->
</html>