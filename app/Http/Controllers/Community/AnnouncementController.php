<?php
namespace App\Http\Controllers\Community;
use App\Model\Announcements;
use App\Model\User;
use App\Model\EstateStaff;
use App\Model\Roles;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default AnnouncementController
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	
	|
	*/

	public function showAnnouncement(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$residents =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))
				->where('announcement_type', 'resident')
				->leftjoin('users', 'announcements.publisher_id', '=', 'users.id')
               ->orderBy('datetime', 'desc')
               ->get();
		$managers =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))
				->where('announcement_type', 'manager')
				->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->orderBy('datetime', 'desc')
               ->get();
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

		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.community.announcement', array('user'=>Auth::user(), 'submenu'=>'announcement', 'menu'=>'community', 'residents'=>$residents, 'managers'=>$managers, 'role'=>$Role, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function getAnnouncements_today_residents()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type', 'resident')
				->whereRaw(DB::raw('Date(datetime) = Date(NOW())'))
				->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->orderBy('datetime', 'desc')
               ->get();
        $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_week_residents()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type','resident')
				->whereRaw(DB::raw('Date(datetime) > DATE_SUB(NOW(), INTERVAL 7 DAY)'))
               ->orderBy('datetime', 'desc')
               ->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->get();
        $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_month_residents()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type','resident')
				->whereRaw(DB::raw('Date(datetime) > DATE_SUB(NOW(), INTERVAL 30 DAY)'))
               ->orderBy('datetime', 'desc')
               ->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->get();
       $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_all_residents()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type','resident')
				->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->orderBy('datetime', 'desc')
               ->get();
        $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_today_managers()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type', 'manager')
				->whereRaw(DB::raw('Date(datetime) = Date(NOW())'))
				->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->orderBy('datetime', 'desc')
               ->get();
         $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_week_managers()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type','manager')
				->whereRaw(DB::raw('Date(datetime) > DATE_SUB(NOW(), INTERVAL 7 DAY)'))
               ->orderBy('datetime', 'desc')
               ->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->get();
        $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_month_managers()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type','manager')
				->whereRaw(DB::raw('Date(datetime) > DATE_SUB(NOW(), INTERVAL 30 DAY)'))
               ->orderBy('datetime', 'desc')
               ->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->get();
         $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}

	public function getAnnouncements_all_managers()
	{
		$announcements =  Announcements::select(DB::raw('announcements.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('announcement_type','manager')
				->join('users', 'announcements.publisher_id', '=', 'users.id')
               ->orderBy('datetime', 'desc')
               ->get();
         $Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
					->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
					->where('estate_staff.user_id', Auth::user()->id)
					->first();
        echo json_encode(array('data'=>$announcements, 'role'=>$Role));
	}	

	public function setAnnouncement(Request $request)
	{
		$announcement = array();
		$announcement['subject'] = $request->subject;
		$announcement['message'] = $request->message;
		$announcement['publisher_id'] = $request->publisher_id;
		$announcement['updated_by'] = $request->updated_by;
		$estate_id = $request->session()->get('visit_estate_id');	
		$announcement['estate_id'] = $estate_id;
		$Role = EstateStaff::select(DB::raw('estate_staff.*, roles.role_name'))
							->leftjoin('roles', 'estate_staff.role_type','=','roles.id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();
		if($Role->role_type==1||$Role->role_type==2||$Role->role_type==3){
			$announcement['announcement_type'] = 'manager';
		}else{
			$announcement['announcement_type'] = 'resident';
		}
		$result['announcement_id'] = Announcements::insertGetId($announcement);
		echo json_encode($result);
	}

	public function editAnnouncement(Request $request)
	{
		$announcement = array();
		$announcement['subject'] = $request->subject;
		$announcement['message'] = $request->message;
		$announcement['updated_by'] = $request->updated_by;
		$result['success'] = Announcements::where('id', $request->id)
					->update($announcement);
		echo json_encode($result);
	}

	public function sendEmail()
    { 
        Mail::send('emails.hello', array('nick' => 'dandy'), function($message)
        {
            $message->to('wang_xiaoming111@yahoo.com', 'dandy hello')->subject('Welcome!');
        });
                  
    }
}