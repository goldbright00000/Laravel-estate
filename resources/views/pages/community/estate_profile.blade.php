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
{{ Html::style('plugins/bootstrap-modal/css/bootstrap-modal.css') }}
{{ Html::style('plugins/bootstrap-editable/inputs-ext/address/address.css') }}
{{ Html::style('plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}
{{ Html::style('plugins/jquery-file-upload/css/jquery.fileupload.css') }}
{{ Html::style('plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}
{{ Html::style('css/community/estate_profile.css') }}
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php 
        $manager = array(config('constants.Estate_Manager'),config('constants.Developer'),config('constants.Estate_Officer'));
    ?>
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
                        <i class="icon-speech"></i>
                        <a>Community</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a>Estate Profile</a>
                    </li>
                </ul>
                <div class="page-toolbar">
                </div>
            </div>
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_profile" data-toggle="tab"> Estate Profile </a>
                    </li>
                    <li>
                        <a href="#tab_map" data-toggle="tab"> Location Map </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab_profile">
                    @if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->estate_developer == 1)
                        @include('pages.community.estate_profile_editable')
                    @else
                        @include('pages.community.estate_profile_readonly')
                    @endif
                    </div>
                    <div class="tab-pane fade active" id="tab_map">
                        <div class="alert alert-warning text-center" style="display:none" id="address_error">
                            <strong>Warning!</strong> Seems address is incorrect. 
                        </div>
                        <div id="profile_map" class="gmaps"></div>
                    </div>
                </div>
                
            </div>
            <div class="row">
 
            </div>            
        </div>
    <!-- END CONTENT -->
    <div>
</div>
<!-- END CONTAINER -->
@include('includes/footer')
@include('includes/foot')
<script type="text/javascript" src="//maps.google.com/maps/api/js?key=AIzaSyCPYcJPII27yTH8vqAjapdi04bumwwl1Bo&sensor=true"></script>
{{ Html::script('plugins/jquery.mockjax.js') }}
{{ Html::script('plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}
{{ Html::script('plugins/bootstrap-editable/inputs-ext/address/address.js') }}
{{ Html::script('plugins/valib/valib.js') }}
{{ Html::script('plugins/gmaps/gmaps.min.js') }}
{{ Html::script('js/community/estate_profile.js') }}
<script type="text/javascript">
var address = {country: '{{$estate->country}}', city: '{{$estate->city}}', address: '{{$estate->address}}'}; 
jQuery(document).ready(function() {
   EstateProfile.init();
   EstateProfile.initMap('#profile_map');    
   
});
</script>
</body>
<!-- END BODY -->
</html>
