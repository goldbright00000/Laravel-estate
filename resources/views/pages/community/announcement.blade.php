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
{{ Html::style('css/community/announcement.css') }}
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
			Announcement <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-speech"></i>
						<a>Community</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>Announcement</a>
					</li>
				</ul>
				<div class="page-toolbar">
					@if($role->role_type!=8)
					<a class="btn btn-success post-new" >
						<i class="fa fa-plus"></i> Post New 
					</a>
					@endif
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT -->
			<div class="col-md-7">
				<!-- BEGIN Portlet PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption bold">
							<i class="icon-user bold"></i>
							<span class="caption-subject bold uppercase"> By Residents</span>
							<span class="caption-helper"></span>
						</div>
						<div class="actions">
							<div class="btn-group btn-group-devided" data-toggle="buttons">
								<label class="btn btn-circle btn-transparent grey-salsa active">
								<input type="radio" name="options" class="toggle resident-toggle" value="all">All</label>

							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="scroller" style="height:630px" data-rail-visible="1" data-rail-color="blue" data-handle-color="green">
							<div class="row resident-body">
								@if($residents)
								<?php 
									foreach ($residents as $key => $value) {
										# code...
								?>
								<div class="col-md-12">
									<!-- BEGIN PORTLET-->
									<div class="portlet light bg-inverse">
										<div class="portlet-title">
											<div class="caption">
												<i class="icon-speech font-purple-plum"></i>
												<span class="caption-subject"> {{$value->subject}}</span>
												<span class="caption-helper">posted by {{$value->given_name." ".$value->family_name}} on <?php $oDate = new DateTime($value->datetime);
													echo $oDate->format("M j, Y @ g:i A"); ?></span>
											</div>
											<div class="actions">
												@if($role->role_type==1||$role->role_type==2||$role->role_type==3)
												<a class="btn btn-circle btn-icon-only btn-edit btn-default" data-id="{{$value->id}}" href="javascript:;">
												<i class="icon-pencil"></i>
												</a>
												<a class="btn btn-circle btn-icon-only btn-trash btn-default" data-id="{{$value->id}}" href="javascript:;">
												<i class="icon-trash"></i>
												</a>
												@elseif($value->publisher_id==$user->id)
												<a class="btn btn-circle btn-icon-only btn-edit btn-default" data-id="{{$value->id}}" href="javascript:;">
												<i class="icon-pencil"></i>
												</a>
												<a class="btn btn-circle btn-icon-only btn-trash btn-default" data-id="{{$value->id}}" href="javascript:;">
												<i class="icon-trash"></i>
												</a>
												@endif
											</div>
										</div>
										<div class="portlet-body">										
												{{$value->message}}
										</div>
									</div>
									<!-- END PORTLET-->
								</div>
								<?php } ?>
								@endif
							</div>
						</div>
					</div>
				</div>
				<!-- END Portlet PORTLET-->
			</div>
			<div class="col-md-5">
			<!-- BEGIN Portlet PORTLET-->
				<div class="portlet light">
					<div class="portlet-title">
						<div class="caption bold">
							<i class="icon-user bold"></i>
							<span class="caption-subject uppercase"> By Managers</span>
							<span class="caption-helper"></span>
						</div>
						<div class="actions">
							<div class="btn-group btn-group-devided" data-toggle="buttons">
								<label class="btn btn-circle btn-transparent grey-salsa active">
								<input type="radio" name="options" class="toggle manager-toggle" value="all">All</label>
							</div>
						</div>
					</div>
					<div class="portlet-body">
						<div class="scroller" style="height:630px" data-rail-visible="1" data-rail-color="blue" data-handle-color="green">
							<div class="row manager-body">
								@if($managers)
								<?php 
									foreach ($managers as $key => $value) {
										# code...
								?>
								<div class="col-md-12">
									<!-- BEGIN PORTLET-->
									<div class="portlet light bg-inverse">
										<div class="portlet-title">
											<div class="caption">
												<i class="icon-speech font-purple-plum"></i>
												<span class="caption-subject"> {{$value->subject}}</span>
												<span class="caption-helper">posted by {{$value->given_name." ".$value->family_name}} on <?php $oDate = new DateTime($value->datetime);
													echo $oDate->format("M j, Y @ g:i A"); ?></span>
											</div>
											<div class="actions">
												@if($role->role_type==1||$role->role_type==2||$role->role_type==3)
												<a class="btn btn-circle btn-icon-only btn-edit btn-default" data-id="{{$value->id}}" href="javascript:;">
												<i class="icon-pencil"></i>
												</a>
												<a class="btn btn-circle btn-icon-only btn-trash btn-default" data-id="{{$value->id}}"  href="javascript:;">
												<i class="icon-trash"></i>
												</a>
												@endif
											</div>
										</div>
										<div class="portlet-body">										
												{{$value->message}}
										</div>
									</div>
									<!-- END PORTLET-->
								</div>
								<?php } ?>
								@endif
							</div>
						</div>
					</div>
				</div>
				<!-- END Portlet PORTLET-->
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	<!-- END CONTENT -->
	<div>
</div>
<!-- END CONTAINER -->

<!-- Modals -->
<div id="create_announcement" class="modal fade" tabindex="100" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Create Announcement</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="post-form">
					<div class="form-body">
						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="form_control_1" name="subject">
							<label for="form_control_1">Subject</label>
							<span class="help-block">Input Subject of Announcement here...</span>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<textarea class="form-control" rows="5" name="message"></textarea>
							<label for="form_control_1">Message</label>
							<span class="help-block">Input Content of Announcment here...</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn blue btn-post">Post</button>
	</div>
</div>

<div id="edit_announcement" class="modal fade" tabindex="-1" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Edit Announcement</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="edit-form">
					<div class="form-body">
						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="form_control_1" name="subject">
							<label for="form_control_1">Subject</label>
							<span class="help-block">Edit Subject of Announcement here...</span>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<textarea class="form-control" rows="5" name="message"></textarea>
							<label for="form_control_1">Message</label>
							<span class="help-block">Edit Content of Announcment here...</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn blue btn-post">Post</button>
	</div>
</div>
@include('includes/footer')
@include('includes/foot')
{{ Html::script('js/community/announcement.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   Announcement.init();
});	
</script>
</body>
<!-- END BODY -->
</html>