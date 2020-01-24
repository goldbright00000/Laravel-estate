<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="{{ url('/') }}">
			<img src="{{ asset('img/reziden-logo-inverse.png') }}" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->		
		<!-- BEGIN TOP NAVIGATION MENU -->		
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					@if(!$user->image_name)
						<img src="{{asset('img/avatar/avatar.png')}}" class="img-circle" alt="">
					@else
						<img src="{{url('uploads/images/profiles/'.$user->image_name.'.'.$user->image_ext)}}" class="img-circle" alt="">
					@endif
					<span class="username username-hide-on-mobile">
					{{ $user->username }} </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="{{url('user_profile')}}">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
							<a href="{{url('community/event_calendar')}}">
							<i class="icon-calendar"></i> My Calendar </a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="{{ url('logout') }}">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>

			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">					
					<span class="username username-hide-on-mobile">
					Roles</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						@if ($rolesetting->generic_user == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i> Generic User </a>
						</li>
						@endif
						@if ($rolesetting->home_owner == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Home Owner</a>
						</li>
						@endif
						@if ($rolesetting->home_member == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Home Member</a>
						</li>
						@endif
						@if ($rolesetting->tenant_master == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Tenant Master</a>
						</li>
						@endif
						@if ($rolesetting->tenant_member == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Tenant Member</a>
						</li>
						@endif
						@if ($rolesetting->council_member == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Council Member</a>
						</li>
						@endif
						@if ($rolesetting->estate_officer == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Estate Officer</a>
						</li>
						@endif
						@if ($rolesetting->estate_manager == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Estate Manager</a>
						</li>
						@endif
						@if ($rolesetting->estate_developer == 1)
						<li>
							<a href="#">														
							<i class="icon-user"></i>Estate Developer</a>
						</li>
						@endif

					</ul>
				</li>

			</ul>
		</div>

		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN USER LOGIN DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">					
					<span class="username username-hide-on-mobile"><i class="icon-home"></i>
					Estate</span>
					<i class="fa fa-angle-down"></i>
					</a>
					@if(isset($estate))
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="#">														
							<i class="icon-country"></i>Name : {{$estate->name}}</a>
						</li>
						<li>
							<a href="#">														
							<i class="icon-country"></i>City : {{$estate->city}}</a>
						</li>
						<li>
							<a href="#">														
							<i class="icon-country"></i>State : {{$estate->state_province}}</a>
						</li>
						<li>
							<a href="#">														
							<i class="icon-country"></i>Country : {{$estate->country}}</a>
						</li>
					</ul>
					@endif
				</li>

			</ul>
		</div>
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">			
				<li class="dropdown dropdown-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">					
					<span class="username username-hide-on-mobile"><i class="icon-info"></i>
					Weather</span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default" id="weather">
					
					</ul>
				</li>		
			</ul>
		</div>
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->