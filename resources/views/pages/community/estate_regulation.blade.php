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
{{ Html::style('plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}
{{ Html::style('plugins/jquery-file-upload/css/jquery.fileupload.css') }}
{{ Html::style('plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}
{{ Html::style('css/community/estate_profile.css') }}
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
            Estate Regulation <small></small>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-speech"></i>
                        <a>Community</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Estate Regulation</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>ByLaws
                            </div>
                            <div class="actions">
                                <form action="estate_regulation/upload_document" method="POST" enctype="multipart/form-data">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-md-12">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-primary fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span>Add file... </span>
                                                <input type="file" name="file" accept="application/pdf , application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            </span>
                                            <button type="submit" class="btn blue start disabled bylaws-upload">
                                                <i class="fa fa-upload"></i>
                                                <span>Start upload </span>
                                            </button>
                                            <input type="hidden" name="type" value="ByLaws"/>
                                            <input type="hidden" name="upload_by" value="{{$user->id}}"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="bylaws_tb">
                                <thead>
                                    <tr>
                                        <th>
                                             ID
                                        </th>
                                        <th>
                                             Title
                                        </th>
                                        <th>
                                             Uploaded By
                                        </th>
                                        <th>
                                             Uploaded Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>HandBook
                            </div>
                            <div class="actions">
                                <form action="estate_regulation/upload_document" method="POST" enctype="multipart/form-data">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-md-12">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-primary fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span>Add file... </span>
                                                <input type="file" name="file" accept="application/pdf , application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            </span>
                                            <button type="submit" class="btn blue start disabled bylaws-upload">
                                                <i class="fa fa-upload"></i>
                                                <span>Start upload </span>
                                            </button>
                                            <input type="hidden" name="type" value="Handbook"/>
                                            <input type="hidden" name="upload_by" value="{{$user->id}}"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="handbook_tb">
                                <thead>
                                    <tr>
                                        <th>
                                             ID
                                        </th>
                                        <th>
                                             Title
                                        </th>
                                        <th>
                                             Uploaded By
                                        </th>
                                        <th>
                                             Uploaded Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>AGM
                            </div>
                            <div class="actions">
                                <form action="estate_regulation/upload_document" method="POST" enctype="multipart/form-data">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-md-12">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-primary fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span>Add file... </span>
                                                <input type="file" name="file" accept="application/pdf , application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            </span>
                                            <button type="submit" class="btn blue start disabled bylaws-upload">
                                                <i class="fa fa-upload"></i>
                                                <span>Start upload </span>
                                            </button>
                                            <input type="hidden" name="type" value="AGM"/>
                                            <input type="hidden" name="upload_by" value="{{$user->id}}"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="agm_tb">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                             Title
                                        </th>
                                        <th>
                                             Uploaded By
                                        </th>
                                        <th>
                                             Uploaded Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
{{ Html::script('js/community/estate_regulation.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   EstateRegulation.init();
}); 
</script>
</body>
<!-- END BODY -->
</html>