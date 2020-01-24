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
                    <a type="button" href="{{url('home/energy/visualization')}}" class="btn btn-success btn-add-facaility">Next</a>        
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>Add Node
                            </div>                           
                        </div>
                        <div class="portlet-body form">
              			  <!-- BEGIN FORM-->
			              <form action="{{url('home/energy/add_node')}}" method="POST" enctype="multipart/form-data"
			                    id="warrantyForm" class="form-horizontal">
			                <div class="form-body">
			                  {{csrf_field()}}
			                  
			                  <div class="form-group">
			                    <label class="col-md-3 control-label">Name</label>
			                    <div class="col-md-4">
			                      <input type="text" data-validate="string" class="form-control" placeholder="Enter Name" name="name">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="col-md-3 control-label">App License Type</label>
			                    <div class="col-md-4">
			                      <input type="text" class="form-control" data-validate="string" placeholder="Enter License Type" name="license_type">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="col-md-3 control-label">Metric</label>
			                    <div class="col-md-4">
			                      <input type="text" class="form-control" data-validate="string" placeholder="Enter Metric" name="metric">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="col-md-3 control-label">Location</label>
			                    <div class="col-md-4">
			                      <input type="text" class="form-control" data-validate="string" placeholder="Enter Location" name="location">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="col-md-3 control-label">Cost Per Metric</label>
			                    <div class="col-md-4">
			                      <input type="text" class="form-control" data-validate="number" placeholder="Enter Cost Per Metric" name="cost_per_metric">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="control-label col-md-3">Life Time</label>
			                    <div class="col-md-4">			                      
			                      <input type="text" class="form-control" data-validate="number" placeholder="Enter Life Time" name="life_time">			                    
			                    </div>
			                  </div>		                  
			                  
			                  <div class="validationError" id="validationError">

			                  </div>
			                </div>
			                <div class="form-actions">
			                  <div class="row">
			                    <div class="col-md-offset-3 col-md-9">
			                      <button id="nodeFormSubmit" type="submit" class="btn btn-circle green">Save</button>
			                      <a href="{{url('home/energy')}}" type="button" class="btn btn-circle default">Cancel</a>
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
<!-- BEGIN CONTAINER -->
<div class="page-container">
	@include('includes/sidebar')
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content row">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Product/service registration & warranty <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a>Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a>product/service registration & warranty</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<a type="button" class="btn btn-success btn-add-facaility" href="{{url('home/warranty_registration')}}"><i class="fa fa-plus"></i>Add registration & warranty</a>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT -->
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-striped table-bordered table-advance table-hover" id="warranty_tb">
							<thead>
								<tr>
									<th>
										 Photo
									</th>
									<th>
										 Brand
									</th>
									<th>
										 Model
									</th>
									<th>
										 Color
									</th>
									<th>
										 Serial Number
									</th>
									<th>
										 Merchant
									</th>
									<th>
										 Purchase Date
									</th>
									<th>
										 Purchase Country
									</th>
									<th>
										 Activation Date
									</th>
									<th>
										&nbsp;
									</th>
								</tr>
							</thead>
						<tbody>
						</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT -->	
		</div>
	<!-- END CONTENT -->
	<div class="modal fade" id="small" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Remove</h4>
			</div>
			<div class="modal-body">
				 Do you want to remove?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn blue btn-ok">Ok</button>
			</div>
		</div>
		<!-- /.modal-dialog -->
	</div>
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