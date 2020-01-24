<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul id="sideBareList" class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler">
				</div>
				<!-- END SIDEBAR TOGGLER BUTTON -->
			</li>
			<li class="heading">
				<h3 class="uppercase inline">GENERAL </h3>
				<span class="prev-next-tab-bar" id="navigationButtonWrapper">
					<i class="fa fa-angle-left f_tab_nav" data-action-type="prev"></i>
					<i class="fa fa-angle-right f_tab_nav" data-action-type="next"></i>
				</span>

			</li>

			<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
			<li class="start f_category_wrapper <?php   echo $menu=='home'?'active open':'';?>">
			
			@if ($rolesetting->council_member ==1 || $rolesetting->home_owner == 1)
			<li class="start f_category_wrapper <?php echo $menu=='home'?'active open':'';?>">
				<a href="javascript:;">
				<i class="icon-home"></i>
				<span class="title">Home Net</span>
				<span class="selected"></span>
				<span class="arrow <?php   echo $menu=='home'?'open':'';?> "></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $submenu=='dashboard'?'active':'';?>">
						<a href="{{url('home')}}">
						<i class="icon-bar-chart"></i>
						Dashboard</a>
					</li>
					<li class="<?php echo $submenu=='warranty'?'active':'';?>">
						<a href="{{url('home/warranty')}}">
						<i class="icon-basket"></i>
						Registration & Warranty</a>
					</li>
					<li class="<?php echo $submenu=='energy'?'active':'';?>">
						<a href="{{url('home/energy')}}">
						<i class="icon-bar-chart"></i>
						Connected Energy</a>
					</li>
				</ul>
			</li>
			@endif
			@if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->council_member == 1 || $rolesetting->estate_developer == 1 || $rolesetting->home_owner == 1)
			<li class="f_category_wrapper <?php echo $menu=='community'?'active open':'';?>">
				<a href="javascript:;">
				<i class="icon-speech"></i>
				<span class="title">Community</span>
				<span class="arrow <?php   echo $menu=='community'?'open':'';?> "></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $submenu=='announcement'?'active':'';?>">
						<a href="{{url('community/announcement')}}">
						<i class="icon-paper-plane"></i>
						Announcement</a>
					</li>
					<li class="<?php echo $submenu=='event_calendar'?'active':'';?>">
						<a href="{{url('community/event_calendar')}}">
						<i class="icon-calendar"></i>
						Event Calendar</a>
					</li>
					<li class="<?php echo $submenu=='vote_survey'?'active':'';?>">
						<a href="{{url('community/vote_survey')}}">
						<i class="fa fa-ticket"></i>
						Vote & Survey</a>
					</li>
					<li class="<?php echo $submenu=='council_committee'?'active':'';?>">
						<a href="{{url('community/council_committee')}}">
						<i class="fa fa-group"></i>
						Council & Committee</a>
					</li>
					<li class="<?php echo $submenu=='estate_regulation'?'active':'';?>">
						<a href="{{url('community/estate_regulation')}}">
						<i class="fa fa-group"></i>
						Estate Regulations</a>
					</li>
					<li class="<?php echo $submenu=='estate_profile'?'active':'';?>">
						<a href="{{url('community/estate_profile')}}">
						<i class="icon-info"></i>
						Estate Profile</a>
					</li>
				</ul>
			</li>
			<li class="f_category_wrapper <?php echo $menu=='facility'?'active open':'';?>">
				<a href="javascript:;">
				<i class="fa fa-child"></i>
				<span class="title">Estate Facilities</span>
				<span class="arrow <?php   echo $menu=='facility'?'open':'';?> "></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $submenu=='library'?'active':'';?>">
						<a href="{{url('facility/library')}}">
						<i class="fa fa-database"></i>
						Facility Library</a>
					</li>
					<li class="<?php echo $submenu=='management'?'active':'';?>">
						<a href="{{url('facility/management')}}">
						<i class="fa fa-briefcase"></i>
						Facility Management</a>
					</li>				
				</ul>
			</li>
			@endif
			<li class="heading">
				<h3 class="uppercase">Manage</h3>
			</li>
			@if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->council_member == 1 || $rolesetting->estate_developer == 1 || $rolesetting->home_owner == 1)
			<li class="f_category_wrapper <?php echo $menu=='services'?'active open':'';?>">
				<a href="javascript:;">
				<i class="icon-settings"></i>
				<span class="title">Estate Services</span>
				<span class="arrow <?php   echo $menu=='services'?'open':'';?>"></span>
				</a>
				<ul class="sub-menu">
					<li class="<?php echo $submenu=='moving'?'active':'';?>">
						<a href="{{url('service/moving')}}">
						<i class="fa fa-truck"></i>
						Moving In / Out</a>
					</li>
					<li class="<?php echo $submenu=='maintenance'?'active':'';?>">
						<a href="{{url('service/maintenance')}}">
						<i class="fa fa-legal"></i>
						Maintenance & Repair</a>
					</li>

				</ul>
			</li>
			@endif
			@if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->council_member == 1 || $rolesetting->estate_developer == 1)
			<li class="f_category_wrapper <?php echo $menu=='operations'?'active open':'';?>">
				<a href="javascript:;">
					<i class="icon-settings"></i>
					<span class="title">Operations</span>
					<span class="arrow <?php   echo $menu=='operations'?'open':'';?>"></span> 
				</a>
				<ul class="sub-menu">
					@if ( $user->role != 4 )
					<li>
						<a href="#">
							<i class="fa fa-archive"></i>
							Asset Management</a>
					</li>
					<li >
						<a href="">
							<i class="fa fa-book"></i>
							Inventory Management</a>
					</li>
					@if ( $user->role != 1 )
					<li class="<?php echo $submenu=='financial'?'active':'';?>">
						<a href="{{url('operations/financial')}}">
							<i class="fa fa-money"></i>
							Financial Management</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-notebook"></i>
							Contract Management</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-wallet"></i>
							Vendor Management</a>
					</li>
					@endif
					@endif
				</ul>
			</li>
			@endif

			@if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->council_member == 1 || $rolesetting->estate_developer == 1 || $rolesetting->home_owner == 1)
			<li class="f_category_wrapper <?php echo $menu=='security'?'active open':'';?>">
				<a href="javascript:;">
				<i class="icon-settings"></i>
				<span class="title">Estate Security</span>
					<span class="arrow <?php   echo $menu=='security'?'open':'';?>"></span> 
				</a>
				<ul class="sub-menu">
					<li>
						<a href="#">
						<i class="icon-users"></i>
						Personnel Management</a>
					</li>
					<li>
						<a href="#">
						<i class="fa fa-car"></i>
						Vehicle Management</a>
					</li>
					<li class="<?php echo $submenu=='accesscard'?'active':'';?>">
						<a href="{{url('security/accesscard')}}">
						<i class="icon-credit-card"></i>
						Access Card Management</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-flag"></i>
						Surveillance Management</a>
					</li>
				</ul> 
			</li>
			@endif

			
			<!-- <li class="f_category_wrapper">
				<a href="javascript:;">
				<i class="icon-wrench"></i>
				<span class="title">Estate Administration</span>
				<span class="arrow <?php echo $menu=='security'?'open':'';?>"></span>
				</a>
				<ul class="sub-menu">
					<li>
						<a href="#">
						<i class="icon-globe-alt"></i>
						Estate Stationary</a>
					</li>
				</ul>
			</li> -->
			@if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->estate_developer == 1)
			<li class="last f_category_wrapper">
				<a href="javascript:;">
				<i class="icon-screen-desktop"></i>
				<span class="title">Developer Tools</span>
				<span class="arrow "></span> 
				</a>
					<ul class="sub-menu">
					<li>
						<a href="#">
						<i class="icon-drop"></i>
						Unit Handover Management</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-cup"></i>
						Unit Defect Management</a>
					</li>
				</ul> 
			</li>
			@endif
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->