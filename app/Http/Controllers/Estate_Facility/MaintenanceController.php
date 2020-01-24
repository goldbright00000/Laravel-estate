<?php
namespace App\Http\Controllers\Estate_Facility;
use App\Model\User;
use App\Model\Jobs;
use App\Model\Moving;
use App\Model\Maintenance;
use App\Model\Maintenance_Attach;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MaintenanceController extends Controller {

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

	public function showMaintenance(Request $request)
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

		return View::make('pages.facility.maintenance', array('user'=>Auth::user(), 'submenu'=>'maintenance', 'menu'=>'facility', 'estate_id'=>$estate_id,'jobs'=>$jobs, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
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

	public function getMaintenance(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$result = Maintenance::select(DB::raw('maintenance.*, jobs.id as jobs_id, jobs.job_name, jobs.description'))
							->where('maintenance.estate_id', $estate_id)
							->leftjoin('jobs', 'maintenance.job_id', '=', 'jobs.id')
							->get();
		echo json_encode(array('aaData'=>$result));
	}

	public function newMaintenance(Request $request)
	{
		$file1 = $request->file('file1');
		$file2 = $request->file('file2');
		$file3 = $request->file('file3');
		$new_request['building'] = $request->building;
		$new_request['level'] = $request->level;
		$new_request['unit'] = $request->unit;
		$new_request['subject'] = $request->subject;
		$new_request['details'] = $request->details;
		$new_request['job_id'] = $request->job_type;
		$new_request['priority'] = $request->priority;
		$new_request['estate_id'] = $request->session()->get('visit_estate_id');
		$new_request['status'] = 0;
		$id = Maintenance::insertGetId($new_request);
		if($file1){
			$this->uploadAttach($file1, $id, 'first', 'image');
		}
		if($file2){
			$this->uploadAttach($file2, $id, 'second', 'image');
		}
		if($file3){
			$this->uploadAttach($file3, $id, 'third', 'image');
		}
		echo json_encode($id);
	}

	public function uploadAttach($file, $id, $seq, $filetype)
	{
		$file_name = $seq."_".$id.'_'.time();
		$file_ext = $file->getClientOriginalExtension();
		$filename = $file_name.'.'.$file_ext;
		$file->move(public_path('uploads/attach/'.$filetype.'/'), $filename);
		$fileInfo['file_name'] = $file_name;
		$fileInfo['file_ext'] = $file_ext;
		$fileInfo['file_type'] = $filetype;
		$fileInfo['maintenance_id'] = $id;
		Maintenance_Attach::insert($fileInfo);
		return;
	}

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

		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.facility.maintenance_detail', array('user'=>Auth::user(), 'submenu'=>'maintenance', 'menu'=>'facility', 'estate_id'=>$estate_id, 'maintenance'=>$result, 'attaches'=>$attaches, 'estate'=>$estate));
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
	}
}	