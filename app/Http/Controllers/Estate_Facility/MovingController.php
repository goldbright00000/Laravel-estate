<?php
namespace App\Http\Controllers\Estate_Facility;
use App\Model\User;
use App\Model\Moving;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MovingController extends Controller {

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

	public function showMoving(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');

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

		return View::make('pages.facility.moving', array('user'=>Auth::user(), 'submenu'=>'moving', 'menu'=>'facility', 'estate_id'=>$estate_id,  'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}	

	public function newRequest(Request $request)
	{
		$new_request['building'] = $request->building;
		$new_request['level'] = $request->level;
		$new_request['unit'] = $request->unit;
		$new_request['moving_date'] = $request->moving_date;
		$new_request['estate_id'] = $request->session()->get('visit_estate_id');
		$new_request['status'] = 'pending';
		$id = Moving::insertGetId($new_request);
		$new_request['id'] = $id;
		echo json_encode($new_request);
	}

	public function getRequests(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$result = Moving::where('estate_id', $estate_id)
							->get();
		echo json_encode(array('aaData'=>$result));
	}

	public function updateStatus(Request $request)
	{
		$id = $request->id;
		$moving['status'] = $request->status;
		$result = Moving::where('id', $id)
							->update($moving);
		echo json_encode($result);
	}
}	