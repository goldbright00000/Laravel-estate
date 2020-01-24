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
{{Html::style('css/home/home.css')}}
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}
{{ Html::style('plugins/bootstrap-datepicker/css/datepicker3.css') }}

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
            Connected Energy <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-child"></i>
                        <a>Home Net</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Connected Energy</a>
                    </li>
                </ul>
                <div class="page-toolbar">                    
                    <a type="button" href="{{url('home/energy/config')}}" class="btn btn-success btn-add-facaility">Next</a>        
                </div>
            </div>
             <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>Config
                            </div>                           
                        </div>
                        <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                          <form action="{{url('home/energy/add_node')}}" method="POST" enctype="multipart/form-data"
                                id="warrantyForm" class="form-horizontal">
                            <div class="form-body">
                              {{csrf_field()}}
                              
                              <div class="form-group">
                                <label class="col-md-3 control-label">Node URL</label>
                                <div class="col-md-4">
                                  <input type="text" data-validate="string" class="form-control" placeholder="Enter URL" name="node_url">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Key</label>
                                <div class="col-md-4">
                                  <input type="text" class="form-control" data-validate="string" placeholder="Enter Key" name="key">
                                </div>
                              </div>                                       
                              
                              <div class="validationError" id="validationError">

                              </div>
                            </div>
                            <div class="form-actions">
                              <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                  <button id="nodeFormSubmit" type="submit" class="btn btn-circle green">Generate</button>                    
                                </div>
                              </div>
                            </div>
                          </form>
                          <!-- END FORM-->
                        </div>
                        
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>     
        </div>
    <!-- END CONTENT -->
    <div>
</div>
<!-- END CONTAINER -->
@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ Html::script('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}


<script type="text/javascript">
jQuery(document).ready(function() {    

}); 
</script>
</body>
<!-- END BODY -->
</html>