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
{{ Html::style('css/community/announcement.css') }}
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
			Event Calendar <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-speech"></i>
						<a>Community</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>Event Calendar</a>
					</li>
				</ul>
				<div class="page-toolbar">
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<div class="portlet box green-meadow calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Calendar
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div id="calendar" class="has-toolbar">
									</div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- END CONTENT -->
	<div>
</div>
<!-- END CONTAINER -->

<!--Modal-->
<div id="new_event" class="modal fade" tabindex="-1" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Add New Event</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="post-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<label>Start Datetime</label>
							</div>
							<div class="col-md-6">
								<label>End Datetime</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<div class="input-group date form_meridian_datetime start_date" id="" data-date="2012-12-21T15:25:00Z">
									<input type="text" size="16" class="form-control">
									<span class="input-group-btn">
										<button class="btn green date-reset" type="button"><i class="fa fa-times"></i></button>
										<button class="btn green date-set" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group date form_meridian_datetime end_date" id="" data-date="2012-12-21T15:25:00Z">
									<input type="text" size="16" class="form-control">
									<span class="input-group-btn">
										<button class="btn green date-reset" type="button"><i class="fa fa-times"></i></button>
										<button class="btn green date-set" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="title" name="title">
							<label for="title">Event Title</label>
						</div>

						<div class="form-group form-md-radios">
							<label>Event Type</label>
							<div class="md-radio-inline">
								<div class="md-radio">
									<input type="radio" id="radio1" name="radio" class="md-radiobtn" value="public" checked="">
									<label for="radio1">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Public </label>
								</div>
								<div class="md-radio">
									<input type="radio" id="radio2" name="radio" class="md-radiobtn" value="estate_community">
									<label for="radio2">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Estate Community </label>
								</div>
								<div class="md-radio">
									<input type="radio" id="radio3" name="radio" class="md-radiobtn" value="invite_only">
									<label for="radio3">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Invite Only </label>
								</div>
							</div>
						</div>

						<div class="form-group form-md-line-input form-md-floating-label">
							<textarea class="form-control" rows="5" id="description" name="description"></textarea>
							<label for="description">Description</label>
						</div>

						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="contact_person" name="contact_person">
							<label for="contact_person">Contact Person</label>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">							
							<label for="contact_number">Contact Number</label>
                            <input type="number" class="form-control" id="contact_number" name="contact_number" />
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<label for="contact_email">Contact Email</label>
							<div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="fa fa-envelope"></i>
	                            </span>	                        
								<input type="email" class="form-control" id="contact_email" name="contact_email">
							</div>						
						</div>
						<div class="md-checkbox">
							<input type="checkbox" id="checkbox2" class="md-check" name="allDay">
							<label for="checkbox2">
							<span></span>
							<span class="check"></span>
							<span class="box"></span>
							All Day </label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		@if ($user->role!=8)
		<button type="button" class="btn blue btn-ok">Add</button>
		@endif
	</div>
</div>

<div id="edit_event" class="modal fade" tabindex="-1" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Add New Event</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="post-form">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<label>Start Datetime</label>
							</div>
							<div class="col-md-6">
								<label>End Datetime</label>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6">
								<div class="input-group date form_meridian_datetime start_date" id="" data-date="2012-12-21T15:25:00Z">
									<input type="text" size="16" class="form-control">
									<span class="input-group-btn">
										<button class="btn green date-reset" type="button"><i class="fa fa-times"></i></button>
										<button class="btn green date-set" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="input-group date form_meridian_datetime end_date" id="" data-date="2012-12-21T15:25:00Z">
									<input type="text" size="16" class="form-control">
									<span class="input-group-btn">
										<button class="btn green date-reset" type="button"><i class="fa fa-times"></i></button>
										<button class="btn green date-set" type="button"><i class="fa fa-calendar"></i></button>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="event_title" name="title">
							<label for="event_title">Event Title</label>
						</div>

						<div class="form-group form-md-radios">
							<label>Event Type</label>
							<div class="md-radio-inline">
								<div class="md-radio">
									<input type="radio" id="radio4" name="radio" class="md-radiobtn" value="public" checked="">
									<label for="radio4">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Public </label>
								</div>
								<div class="md-radio">
									<input type="radio" id="radio5" name="radio" class="md-radiobtn" value="estate_community">
									<label for="radio5">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Estate Community </label>
								</div>
								<div class="md-radio">
									<input type="radio" id="radio6" name="radio" class="md-radiobtn" value="invite_only">
									<label for="radio6">
									<span class="inc"></span>
									<span class="check"></span>
									<span class="box"></span>
									Invite Only </label>
								</div>
							</div>
						</div>

						<div class="form-group form-md-line-input form-md-floating-label">
							<textarea class="form-control" rows="5" id="description" name="description"></textarea>
							<label for="description">Description</label>
						</div>

						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="contact_person" name="contact_person">
							<label for="contact_person">Contact Person</label>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="contact_number" name="contact_number">
							<label for="contact_number">Contact Number</label>
						</div>
						<div class="form-group form-md-line-input form-md-floating-label">
							<input type="text" class="form-control" id="contact_email" name="contact_email">
							<label for="contact_email">Contact Email</label>
						</div>
						<div class="md-checkbox">
							<input type="checkbox" id="checkbox1" class="md-check" name="allDay">
							<label for="checkbox1">
							<span></span>
							<span class="check"></span>
							<span class="box"></span>
							All Day </label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		@if ($user->role!=8)
		<button type="button" class="btn btn-danger btn-remove">Remove</button>		
		<button type="button" class="btn blue btn-ok">Save Changes</button>
		@endif
	</div>
</div>
<!--endModal-->

@include('includes/footer')
@include('includes/foot')
{{ Html::script('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}
{{ Html::script('plugins/fullcalendar/fullcalendar.min.js')}}
{{ Html::script('js/community/event_calendar.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   Calendar.init();
});	
</script>
</body>
<!-- END BODY -->
</html>