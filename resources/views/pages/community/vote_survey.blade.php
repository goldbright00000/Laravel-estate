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
{{ Html::style('css/community/vote_survey.css') }}
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
			Vote And Survey <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="icon-speech"></i>
						<a>Community</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>Vote & Survey</a>
					</li>
				</ul>
				<div class="page-toolbar">
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab">
                            Survey </a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab">
                            Poll </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1">
                        	<div class="portlet box light">
								<div class="portlet-title">
									<div class="caption bold">
										<i class="icon-user bold"></i>
										<span class="caption-subject bold uppercase"> Survey Questions</span>
										<span class="caption-helper"></span>
									</div>
									<div class="actions">
										@if ( !($user->role>=4 && $user->role<=8))
										<button type="button" class="btn btn-default btn-circle add-survey" data-count="{{count($survey)}}"><i class="fa fa-plus"></i> New Survey Question</button>
										<div class="btn-group btn-group-devided" data-toggle="buttons">
											<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
										</div>
										@endif
									</div>
								</div>
								<div class="portlet-body">
									<div class="panel-group accordion">
										@foreach($survey as $key => $value)
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" href="#collapse_survey_{{$key}}" aria-expanded="false">
												{{$key+1}}. {{$value->question}} </a>
												</h4>
											</div>
											<div id="collapse_survey_{{$key}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
												<div class="panel-body">
													<?php $serach_key = array_search($value->id, array_column(json_decode(json_encode($survey_answers), true), 'survey_id'))?>
													@if(is_numeric($serach_key))
													<p>
														{{$survey_answers[$serach_key]->answer}}
													</p>
													@else
													<div class="form">
														<form role="form" id="post-form" data-id="{{$value->id}}">
															<div class="form-body">
																<div class="form-group form-md-line-input form-md-floating-label has-info">
																	@if ( !($user->role>=4 && $user->role<=8))
																	<textarea class="form-control" rows="3" name="answer"></textarea>
																	@else
																	<textarea class="form-control" rows="3" name="answer" disabled></textarea>
																	@endif
																	<label for="form_control_1">Answer</label>					
																</div>
															</div>
															<div class="form-actions noborder">
																@if ( !($user->role>=4 && $user->role<=8))
																<button type="button" class="btn blue btn-circle btn-submit">Submit</button>
																@endif
															</div>
													</form>
													</div>
													@endif
												</div>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							</div>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                        	<div class="portlet box light">
								<div class="portlet-title">
									<div class="caption bold">
										<i class="icon-user bold"></i>
										<span class="caption-subject bold uppercase"> Poll Questions</span>
										<span class="caption-helper"></span>
									</div>
									<div class="actions">
										@if ( !($user->role>=4 && $user->role<=8))
										<button type="button" class="btn btn-default btn-circle add-poll" data-count="{{count($polls)}}"><i class="fa fa-plus"></i> New Poll Question</button>
										<div class="btn-group btn-group-devided" data-toggle="buttons">
											<a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;"></a>
										</div>
										@endif
									</div>
								</div>
								<div class="portlet-body">
									<div class="panel-group accordion">
										@foreach($polls as $key => $value)
										<div class="panel panel-default">
											<div class="panel-heading">
												<h4 class="panel-title">
												<a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" href="#collapse_poll_{{$key}}" aria-expanded="false">
												{{$key+1}}. {{$value->question}} </a>
												</h4>
											</div>
											<div id="collapse_poll_{{$key}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
												<div class="panel-body">
													<?php $serach_key = array_search($value->id, array_column(json_decode(json_encode($poll_answers), true), 'poll_id'))?>
													@if(is_numeric($serach_key))
													<p>
														{{$poll_answers[$serach_key]->option}}
													</p>
													@else
													<div class="form">
														<form role="form" id="post-form" data-id="{{$value->id}}">
															<div class="form-body">
																@foreach($value->options as $key1 => $value1)
																<div class="md-radio-list">
																	<div class="md-radio">
																		<input type="radio" id="radio_{{$key}}_{{$key1}}" name="option_radio_{{$key}}" class="md-radiobtn" value="{{$value1->option_value}}" data-text="{{$value1->option}}">
																		<label for="radio_{{$key}}_{{$key1}}">
																		<span class="inc"></span>
																		<span class="check"></span>
																		<span class="box"></span>
																		{{$value1->option}} </label>
																	</div>																
																</div>
																@endforeach
															</div>
															<div class="form-actions noborder">
																<button type="button" class="btn blue btn-circle btn-vote">VOTE</button>
															</div>
														</form>
													</div>
													@endif
												</div>
											</div>
										</div>
										@endforeach
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

<!-- BEGIN MODAL -->
<div id="new_survey" class="modal fade" tabindex="-1" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Create New Survey Question</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="post-form">
					<div class="form-body">
						<div class="form-group form-md-line-input form-md-floating-label">
							<textarea class="form-control" rows="3" name="survey"></textarea>
							<label for="form_control_1">Question</label>
							<span class="help-block">Input Question of Survey here...</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn blue btn-ok">Create</button>
	</div>
</div>

<div id="new_poll" class="modal fade" tabindex="-1" data-width="760">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<h4 class="modal-title">Create New Poll Question</h4>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="post-form">
					<div class="form-body">
						<div class="form-group form-md-line-input form-md-floating-label">
							<textarea class="form-control" rows="3" name="poll"></textarea>
							<label for="form_control_1">Question</label>
							<span class="help-block">Input Question of Poll here...</span>
						</div>
						<div class="form-group form-md-line-input has-warning form-md-floating-label">
							<div class="input-group">
								<span class="input-group-btn btn-left">
								<button class="btn blue-madison add-option" type="button">Add!</button>
								</span>
								<div class="input-group-control">
									<input type="text" class="form-control" name="poll-option">
									<label for="form_control_1">Poll Option</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<ul class="poll-options">
							</ul>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
		<button type="button" class="btn blue btn-ok">Create</button>
	</div>
</div>
<!-- END MODAL -->

@include('includes/footer')
@include('includes/foot')
{{ Html::script('js/community/vote_survey.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   Question.init();
});	
</script>
</body>
<!-- END BODY -->
</html>