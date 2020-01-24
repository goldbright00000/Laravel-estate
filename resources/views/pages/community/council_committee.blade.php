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
{{ Html::style('plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ Html::style('plugins/fullcalendar/fullcalendar.min.css') }}
{{ Html::style('css/community/council.css') }}
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
			Council And Committee <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-speech"></i>
						<a>Community</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>Council & Committee</a>
					</li>
				</ul>
				<div class="page-toolbar">
				</div>
			</div>
			<!-- END PAGE HEADER-->
			
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Default Tabs
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-5">
									<div class="council-group row green-stripped">
										<div class="photo col-md-3">
											<center>
											<img src="{{asset('img/temp.jpg')}}">
											<button type="button" class="btn btn-success btn-sm margin-top-10">Follow</button>
											</center>
										</div>
										<div class="content col-md-9">
											<div class="col-md-12">
												<div class="col-md-6">
													<p>	Family Name: Wang</p>
													<p>	Position: Developer</p>
												</div>
												<div class="col-md-6">
													<p>Given Name: Xiaoming</p>
													<p>Start Date: 2016-10-5</p>
													<p>End Date: 2016-11-5</p>
												</div>
												<div class="col-md-12">
													<h4><p>About Wang Xiaoming</p></h4>
													<p>He is an Estate Developer</p>
												</div>
											</div>
											<div class="col-md-12">
											</div>
										</div>
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

@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}
{{ Html::script('plugins/fullcalendar/fullcalendar.min.js')}}

</script>
</body>
<!-- END BODY -->
</html>