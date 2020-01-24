<?php
namespace App\Http\Controllers;

use App\Model\UserImages;
use App\Model\User;
use App\Model\EstateStaff;
use App\Model\Estates;
use App\Model\Roles;
use App\Model\Role_Setting;
use App\Model\CountryCode;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showDashboard(Request $request)
	{
		//$request->session()->put('visit_estate_id',1);
		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}

		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.dashboard', array('user'=>Auth::user(),'submenu'=>'dashboard', 'menu'=>'home', 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function showUserProfile(Request $request)
	{
		//$request->session()->put('visit_estate_id',1);
		$Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
							->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}
		$countries = CountryCode::all();
		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.user_profile', array('user'=>Auth::user(),'submenu'=>'dashboard', 'menu'=>'home', 'role'=>$Role, 'rolesetting'=>$RoleSetting, 'estate'=>$estate, 'countries' => $countries));
	}

	public function updateImage(Request $request)
	{
		$image = $request->file('file');		
		$user = User::where('id', Auth::user()->id)->firstOrFail();
		if($image){
			$image_name = Auth::user()->username."_".Auth::user()->id.'_'.time();
			$image_ext = $image->getClientOriginalExtension();
			$filename = $image_name.'.'.$image_ext;
			$image->move(public_path('uploads/images/profiles/'), $filename);
			$user->image_name = $image_name;
			$user->image_ext = $image_ext;
		}
		$user->save();
		return redirect('home');
	}

	public function changePassword(Request $request)
	{
		$user = User::where('id', Auth::user()->id)->firstOrFail();
		if(!Hash::check($request->current_pswd, $user->password)){
			return redirect()->back()->withErrors([
	                'error' => 'password is not correct',
	            ]);
		}
		$new_password = bcrypt($request->new_pswd);
		$user->password = $new_password;
		$user->save();
		return redirect('home');
	}

	public function updateProfile(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'given_name'                => 'required|max:255',
			'family_name'               => 'required|max:255',
			'family_name'               => 'required|max:255',
			'city'                  	=> 'required|max:255',
			'country'                  	=> 'required|max:255',
			'family_name'               => 'required|max:255',
            'email'                 	=> 'required|email|unique:users,email,'. Auth::user()->id .'|max:255',
            'username'          		=> 'required|unique:users,username,'. Auth::user()->id .'|max:255',
			'birthdate'               	=> 'required|date|before:now|max:255',
			'residential_status_start_date'	=> 'required|date|before:residential_status_expiry_date|before:now|max:255',
			'residential_status_expiry_date'	=> 'required|date|after:residential_status_start_date|max:255',
			
        ]);

        if ($validator->fails()) {
            return back()
                    ->withErrors($validator)
                    ->withInput();
        }

		$user = User::where('id', Auth::user()->id)->firstOrFail();
		$user->given_name 	= $request->given_name;
		$user->family_name 	= $request->family_name;
		$user->address 		= $request->address;
		$user->city 		= $request->city;
		$user->country 		= $request->country;
		$user->username 	= $request->username;
		$user->email 		= $request->email;
		$user->salutation 	= $request->salutation;
		$user->gender 		= $request->gender;
		$user->birthdate 	= $request->birthdate;
		$user->citizenship 	= $request->citizenship;
		
		$user->national_identification 	= $request->national_identification;
		$user->preferred_language 		= $request->preferred_language;

		$user->country_residential_status 			= $request->country_residential_status;
		$user->country_residential_identification 	= $request->country_residential_identification;
		$user->residential_status_start_date 		= $request->residential_status_start_date;
		$user->residential_status_expiry_date 		= $request->residential_status_expiry_date;

		$user->save();
		return redirect('home');
	}


	public function updateEmergency(Request $request)
	{
		$user = User::where('id', Auth::user()->id)->firstOrFail();

		$user->emergency_use 			= $request->emergency_use;
		$user->emergency_salutation 	= $request->emergency_salutation;
		$user->emergency_first 			= $request->emergency_first;
		$user->emergency_last 			= $request->emergency_last;
		$user->emergency_gender 		= $request->emergency_gender;
		$user->emergency_relationship 	= $request->emergency_relationship;
		
		$user->personal_emergency_contact_number 	= $request->personal_emergency_contact_number;

		$user->save();
		return redirect('home');
	}

	public function updateContact(Request $request)
	{
		$user = User::where('id', Auth::user()->id)->firstOrFail();
		
		$user->permanent_home_address		= $request->permanent_home_address;
		$user->permanent_address_line_1		= $request->permanent_address_line_1;
		$user->permanent_address_line_2		= $request->permanent_address_line_2;
		$user->permanent_address_line_3		= $request->permanent_address_line_3;

		$user->permanent_city 	= $request->permanent_city;
		$user->permanent_state 	= $request->permanent_state;
		$user->permanent_country= $request->permanent_country;

		$user->current_residential_address			= $request->current_residential_address;
		$user->current_residential_address_line_1	= $request->current_residential_address_line_1;
		$user->current_residential_address_line_2	= $request->current_residential_address_line_2;
		$user->current_residential_address_line_3	= $request->current_residential_address_line_3;

		$user->current_residential_city 	= $request->current_residential_city;
		$user->current_residential_state 	= $request->current_residential_state;
		$user->current_residential_country	= $request->current_residential_country;

		$user->primary_contact_number 	= $request->primary_contact_number;
		$user->emergency_contact_number	= $request->emergency_contact_number;
		$user->mobile_number			= $request->mobile_number;
		$user->primary_email_address	= $request->primary_email_address;
		$user->secondary_email_address	= $request->secondary_email_address;
	
		$user->save();
		return redirect('home');
	}

	public function updateRoleSettings(Request $request) {

       	$role = Role_Setting::where('user_id', Auth::user()->id)->first();        

       	$record['user_id']		= Auth::user()->id;
		$record['generic_user'] = $request->generic_user === 'on' ? 1:0;		
		$record['home_owner'] 	= $request->home_owner === 'on' ? 1:0;
			if ($request->home_owner === 'on') {
				$record['home_owner_country'] 	= $request->home_owner_country;
				$record['home_owner_state'] 	= $request->home_owner_state;
				$record['home_owner_estate'] 	= $request->home_owner_estate;
				$record['home_owner_building'] 	= $request->home_owner_building;
				$record['home_owner_level'] 	= $request->home_owner_level;
				$record['home_owner_unit'] 		= $request->home_owner_unit;
			}
		$record['home_member'] 	= $request->home_member === 'on' ? 1:0;
			if ($request->home_member === 'on') {
				$record['home_member_country'] 	= $request->home_member_country;
				$record['home_member_state'] 	= $request->home_member_state;
				$record['home_member_estate'] 	= $request->home_member_estate;
				$record['home_member_building']	= $request->home_member_building;
				$record['home_member_level'] 	= $request->home_member_level;
				$record['home_member_unit'] 	= $request->home_member_unit;
			}
		$record['tenant_master'] 	= $request->tenant_master === 'on' ? 1:0;
			if ($request->tenant_master === 'on') {
				$record['tenant_master_country'] 	= $request->tenant_master_country;
				$record['tenant_master_state'] 		= $request->tenant_master_state;
				$record['tenant_master_estate'] 	= $request->tenant_master_estate;
				$record['tenant_master_building']	= $request->tenant_master_building;
				$record['tenant_master_level'] 		= $request->tenant_master_level;
				$record['tenant_master_unit'] 		= $request->tenant_master_unit;				
			}
		$record['tenant_master'] 	= $request->tenant_master === 'on' ? 1:0;
			if ($request->tenant_master === 'on') {
				$record['tenant_master_country'] 	= $request->tenant_master_country;
				$record['tenant_master_state'] 		= $request->tenant_master_state;
				$record['tenant_master_estate'] 	= $request->tenant_master_estate;
				$record['tenant_master_building']	= $request->tenant_master_building;
				$record['tenant_master_level'] 		= $request->tenant_master_level;
				$record['tenant_master_unit'] 		= $request->tenant_master_unit;				
			}
		$record['tenant_member'] 	= $request->tenant_member === 'on' ? 1:0;
			if ($request->tenant_member === 'on') {
				$record['tenant_member_country'] 	= $request->tenant_member_country;
				$record['tenant_member_state'] 		= $request->tenant_member_state;
				$record['tenant_member_estate'] 	= $request->tenant_member_estate;
				$record['tenant_member_building']	= $request->tenant_member_building;
				$record['tenant_member_level'] 		= $request->tenant_member_level;
				$record['tenant_member_unit'] 		= $request->tenant_member_unit;				
			}
		$record['council_member'] 	= $request->council_member === 'on' ? 1:0;
			if ($request->council_member === 'on') {
				$record['council_member_country'] 	= $request->council_member_country;
				$record['council_member_state'] 	= $request->council_member_state;
				$record['council_member_estate'] 	= $request->council_member_estate;			
			}
		$record['estate_officer'] 	= $request->estate_officer === 'on' ? 1:0;
			if ($request->estate_officer === 'on') {
				$record['estate_officer_country'] 	= $request->estate_officer_country;
				$record['estate_officer_state'] 	= $request->estate_officer_state;
				$record['estate_officer_estate'] 	= $request->estate_officer_estate;			
			}
		$record['estate_manager'] 	= $request->estate_manager === 'on' ? 1:0;
			if ($request->estate_manager === 'on') {
				$record['estate_manager_country'] 	= $request->estate_manager_country;
				$record['estate_manager_state'] 	= $request->estate_manager_state;
				$record['estate_manager_estate'] 	= $request->estate_manager_estate;			
			}
		$record['estate_developer']	= $request->estate_developer === 'on' ? 1:0;
       	

       	if ($role) {       					
			$result = Role_Setting::where('user_id', Auth::user()->id)
									->update($record);
   		} else {
			$id = Role_Setting::insertGetId($record);			
   		}
			
   		return redirect('home');
	}
}