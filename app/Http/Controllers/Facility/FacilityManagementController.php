<?php
namespace App\Http\Controllers\Facility;
use App\Model\User;
use App\Model\Facility_Type;
use App\Model\FacilityImages;
use App\Model\Facility;
use App\Model\Facility_Hours;
use App\Model\Facility_Book;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;

class FacilityManagementController extends Controller {

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

	public function showFacilityManagement(Request $request)
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

		return View::make('pages.facility.management', array('user'=>Auth::user(), 'submenu'=>'management', 'menu'=>'facility', 'estate_id'=>$estate_id, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function getBook(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$books = Facility_Book::select(DB::raw('facility_book.*, users.given_name, facilities.facility_name, facilities.estate_id'))
								->where('facilities.estate_id', $estate_id)
								->leftjoin('facilities', 'facilities.id','=','facility_book.facility_id')
								->leftjoin('users', 'users.id','=','facility_book.book_by')
								->get();
		echo json_encode(array('aaData'=>$books));
	}

	public function updateStatus(Request $request)
	{
		$id = $request->id;
		$moving['status'] = $request->status;
		$result = Facility_Book::where('id', $id)
							->update($moving);
		echo json_encode($result);
	}
}	