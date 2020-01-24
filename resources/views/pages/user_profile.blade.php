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
{{ Html::style('plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ Html::style('plugins/jcrop/css/jquery.Jcrop.min.css') }}
{{ Html::style('css/profile.css') }}
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
			User Profile <small></small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-user"></i>
						<a>User Profile</a>
					</li>
					<li>
					</li>
				</ul>
				<div class="page-toolbar">
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<div class="row margin-top-20">
				<div class="col-md-12">
					<!-- BEGIN PROFILE SIDEBAR -->
					<div class="profile-sidebar">
						<!-- PORTLET MAIN -->
						<div class="portlet light profile-sidebar-portlet">
							<!-- SIDEBAR USERPIC -->
							<div class="profile-userpic">
								@if(!$user->image_name)
									<img src="{{asset('img/avatar/avatar.png')}}" class="img-responsive" alt="">
								@else
									<img src="{{url('uploads/images/profiles/'.$user->image_name.'.'.$user->image_ext)}}" class="img-responsive" alt="">
								@endif
							</div>
							<!-- END SIDEBAR USERPIC -->
							<!-- SIDEBAR USER TITLE -->
							<div class="profile-usertitle">
								<div class="profile-usertitle-name">
									 {{$user->given_name}} {{$user->family_name}}
								</div>
								<div class="profile-usertitle-job">
									@if ($rolesetting->generic_user)
									 	Generic User
									 	<br/>
									@endif									
									@if ($rolesetting->home_owner)
									 	Home Owner
									 	<br/>
									@endif									
									@if ($rolesetting->home_member)
									 	Home Member
									 	<br/>
									@endif									
									@if ($rolesetting->tenant_member)
									 	Tenant Member
									 	<br/>
									@endif									
									@if ($rolesetting->council_member)
									 	Council Member
									 	<br/>
									@endif									
									@if ($rolesetting->estate_officer)
									 	Estate Officer
									 	<br/>
									@endif									
									@if ($rolesetting->estate_manager)
									 	Estate Manager
									 	<br/>
									@endif									
									@if ($rolesetting->estate_developer)
									 	Estate Developer
									@endif
								</div>
							</div>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<!-- END SIDEBAR BUTTONS -->
						</div>
						<!-- END PORTLET MAIN -->
					</div>
					<!-- END BEGIN PROFILE SIDEBAR -->
					<!-- BEGIN PROFILE CONTENT -->
					<div class="profile-content">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet light">
									<div class="portlet-title tabbable-line">
										<div class="caption caption-md">
											<i class="icon-globe theme-font hide"></i>
											<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
										</div>
										
										<ul class="nav nav-tabs">
											<li class="{{strlen($error = $errors->first('error'))>0?'':'active'}}">
												<a href="#tab_1_1" data-toggle="tab">Personal Information</a>
											</li>
											<li>
												<a href="#tab_1_2" data-toggle="tab">Contact Information</a>
											</li>
											<li>
												<a href="#tab_1_3" data-toggle="tab">Emergency Information</a>
											</li>
											<li>
												<a href="#tab_1_4" data-toggle="tab">Change Avatar</a>
											</li>
											<li>
												<a href="#tab_1_5" data-toggle="tab">Account Security</a>
											</li>
											<li>
												<a href="#tab_1_7" data-toggle="tab">Role Settings</a>
											</li>
										</ul>
									</div>
									<div class="portlet-body">
										@if (session('message'))
											<div class="alert alert-success">
												{{ session('message') }}
											</div>
										@endif
										@if (count($errors) > 0)
											<div class="alert alert-danger">
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
										<div class="tab-content">
											<!-- PERSONAL INFO TAB -->
											<div class="tab-pane {{strlen($error = $errors->first('error'))>0?'':'active'}}" id="tab_1_1">
												<form role="form" action="{{url('user_profile/update_profile')}}" method="POST" id="profile">
													{{csrf_field()}}	
													<div class="col-md-12">
														<div class="form-group col-md-6">
															<label class="control-label">User Name</label>
															<input type="text" placeholder="User Name" class="form-control" name="username" value="{{$user->username}}" required/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Email</label>
															<input type="email" placeholder="Email" class="form-control" name="email" value="{{$user->email}}" required/>
														</div>
														<div class="form-group col-md-2">
															<label class="control-label">Salutation</label>
															<select name="salutation" class="form-control" id="salutation">
															    <option value=""> </option>
												                <option value="Mr.">Mr.</option>
												                <option value="Ms.">Ms.</option>
																<option value="Mrs.">Mrs.</option>
																<option value="Dr.">Dr.</option>
												            </select>
														</div>
														<div class="form-group col-md-4">
															<label class="control-label">First / Given Name</label>
															<input type="text" placeholder="Given Name" class="form-control" name="given_name" value="{{$user->given_name}}" required/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Last / Family Name</label>
															<input type="text" placeholder="Family Name" class="form-control" name="family_name" value="{{$user->family_name}}" required/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Gender</label>
															<select name="gender" class="form-control" id="gender" required>
												                <option value="Male">Male</option>
												                <option value="Female">Female</option>
												            </select>
														</div>													
														<div class="form-group col-md-6">
															<label class="control-label">Date of Birth</label>
															<input type="date" class="form-control" name="birthdate" value="{{$user->birthdate}}"/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Citizenship</label>
															<select name="citizenship" class="form-control select2" required>
																<option value="">Country</option>
																@foreach($countries as $country)
																	<option value="{{ $country->code }}" @if($user->citizenship == $country->code) selected @endif >{{ $country->country_name }}</option>
																@endforeach
												            </select>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">National Identification</label>
															<input type="text" placeholder="National Identification" class="form-control" name="national_identification" value="{{$user->national_identification}}"/>
														</div>
														<div class="form-group col-md-12">
															<label class="control-label">Preferred Language</label>
															<select name="preferred_language" class="form-control" id="preferred_language" required>
												                <option value="EN">English</option>
												                <option value="RU">Russian</option>
																<option value="CN">Chinese</option>
																<option value="SimpleCN">Simplified Chinese</option>
																<option value="KR">Korean</option>
																<option value="JP">Japanese</option>
												            </select>
														</div>	
													</div>						
													<div class="col-md-12">
														<div class="form-group col-md-4">
															<label class="control-label">Address</label>
															<input type="text" required placeholder="Address" class="form-control" name="address" value="{{$user->address}}"/>
														</div>
														<div class="form-group col-md-4">
															<label class="control-label">City</label>
															<input type="text" required placeholder="City" class="form-control" name="city" value="{{$user->city}}"/>
														</div>
														<div class="form-group col-md-4">
															<label class="control-label">Country</label>
															<select name="country" class="form-control select2" required>
																<option value="">Country</option>
																@foreach($countries as $country)
																	<option value="{{ $country->code }}" @if($user->country == $country->code) selected @endif >{{ $country->country_name }}</option>
																@endforeach
												            </select>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Country Residential Status</label>
															<input type="text" required placeholder="Country Residential Status" class="form-control" name="country_residential_status" value="{{$user->country_residential_status}}"/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Country Residential Identification</label>
															<input type="text" required placeholder="Country Residential Identification" class="form-control" name="country_residential_identification" value="{{$user->country_residential_identification}}"/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Residential Status Start Date</label>
															<input type="date" required placeholder="Residential Status Start Date" class="form-control" name="residential_status_start_date" value="{{$user->residential_status_start_date}}"/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Residential Status Expiry Date</label>
															<input type="date" required placeholder="Residential Status Expiry Date" class="form-control" name="residential_status_expiry_date" value="{{$user->residential_status_expiry_date}}"/>
														</div>
													</div>
													<div class="margin-top-10 col-md-12">
														<button type="submit" href="javascript:;" class="btn green-haze">
														Save Changes </button>
														<a href="{{url('home')}}" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END PERSONAL INFO TAB -->
											<!-- CONTRACT INFO TAB -->
											<div class="tab-pane" id="tab_1_2">												
												<form role="form" action="{{url('user_profile/update_contact')}}" method="POST" id="profile_contact">
													{{csrf_field()}}
													<div class="col-md-6">
														<h4>Permanent Home Address</h4>
														<div class="form-group">
															<label class="control-label">Address Line 1</label>
															<input type="text" placeholder="Address Line 1" class="form-control" name="permanent_address_line_1" value="{{$user->permanent_address_line_1}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Address Line 2</label>
															<input type="text" placeholder="Address Line 2" class="form-control" name="permanent_address_line_2" value="{{$user->permanent_address_line_2}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Address Line 3</label>
															<input type="text" placeholder="Address Line 3" class="form-control" name="permanent_address_line_3" value="{{$user->permanent_address_line_3}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">City</label>
															<input type="text" placeholder="City" class="form-control" name="permanent_city" value="{{$user->permanent_city}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">State / Province</label>
															<input type="text" placeholder="State / Province" class="form-control" name="permanent_state" value="{{$user->permanent_state}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Country</label>						
															<select class="form-control" name="permanent_country" id="permanent_country">
																<option value="">Country</option>
												                <option value="AF">Afghanistan</option>
												                <option value="AL">Albania</option>
												                <option value="DZ">Algeria</option>
												                <option value="AS">American Samoa</option>
												                <option value="AD">Andorra</option>
												                <option value="AO">Angola</option>
												                <option value="AI">Anguilla</option>
												                <option value="AR">Argentina</option>
												                <option value="AM">Armenia</option>
												                <option value="AW">Aruba</option>
												                <option value="AU">Australia</option>
												                <option value="AT">Austria</option>
												                <option value="AZ">Azerbaijan</option>
												                <option value="BS">Bahamas</option>
												                <option value="BH">Bahrain</option>
												                <option value="BD">Bangladesh</option>
												                <option value="BB">Barbados</option>
												                <option value="BY">Belarus</option>
												                <option value="BE">Belgium</option>
												                <option value="BZ">Belize</option>
												                <option value="BJ">Benin</option>
												                <option value="BM">Bermuda</option>
												                <option value="BT">Bhutan</option>
												                <option value="BO">Bolivia</option>
												                <option value="BA">Bosnia and Herzegowina</option>
												                <option value="BW">Botswana</option>
												                <option value="BV">Bouvet Island</option>
												                <option value="BR">Brazil</option>
												                <option value="IO">British Indian Ocean Territory</option>
												                <option value="BN">Brunei Darussalam</option>
												                <option value="BG">Bulgaria</option>
												                <option value="BF">Burkina Faso</option>
												                <option value="BI">Burundi</option>
												                <option value="KH">Cambodia</option>
												                <option value="CM">Cameroon</option>
												                <option value="CA">Canada</option>
												                <option value="CV">Cape Verde</option>
												                <option value="KY">Cayman Islands</option>
												                <option value="CF">Central African Republic</option>
												                <option value="TD">Chad</option>
												                <option value="CL">Chile</option>
												                <option value="CN">China</option>
												                <option value="CX">Christmas Island</option>
												                <option value="CC">Cocos (Keeling) Islands</option>
												                <option value="CO">Colombia</option>
												                <option value="KM">Comoros</option>
												                <option value="CG">Congo</option>
												                <option value="CD">Congo, the Democratic Republic of the</option>
												                <option value="CK">Cook Islands</option>
												                <option value="CR">Costa Rica</option>
												                <option value="CI">Cote d'Ivoire</option>
												                <option value="HR">Croatia (Hrvatska)</option>
												                <option value="CU">Cuba</option>
												                <option value="CY">Cyprus</option>
												                <option value="CZ">Czech Republic</option>
												                <option value="DK">Denmark</option>
												                <option value="DJ">Djibouti</option>
												                <option value="DM">Dominica</option>
												                <option value="DO">Dominican Republic</option>
												                <option value="EC">Ecuador</option>
												                <option value="EG">Egypt</option>
												                <option value="SV">El Salvador</option>
												                <option value="GQ">Equatorial Guinea</option>
												                <option value="ER">Eritrea</option>
												                <option value="EE">Estonia</option>
												                <option value="ET">Ethiopia</option>
												                <option value="FK">Falkland Islands (Malvinas)</option>
												                <option value="FO">Faroe Islands</option>
												                <option value="FJ">Fiji</option>
												                <option value="FI">Finland</option>
												                <option value="FR">France</option>
												                <option value="GF">French Guiana</option>
												                <option value="PF">French Polynesia</option>
												                <option value="TF">French Southern Territories</option>
												                <option value="GA">Gabon</option>
												                <option value="GM">Gambia</option>
												                <option value="GE">Georgia</option>
												                <option value="DE">Germany</option>
												                <option value="GH">Ghana</option>
												                <option value="GI">Gibraltar</option>
												                <option value="GR">Greece</option>
												                <option value="GL">Greenland</option>
												                <option value="GD">Grenada</option>
												                <option value="GP">Guadeloupe</option>
												                <option value="GU">Guam</option>
												                <option value="GT">Guatemala</option>
												                <option value="GN">Guinea</option>
												                <option value="GW">Guinea-Bissau</option>
												                <option value="GY">Guyana</option>
												                <option value="HT">Haiti</option>
												                <option value="HM">Heard and Mc Donald Islands</option>
												                <option value="VA">Holy See (Vatican City State)</option>
												                <option value="HN">Honduras</option>
												                <option value="HK">Hong Kong</option>
												                <option value="HU">Hungary</option>
												                <option value="IS">Iceland</option>
												                <option value="IN">India</option>
												                <option value="ID">Indonesia</option>
												                <option value="IR">Iran (Islamic Republic of)</option>
												                <option value="IQ">Iraq</option>
												                <option value="IE">Ireland</option>
												                <option value="IL">Israel</option>
												                <option value="IT">Italy</option>
												                <option value="JM">Jamaica</option>
												                <option value="JP">Japan</option>
												                <option value="JO">Jordan</option>
												                <option value="KZ">Kazakhstan</option>
												                <option value="KE">Kenya</option>
												                <option value="KI">Kiribati</option>
												                <option value="KP">Korea, Democratic People's Republic of</option>
												                <option value="KR">Korea, Republic of</option>
												                <option value="KW">Kuwait</option>
												                <option value="KG">Kyrgyzstan</option>
												                <option value="LA">Lao People's Democratic Republic</option>
												                <option value="LV">Latvia</option>
												                <option value="LB">Lebanon</option>
												                <option value="LS">Lesotho</option>
												                <option value="LR">Liberia</option>
												                <option value="LY">Libyan Arab Jamahiriya</option>
												                <option value="LI">Liechtenstein</option>
												                <option value="LT">Lithuania</option>
												                <option value="LU">Luxembourg</option>
												                <option value="MO">Macau</option>
												                <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
												                <option value="MG">Madagascar</option>
												                <option value="MW">Malawi</option>
												                <option value="MY">Malaysia</option>
												                <option value="MV">Maldives</option>
												                <option value="ML">Mali</option>
												                <option value="MT">Malta</option>
												                <option value="MH">Marshall Islands</option>
												                <option value="MQ">Martinique</option>
												                <option value="MR">Mauritania</option>
												                <option value="MU">Mauritius</option>
												                <option value="YT">Mayotte</option>
												                <option value="MX">Mexico</option>
												                <option value="FM">Micronesia, Federated States of</option>
												                <option value="MD">Moldova, Republic of</option>
												                <option value="MC">Monaco</option>
												                <option value="MN">Mongolia</option>
												                <option value="MS">Montserrat</option>
												                <option value="MA">Morocco</option>
												                <option value="MZ">Mozambique</option>
												                <option value="MM">Myanmar</option>
												                <option value="NA">Namibia</option>
												                <option value="NR">Nauru</option>
												                <option value="NP">Nepal</option>
												                <option value="NL">Netherlands</option>
												                <option value="AN">Netherlands Antilles</option>
												                <option value="NC">New Caledonia</option>
												                <option value="NZ">New Zealand</option>
												                <option value="NI">Nicaragua</option>
												                <option value="NE">Niger</option>
												                <option value="NG">Nigeria</option>
												                <option value="NU">Niue</option>
												                <option value="NF">Norfolk Island</option>
												                <option value="MP">Northern Mariana Islands</option>
												                <option value="NO">Norway</option>
												                <option value="OM">Oman</option>
												                <option value="PK">Pakistan</option>
												                <option value="PW">Palau</option>
												                <option value="PA">Panama</option>
												                <option value="PG">Papua New Guinea</option>
												                <option value="PY">Paraguay</option>
												                <option value="PE">Peru</option>
												                <option value="PH">Philippines</option>
												                <option value="PN">Pitcairn</option>
												                <option value="PL">Poland</option>
												                <option value="PT">Portugal</option>
												                <option value="PR">Puerto Rico</option>
												                <option value="QA">Qatar</option>
												                <option value="RE">Reunion</option>
												                <option value="RO">Romania</option>
												                <option value="RU">Russian Federation</option>
												                <option value="RW">Rwanda</option>
												                <option value="KN">Saint Kitts and Nevis</option>
												                <option value="LC">Saint LUCIA</option>
												                <option value="VC">Saint Vincent and the Grenadines</option>
												                <option value="WS">Samoa</option>
												                <option value="SM">San Marino</option>
												                <option value="ST">Sao Tome and Principe</option>
												                <option value="SA">Saudi Arabia</option>
												                <option value="SN">Senegal</option>
												                <option value="SC">Seychelles</option>
												                <option value="SL">Sierra Leone</option>
												                <option value="SG">Singapore</option>
												                <option value="SK">Slovakia (Slovak Republic)</option>
												                <option value="SI">Slovenia</option>
												                <option value="SB">Solomon Islands</option>
												                <option value="SO">Somalia</option>
												                <option value="ZA">South Africa</option>
												                <option value="GS">South Georgia and the South Sandwich Islands</option>
												                <option value="ES">Spain</option>
												                <option value="LK">Sri Lanka</option>
												                <option value="SH">St. Helena</option>
												                <option value="PM">St. Pierre and Miquelon</option>
												                <option value="SD">Sudan</option>
												                <option value="SR">Suriname</option>
												                <option value="SJ">Svalbard and Jan Mayen Islands</option>
												                <option value="SZ">Swaziland</option>
												                <option value="SE">Sweden</option>
												                <option value="CH">Switzerland</option>
												                <option value="SY">Syrian Arab Republic</option>
												                <option value="TW">Taiwan, Province of China</option>
												                <option value="TJ">Tajikistan</option>
												                <option value="TZ">Tanzania, United Republic of</option>
												                <option value="TH">Thailand</option>
												                <option value="TG">Togo</option>
												                <option value="TK">Tokelau</option>
												                <option value="TO">Tonga</option>
												                <option value="TT">Trinidad and Tobago</option>
												                <option value="TN">Tunisia</option>
												                <option value="TR">Turkey</option>
												                <option value="TM">Turkmenistan</option>
												                <option value="TC">Turks and Caicos Islands</option>
												                <option value="TV">Tuvalu</option>
												                <option value="UG">Uganda</option>
												                <option value="UA">Ukraine</option>
												                <option value="AE">United Arab Emirates</option>
												                <option value="GB">United Kingdom</option>
												                <option value="US">United States</option>
												                <option value="UM">United States Minor Outlying Islands</option>
												                <option value="UY">Uruguay</option>
												                <option value="UZ">Uzbekistan</option>
												                <option value="VU">Vanuatu</option>
												                <option value="VE">Venezuela</option>
												                <option value="VN">Viet Nam</option>
												                <option value="VG">Virgin Islands (British)</option>
												                <option value="VI">Virgin Islands (U.S.)</option>
												                <option value="WF">Wallis and Futuna Islands</option>
												                <option value="EH">Western Sahara</option>
												                <option value="YE">Yemen</option>
												                <option value="ZM">Zambia</option>
												                <option value="ZW">Zimbabwe</option>
												            </select>
														</div>
													</div>
													<div class="col-md-6" style="border-left: 1px solid #ddd;">
														<h4>Current Residential Address</h4>
														<div class="form-group">
															<label class="control-label">Address Line 1</label>
															<input type="text" placeholder="Address Line 1" class="form-control" name="current_residential_address_line_1" value="{{$user->current_residential_address_line_1}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Address Line 2</label>
															<input type="text" placeholder="Address Line 2" class="form-control" name="current_residential_address_line_2" value="{{$user->current_residential_address_line_2}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Address Line 3</label>
															<input type="text" placeholder="Address Line 3" class="form-control" name="current_residential_address_line_3" value="{{$user->current_residential_address_line_3}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">City</label>
															<input type="text" placeholder="City" class="form-control" name="current_residential_city" value="{{$user->current_residential_city}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">State / Province</label>
															<input type="text" placeholder="State / Province" class="form-control" name="current_residential_state" value="{{$user->current_residential_state}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Country</label>						
															<select class="form-control" name="current_residential_country" id="current_residential_country">
																<option value="">Country</option>
												                <option value="AF">Afghanistan</option>
												                <option value="AL">Albania</option>
												                <option value="DZ">Algeria</option>
												                <option value="AS">American Samoa</option>
												                <option value="AD">Andorra</option>
												                <option value="AO">Angola</option>
												                <option value="AI">Anguilla</option>
												                <option value="AR">Argentina</option>
												                <option value="AM">Armenia</option>
												                <option value="AW">Aruba</option>
												                <option value="AU">Australia</option>
												                <option value="AT">Austria</option>
												                <option value="AZ">Azerbaijan</option>
												                <option value="BS">Bahamas</option>
												                <option value="BH">Bahrain</option>
												                <option value="BD">Bangladesh</option>
												                <option value="BB">Barbados</option>
												                <option value="BY">Belarus</option>
												                <option value="BE">Belgium</option>
												                <option value="BZ">Belize</option>
												                <option value="BJ">Benin</option>
												                <option value="BM">Bermuda</option>
												                <option value="BT">Bhutan</option>
												                <option value="BO">Bolivia</option>
												                <option value="BA">Bosnia and Herzegowina</option>
												                <option value="BW">Botswana</option>
												                <option value="BV">Bouvet Island</option>
												                <option value="BR">Brazil</option>
												                <option value="IO">British Indian Ocean Territory</option>
												                <option value="BN">Brunei Darussalam</option>
												                <option value="BG">Bulgaria</option>
												                <option value="BF">Burkina Faso</option>
												                <option value="BI">Burundi</option>
												                <option value="KH">Cambodia</option>
												                <option value="CM">Cameroon</option>
												                <option value="CA">Canada</option>
												                <option value="CV">Cape Verde</option>
												                <option value="KY">Cayman Islands</option>
												                <option value="CF">Central African Republic</option>
												                <option value="TD">Chad</option>
												                <option value="CL">Chile</option>
												                <option value="CN">China</option>
												                <option value="CX">Christmas Island</option>
												                <option value="CC">Cocos (Keeling) Islands</option>
												                <option value="CO">Colombia</option>
												                <option value="KM">Comoros</option>
												                <option value="CG">Congo</option>
												                <option value="CD">Congo, the Democratic Republic of the</option>
												                <option value="CK">Cook Islands</option>
												                <option value="CR">Costa Rica</option>
												                <option value="CI">Cote d'Ivoire</option>
												                <option value="HR">Croatia (Hrvatska)</option>
												                <option value="CU">Cuba</option>
												                <option value="CY">Cyprus</option>
												                <option value="CZ">Czech Republic</option>
												                <option value="DK">Denmark</option>
												                <option value="DJ">Djibouti</option>
												                <option value="DM">Dominica</option>
												                <option value="DO">Dominican Republic</option>
												                <option value="EC">Ecuador</option>
												                <option value="EG">Egypt</option>
												                <option value="SV">El Salvador</option>
												                <option value="GQ">Equatorial Guinea</option>
												                <option value="ER">Eritrea</option>
												                <option value="EE">Estonia</option>
												                <option value="ET">Ethiopia</option>
												                <option value="FK">Falkland Islands (Malvinas)</option>
												                <option value="FO">Faroe Islands</option>
												                <option value="FJ">Fiji</option>
												                <option value="FI">Finland</option>
												                <option value="FR">France</option>
												                <option value="GF">French Guiana</option>
												                <option value="PF">French Polynesia</option>
												                <option value="TF">French Southern Territories</option>
												                <option value="GA">Gabon</option>
												                <option value="GM">Gambia</option>
												                <option value="GE">Georgia</option>
												                <option value="DE">Germany</option>
												                <option value="GH">Ghana</option>
												                <option value="GI">Gibraltar</option>
												                <option value="GR">Greece</option>
												                <option value="GL">Greenland</option>
												                <option value="GD">Grenada</option>
												                <option value="GP">Guadeloupe</option>
												                <option value="GU">Guam</option>
												                <option value="GT">Guatemala</option>
												                <option value="GN">Guinea</option>
												                <option value="GW">Guinea-Bissau</option>
												                <option value="GY">Guyana</option>
												                <option value="HT">Haiti</option>
												                <option value="HM">Heard and Mc Donald Islands</option>
												                <option value="VA">Holy See (Vatican City State)</option>
												                <option value="HN">Honduras</option>
												                <option value="HK">Hong Kong</option>
												                <option value="HU">Hungary</option>
												                <option value="IS">Iceland</option>
												                <option value="IN">India</option>
												                <option value="ID">Indonesia</option>
												                <option value="IR">Iran (Islamic Republic of)</option>
												                <option value="IQ">Iraq</option>
												                <option value="IE">Ireland</option>
												                <option value="IL">Israel</option>
												                <option value="IT">Italy</option>
												                <option value="JM">Jamaica</option>
												                <option value="JP">Japan</option>
												                <option value="JO">Jordan</option>
												                <option value="KZ">Kazakhstan</option>
												                <option value="KE">Kenya</option>
												                <option value="KI">Kiribati</option>
												                <option value="KP">Korea, Democratic People's Republic of</option>
												                <option value="KR">Korea, Republic of</option>
												                <option value="KW">Kuwait</option>
												                <option value="KG">Kyrgyzstan</option>
												                <option value="LA">Lao People's Democratic Republic</option>
												                <option value="LV">Latvia</option>
												                <option value="LB">Lebanon</option>
												                <option value="LS">Lesotho</option>
												                <option value="LR">Liberia</option>
												                <option value="LY">Libyan Arab Jamahiriya</option>
												                <option value="LI">Liechtenstein</option>
												                <option value="LT">Lithuania</option>
												                <option value="LU">Luxembourg</option>
												                <option value="MO">Macau</option>
												                <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
												                <option value="MG">Madagascar</option>
												                <option value="MW">Malawi</option>
												                <option value="MY">Malaysia</option>
												                <option value="MV">Maldives</option>
												                <option value="ML">Mali</option>
												                <option value="MT">Malta</option>
												                <option value="MH">Marshall Islands</option>
												                <option value="MQ">Martinique</option>
												                <option value="MR">Mauritania</option>
												                <option value="MU">Mauritius</option>
												                <option value="YT">Mayotte</option>
												                <option value="MX">Mexico</option>
												                <option value="FM">Micronesia, Federated States of</option>
												                <option value="MD">Moldova, Republic of</option>
												                <option value="MC">Monaco</option>
												                <option value="MN">Mongolia</option>
												                <option value="MS">Montserrat</option>
												                <option value="MA">Morocco</option>
												                <option value="MZ">Mozambique</option>
												                <option value="MM">Myanmar</option>
												                <option value="NA">Namibia</option>
												                <option value="NR">Nauru</option>
												                <option value="NP">Nepal</option>
												                <option value="NL">Netherlands</option>
												                <option value="AN">Netherlands Antilles</option>
												                <option value="NC">New Caledonia</option>
												                <option value="NZ">New Zealand</option>
												                <option value="NI">Nicaragua</option>
												                <option value="NE">Niger</option>
												                <option value="NG">Nigeria</option>
												                <option value="NU">Niue</option>
												                <option value="NF">Norfolk Island</option>
												                <option value="MP">Northern Mariana Islands</option>
												                <option value="NO">Norway</option>
												                <option value="OM">Oman</option>
												                <option value="PK">Pakistan</option>
												                <option value="PW">Palau</option>
												                <option value="PA">Panama</option>
												                <option value="PG">Papua New Guinea</option>
												                <option value="PY">Paraguay</option>
												                <option value="PE">Peru</option>
												                <option value="PH">Philippines</option>
												                <option value="PN">Pitcairn</option>
												                <option value="PL">Poland</option>
												                <option value="PT">Portugal</option>
												                <option value="PR">Puerto Rico</option>
												                <option value="QA">Qatar</option>
												                <option value="RE">Reunion</option>
												                <option value="RO">Romania</option>
												                <option value="RU">Russian Federation</option>
												                <option value="RW">Rwanda</option>
												                <option value="KN">Saint Kitts and Nevis</option>
												                <option value="LC">Saint LUCIA</option>
												                <option value="VC">Saint Vincent and the Grenadines</option>
												                <option value="WS">Samoa</option>
												                <option value="SM">San Marino</option>
												                <option value="ST">Sao Tome and Principe</option>
												                <option value="SA">Saudi Arabia</option>
												                <option value="SN">Senegal</option>
												                <option value="SC">Seychelles</option>
												                <option value="SL">Sierra Leone</option>
												                <option value="SG">Singapore</option>
												                <option value="SK">Slovakia (Slovak Republic)</option>
												                <option value="SI">Slovenia</option>
												                <option value="SB">Solomon Islands</option>
												                <option value="SO">Somalia</option>
												                <option value="ZA">South Africa</option>
												                <option value="GS">South Georgia and the South Sandwich Islands</option>
												                <option value="ES">Spain</option>
												                <option value="LK">Sri Lanka</option>
												                <option value="SH">St. Helena</option>
												                <option value="PM">St. Pierre and Miquelon</option>
												                <option value="SD">Sudan</option>
												                <option value="SR">Suriname</option>
												                <option value="SJ">Svalbard and Jan Mayen Islands</option>
												                <option value="SZ">Swaziland</option>
												                <option value="SE">Sweden</option>
												                <option value="CH">Switzerland</option>
												                <option value="SY">Syrian Arab Republic</option>
												                <option value="TW">Taiwan, Province of China</option>
												                <option value="TJ">Tajikistan</option>
												                <option value="TZ">Tanzania, United Republic of</option>
												                <option value="TH">Thailand</option>
												                <option value="TG">Togo</option>
												                <option value="TK">Tokelau</option>
												                <option value="TO">Tonga</option>
												                <option value="TT">Trinidad and Tobago</option>
												                <option value="TN">Tunisia</option>
												                <option value="TR">Turkey</option>
												                <option value="TM">Turkmenistan</option>
												                <option value="TC">Turks and Caicos Islands</option>
												                <option value="TV">Tuvalu</option>
												                <option value="UG">Uganda</option>
												                <option value="UA">Ukraine</option>
												                <option value="AE">United Arab Emirates</option>
												                <option value="GB">United Kingdom</option>
												                <option value="US">United States</option>
												                <option value="UM">United States Minor Outlying Islands</option>
												                <option value="UY">Uruguay</option>
												                <option value="UZ">Uzbekistan</option>
												                <option value="VU">Vanuatu</option>
												                <option value="VE">Venezuela</option>
												                <option value="VN">Viet Nam</option>
												                <option value="VG">Virgin Islands (British)</option>
												                <option value="VI">Virgin Islands (U.S.)</option>
												                <option value="WF">Wallis and Futuna Islands</option>
												                <option value="EH">Western Sahara</option>
												                <option value="YE">Yemen</option>
												                <option value="ZM">Zambia</option>
												                <option value="ZW">Zimbabwe</option>
												            </select>
														</div>
													</div>
													
														<div class="form-group col-md-6">
															<label class="control-label col-md-6">Primary Contact Number</label>
															<input type="tel" placeholder="[Country Code] [Area Code] [Number]" class="form-control" name="primary_contact_number" value="{{$user->primary_contact_number}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Emergency Contact Number</label>
															<input type="tel" placeholder="[Country Code] [Area Code] [Number]" class="form-control" name="emergency_contact_number" value="{{$user->emergency_contact_number}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
														</div>
	 													<div class="form-group col-md-12">
															<label class="control-label">Mobile Number</label>
															<input type="tel" placeholder="[Country Code] [Area Code] [Number]" class="form-control" name="mobile_number" value="{{$user->mobile_number}}" onkeypress='return event.charCode >= 48 && event.charCode <= 57'/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Primary Email Address</label>
															<input type="email" placeholder="Primary Email Address" class="form-control" name="primary_email_address" value="{{$user->primary_email_address}}"/>
														</div>
														<div class="form-group col-md-6">
															<label class="control-label">Secondary Email Address</label>
															<input type="email" placeholder="Secondary Email Address" class="form-control" name="secondary_email_address" value="{{$user->secondary_email_address}}"/>
														</div>
													
													<div class="margin-top-10 col-md-12">
														<button type="submit" href="javascript:;" class="btn green-haze">
														Save Changes </button>
														<a href="{{url('home')}}" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END CONTRACT INFO TAB -->
											<!-- EMERGENCY INFO TAB -->
											<div class="tab-pane" id="tab_1_3">
												<form role="form" action="{{url('user_profile/update_emergency')}}" method="POST" id="profile">
													{{csrf_field()}}															
													<div class="col-md-12">
														<!-- Emergency use-->
														<div class="form-group">
															<label class="control-label">Salutation</label>
															<select name="emergency_salutation" class="form-control" id="emergency_salutation">
															    <option value=""> </option>
												                <option value="Mr." @if($user->emergency_salutation == 'Mr.') selected @endif >Mr.</option>
												                <option value="Ms." @if($user->emergency_salutation == 'Ms.') selected @endif >Ms.</option>
																<option value="Mrs." @if($user->emergency_salutation == 'Mrs.') selected @endif >Mrs.</option>
																<option value="Dr."> @if($user->emergency_salutation == 'Dr.') selected @endif Dr.</option>
												            </select>
														</div>
														<div class="form-group">
															<label class="control-label">First / Given Name</label>
															<input type="text" required placeholder="First / Given Name" class="form-control" name="emergency_first" value="{{$user->emergency_first}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Last / Family Name</label>
															<input type="text" required placeholder="Last / Family Name" class="form-control" name="emergency_last" value="{{$user->emergency_last}}"/>
														</div>
														<div class="form-group">
															<label class="control-label">Gender</label>
															<select name="emergency_gender" class="form-control" id="emergency_gender" required>
												                <option value="Male">Male</option>
												                <option value="Female">Female</option>
												            </select>
														</div>
														<div class="form-group">
															<label class="control-label">Your Relationship</label>
															<input required type="text" placeholder="Your Relationship" class="form-control" name="emergency_relationship" value="{{$user->emergency_relationship}}"/>
														</div>										
														<div class="form-group">
															<label class="control-label">Contact Number</label>
															<input required type="tel" placeholder="[Country Code] [Area Code] [Number]" class="form-control" name="personal_emergency_contact_number" value="{{$user->personal_emergency_contact_number}}" />
														</div>														
													</div>													
													<div class="margin-top-10 col-md-12">
														<button type="submit" href="javascript:;" class="btn green-haze">
														Save Changes </button>
														<a href="{{url('home')}}" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END EMERGENCY INFO TAB -->
											<!-- CHANGE AVATAR TAB -->
											<div class="tab-pane" id="tab_1_4">
												<p>
													 Select Photo and click submit to change your account.
												</p>
												<form action="{{url('user_profile/update_image')}}" method="POST" role="form" enctype="multipart/form-data">
													{{csrf_field()}}
													<div class="form-group">
														<div class="fileinput <?php echo (($user->image_name)?"fileinput-exists":"fileinput-new");?>" data-provides="fileinput">
			                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
			                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="">
			                                                </div>
			                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;">
			                                                	@if($user->image_name)
			                                                    <img src="{{asset('uploads/images/profiles/'.$user->image_name.'.'.$user->image_ext)}}" style="max-width: 200px; max-height: 150px; line-height: 10px;"/>
			                                                    @endif
			                                                </div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="hidden" value="" name="..."><input type="file" name="file" accept="image/*">
																</span>
																<a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
														
													</div>
													<div class="margin-top-10">
														<button type="submit" class="btn green-haze">Save Photo</button>
														<a href="{{url('home')}}" class="btn default">
														Back </a>
													</div>
												</form>
											</div>
											<!-- END CHANGE AVATAR TAB -->
											<!-- CHANGE PASSWORD TAB -->
											<div class="tab-pane" id="tab_1_5">
												<form action="{{url('user_profile/change_password')}}" method="POST" role="form" id="change_pswd">
													@if(strlen($error = $errors->first('error')))
									                    <div id="prefix_1108441613502" class="Metronic-alerts alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Current Password is not correct.</div>
									                @endif
									                {{csrf_field()}}
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" class="form-control" name="current_pswd"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" class="form-control" id="new_pswd" name="new_pswd"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" class="form-control" name="re_pswd"/>
													</div>
													<div class="margin-top-10">
														<button type="submit" href="javascript:;" class="btn green-haze">
														Change Password </button>
														<a href="javascript:;" class="btn default">
														Back </a>
													</div>
												</form>
											</div>
											<!-- END CHANGE PASSWORD TAB -->
											<!-- ROLE SETTINGS -->
											<div class="tab-pane" id="tab_1_7">
												<form action="{{url('user_profile/update_role_settings')}}" method="POST" role="form" id="role_settings">							
									                {{csrf_field()}}
													<div class="form-group col-md-12">
													 	
	                                                    <div class="md-checkbox row">
	                                                        <input type="checkbox" class="md-check" name="generic_user" id="generic_user" @if ($rolesetting->generic_user) checked @endif>
	                                                        <label for="generic_user">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>  
	                                                            Generic User :  No access to any household, estates (Default)
	                                                        </label>
	                                                    </div>
	                                                    <br/>
	                                                    <div class="md-checkbox row">
	                                                        <input type="checkbox" class="md-check" name="home_owner" id="home_owner" @if ($rolesetting->home_owner) checked @endif>
	                                                        <label for="home_owner">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                            Home Owner : Legal Owner of the premise. Require proof of Sales & Purchase Agreement.
	                                                        </label>                                  
	                                                    </div>
	                                                    <div class='row'>	                                                    	<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_owner_country" id="home_owner_country" placeholder="Country" value="{{$rolesetting->home_owner_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_owner_state" id="home_owner_state" placeholder="state" value="{{$rolesetting->home_owner_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="home_owner_estate" id="home_owner_estate" placeholder="Estate Name" value="{{$rolesetting->home_owner_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
	                                                    <div class="row">
	                                                    	<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_owner_building" id="home_owner_building" placeholder="Building Name/No." value="{{$rolesetting->home_owner_building}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_owner_level" id="home_owner_level" placeholder="Level" value="{{$rolesetting->home_owner_level}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_owner_unit" id="home_owner_unit" placeholder="Unit" value="{{$rolesetting->home_owner_unit}}"/>
	                                                    	</div>	                                                        
	                                                    </div>
	                                                    <br/>
	                                                    <div class="md-checkbox row">
	                                                        <input type="checkbox" id="home_member" class="md-check" name='home_member' @if ($rolesetting->home_member) checked @endif>
	                                                        <label for="home_member">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Home Member : You are related to the Legal Owner. To be approved/granted by Home Owner.
	                                                        </label>
	                                                    </div>
		                                                <div class='row'>	                                                    	<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_member_country" id="home_member_country" placeholder="Country" value="{{$rolesetting->home_member_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_member_state" id="home_member_state" placeholder="state" value="{{$rolesetting->home_member_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="home_member_estate" id="home_member_estate" placeholder="Estate Name" value="{{$rolesetting->home_member_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
	                                                    <div class="row">
	                                                    	<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_member_building" id="home_member_building" placeholder="Building Name/No." value="{{$rolesetting->home_member_building}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_member_level" id="home_member_level" placeholder="Level" value="{{$rolesetting->home_member_level}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="home_member_unit" id="home_member_unit" placeholder="Unit" value="{{$rolesetting->home_member_unit}}"/>
	                                                    	</div>	                                                        
	                                                    </div>
	                                                    <br/>
														<div class="md-checkbox row">
	                                                        <input type="checkbox" id="tenant_master" class="md-check" name='tenant_master' @if ($rolesetting->tenant_master) checked @endif>
	                                                        <label for="tenant_master">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Tenant Master : You are the occupant of the premise. Require proof in the Rental/Lease Agreement.
	                                                        </label>
	                                                    </div>
														<div class='row'>
															<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_master_country" id="tenant_master_country" placeholder="Country" value="{{$rolesetting->tenant_master_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_master_state" id="tenant_master_state" placeholder="state" value="{{$rolesetting->tenant_master_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="tenant_master_estate" id="tenant_master_estate" placeholder="Estate Name" value="{{$rolesetting->tenant_master_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
	                                                    <div class="row">
	                                                    	<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_master_building" id="tenant_master_building" placeholder="Building Name/No." value="{{$rolesetting->tenant_master_building}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_master_level" id="tenant_master_level" placeholder="Level" value="{{$rolesetting->tenant_master_level}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_master_unit" id="tenant_master_unit" placeholder="Unit" value="{{$rolesetting->tenant_master_unit}}"/>
	                                                    	</div>	                                                        
	                                                    </div>
	                                                    <br/>
	                                                    <div class="md-checkbox row">
	                                                        <input type="checkbox" id="tenant_member" class="md-check" name='tenant_member' @if ($rolesetting->tenant_member) checked @endif>
	                                                        <label for="tenant_member">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Tenant Member : You are related to the Tenant Master, with name listed in the Rental/Lease Agreement.
	                                                        </label>
	                                                    </div>
	                                                    <div class='row'>
															<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_member_country" id="tenant_member_country" placeholder="Country" value="{{$rolesetting->tenant_member_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_member_state" id="tenant_member_state" placeholder="state" value="{{$rolesetting->tenant_member_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="tenant_member_estate" id="tenant_member_estate" placeholder="Estate Name" value="{{$rolesetting->tenant_member_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
	                                                    <div class="row">
	                                                    	<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_member_building" id="tenant_member_building" placeholder="Building Name/No." value="{{$rolesetting->tenant_member_building}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_member_level" id="tenant_member_level" placeholder="Level" value="{{$rolesetting->tenant_member_level}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="tenant_member_unit" id="tenant_member_unit" placeholder="Unit" value="{{$rolesetting->tenant_member_unit}}"/>
	                                                    	</div>	                                                        
	                                                    </div>
	                                                    <br/>
														<div class="md-checkbox row">
	                                                        <input type="checkbox" id="council_member" class="md-check" name='council_member' @if ($rolesetting->council_member) checked @endif>
	                                                        <label for="council_member">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Council Member : You are a member of the Estate Council. To be approved / granted by Estate Manager.
	                                                        </label>
	                                                    </div>
														<div class='row'>
															<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="council_member_country" id="council_member_country" placeholder="Country" value="{{$rolesetting->council_member_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="council_member_state" id="council_member_state" placeholder="state" value="{{$rolesetting->council_member_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="council_member_estate" id="council_member_estate" placeholder="Estate Name" value="{{$rolesetting->council_member_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
														<div class="md-checkbox row">
	                                                        <input type="checkbox" id="estate_officer" class="md-check" name='estate_officer' @if ($rolesetting->estate_officer) checked @endif>
	                                                        <label for="estate_officer">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Estate Officer : You are appointed to operate the Estate. To be approved / granted by Estate Manager or Council Member.
	                                                        </label>
	                                                    </div>
														<div class='row'>
															<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="estate_officer_country" id="estate_officer_country" placeholder="Country" value="{{$rolesetting->estate_officer_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="estate_officer_state" id="estate_officer_state" placeholder="state" value="{{$rolesetting->estate_officer_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="estate_officer_estate" id="estate_officer_estate" placeholder="Estate Name" value="{{$rolesetting->estate_officer_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
														<div class="md-checkbox row">
	                                                        <input type="checkbox" id="estate_manager" class="md-check" name='estate_manager'  @if ($rolesetting->estate_manager) checked @endif>
	                                                        <label for="estate_manager">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Estate Manager : You are appointed to oversee and manage the Estate. To be approved / Granted by Estate Officer or Council Member or Estate Developer.                                               	
	                                                        </label>
	                                                    </div>
														<div class='row'>
															<div class="col-md-2"></div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="estate_manager_country" id="estate_manager_country" placeholder="Country" value="{{$rolesetting->estate_manager_country}}"/>
	                                                    	</div>
	                                                    	<div class="col-md-2">
	                                                    		<input type="text" name="estate_manager_state" id="estate_manager_state" placeholder="state" value="{{$rolesetting->estate_manager_state}}"/>
	                                                    	</div>
	                                                        <div class="col-md-2">
	                                                    		<input type="text" name="estate_manager_estate" id="estate_manager_estate" placeholder="Estate Name" value="{{$rolesetting->estate_manager_estate}}"/>
	                                                    	</div>
	                                                    </div>
	                                                    <br/>
	                                                    <div class="md-checkbox row">
	                                                        <input type="checkbox" id="estate_developer" class="md-check" name='estate_developer' @if ($rolesetting->estate_developer) checked @endif>
	                                                        <label for="estate_developer">
	                                                            <span></span>
	                                                            <span class="check"></span>
	                                                            <span class="box"></span>
	                                                        	Estate Developer : You are appointed to setup and build the Estate. To be approved by Variantz Reziden Representative.                 	
	                                                        </label>
	                                                    </div>
                                                															
													</div>													
													<div class="margin-top-10">
														<button type="submit" href="javascript:;" class="btn green-haze">
														Save</button>
														<a href="{{url('home')}}" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<!-- END ROLE SETTINGS TAB -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PROFILE CONTENT -->
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
{{ Html::script('plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ Html::script('js/profile.js') }}
<script type="text/javascript">
jQuery(document).ready(function() {    
   //Profile.init();
   	$('.select2').select2({
            placeholder: "Select Country",
            allowClear: true
    }).select2('val','{{$user->country}}');

	$('#preferred_language').val("{{$user->preferred_language}}");
	$('#gender').val("{{$user->gender}}");
	$('#emergency_gender').val("{{$user->emergency_gender}}");

	$('#permanent_country').val("{{$user->permanent_country}}");
	$('#current_residential_country').val("{{$user->current_residential_country}}");

   	Profile.init();
});	
</script>
</body>
<!-- END BODY -->
</html>