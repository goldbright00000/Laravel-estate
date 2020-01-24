<?php
namespace App\Http\Controllers\Security;
use DateTime;
use App\Model\User;
use App\Model\Jobs;
use App\Model\Moving;
use App\Model\Access_Cards;
use App\Model\Issue_Access_Cards;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AccessCardManagementController extends Controller {

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

	public function showAccessCardManagement(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$jobs = Jobs::where('estate_id', $estate_id)
							->get();

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

		return View::make('pages.security.accesscardmanagement', array('user'=>Auth::user(), 'submenu'=>'accesscard', 'menu'=>'security', 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}	

	public function getAccessCard(Request $request)
	{
		//$estate_id = $request->session()->get('visit_estate_id');
		$result = Access_Cards::all();
		/*$result = Maintenance::select(DB::raw('maintenance.*, jobs.id as jobs_id, jobs.job_name, jobs.description'))
							->where('maintenance.estate_id', $estate_id)
							->leftjoin('jobs', 'maintenance.job_id', '=', 'jobs.id')
							->get();*/
		echo json_encode(array('aaData'=>$result));
	}


	public function newAccessCard(Request $request)
	{
		$new_request['requested_by'] = $request->requested_by;
		$new_request['unit_no'] = $request->unit_no;
		$new_request['contact_no'] = $request->contact_no;
		$new_request['document_type'] = $request->document_type;
		$new_request['exception_type'] = $request->exception_type;
		$new_request['card_charge'] = $request->card_charge;

		$new_request['exception_card_no'] = $request->exception_card_no;
		$new_request['card_quantity'] = $request->card_quantity;
		
		$new_request['card_no'] = $request->card_no;		
		$new_request['amount_collected'] = $request->amount_collected;
		$new_request['requested_on'] = date("Y-m-d");

		$id = Access_Cards::insertGetId($new_request);
		$new_request['id'] = $id;

		echo json_encode($new_request);
	}

	public function issueAccessCard(Request $request)
	{
		$new_request['unit_no'] = $request->unit_no;
		$new_request['lease_expiring_on'] = $request->lease_expiring_on;
		$new_request['proximity_card_no'] = $request->proximity_card_no;
		$new_request['transponder_disc_no'] = $request->transponder_disc_no;		
		$new_request['add_proximity_card_no'] = $request->add_proximity_card_no;
		$new_request['add_card_receipt_no'] = $request->add_card_receipt_no;
		$new_request['add_transponder_disc_no'] = $request->add_transponder_disc_no;
		$new_request['add_disc_receipt_no'] = $request->add_disc_receipt_no;
		$new_request['payment'] = $request->payment;
		$new_request['proximity_cards_lost'] = $request->proximity_cards_lost;
		$new_request['proximity_lost_cards_no'] = $request->proximity_lost_cards_no;
		$new_request['transponder_discs_lost'] = $request->transponder_discs_lost;
		$new_request['transponder_lost_discs_no'] = $request->transponder_lost_discs_no;

		$id = Issue_Access_Cards::insertGetId($new_request);

		echo json_encode($id);
	}
	
/*
	public function viewMaintenance(Request $request)
	{
		$id = $request->id;
		$estate_id = $request->session()->get('visit_estate_id');
		$result = Maintenance::select(DB::raw('maintenance.*, jobs.id as jobs_id, jobs.job_name, jobs.description'))
							->where('maintenance.id', $id)
							->leftjoin('jobs', 'maintenance.job_id', '=', 'jobs.id')
							->first();
		$attaches = Maintenance_Attach::where('maintenance_id', $id)
										->get();
		return View::make('pages.service.maintenance_detail', array('user'=>Auth::user(), 'submenu'=>'maintenance', 'menu'=>'facility', 'estate_id'=>$estate_id, 'maintenance'=>$result, 'attaches'=>$attaches));
	}

	public function updateStatus(Request $request)
	{
		$id = $request->id;
		$maintenance['status'] = $request->status;
		$result = Maintenance::where('id', $id)
							->update($maintenance);
		echo json_encode($result);
	}

	public function getJobs(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$result = Jobs::where('estate_id', $estate_id)
							->get();
		echo json_encode(array('aaData'=>$result));
	}

	public function newJob(Request $request)
	{
		$new_request['job_name'] = $request->job_name;
		$new_request['description'] = $request->description;
		$new_request['estate_id'] = $request->session()->get('visit_estate_id');
		$id = Jobs::insertGetId($new_request);
		$new_request['id'] = $id;
		echo json_encode($new_request);
	}*/
}	