<?php
namespace App\Http\Controllers\Community;

use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\EstateRegulation;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EstateRegulationController extends Controller {

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

	public function showEstateRegulation(Request $request)
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

		return View::make('pages.community.estate_regulation', array('user'=>Auth::user(), 'submenu'=>'estate_regulation', 'menu'=>'community', 'estate_id'=>$estate_id, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}	

	public function getByLaws(Request $request)
	{
		$documents =  EstateRegulation::select(DB::raw('documents.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('type', 'ByLaws')
				->where('estate_id', $request->session()->get('visit_estate_id'))
				->join('users', 'documents.upload_by', '=', 'users.id')
               ->orderBy('created_at', 'desc')
               ->get();
        echo json_encode(array('aaData'=>$documents));
	}

	public function getHandBook(Request $request)
	{
		$documents =  EstateRegulation::select(DB::raw('documents.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('type', 'Handbook')
				->where('estate_id',$request->session()->get('visit_estate_id'))
				->join('users', 'documents.upload_by', '=', 'users.id')
               ->orderBy('created_at', 'desc')
               ->get();
        echo json_encode(array('aaData'=>$documents));
	}

	public function getAGM(Request $request)
	{
		$documents =  EstateRegulation::select(DB::raw('documents.*, users.id as user_id, users.given_name, users.family_name, users.role'))->where('type', 'AGM')
				->where('estate_id',$request->session()->get('visit_estate_id'))
				->join('users', 'documents.upload_by', '=', 'users.id')
               ->orderBy('created_at', 'desc')
               ->get();
        echo json_encode(array('aaData'=>$documents));
	}

	public function uploadDocument(Request $request)
	{
		$file = $request->file('file');
		$type = $request->type;
		$estate_id = $request->session()->get('visit_estate_id');
		$filename = $type.'_'.$estate_id.'_'.time();
		$ext = $file->getClientOriginalExtension();
		$file->move(public_path('uploads/documents/'.$type.'/'), $filename.'.'.$ext);

		$document['estate_id'] = $estate_id;
		$document['title'] = 'Estate Administration - '.$type;
		$document['file_name'] = $filename;
		$document['file_ext'] = $ext;
		$document['upload_by'] = $request->upload_by;
		$document['type'] = $type;
		EstateRegulation::insert($document);
		return redirect('community/estate_regulation');
	}

	public function downloadDocument(Request $request)
	{
		// $downloadfile = public_path('uploads/documents/'.$request->type.'/'.$request->estate_id.'/'.$request->file_name.'.'.$request->file_ext);
		$downloadfile = public_path('uploads/documents/'.$request->type.'/'.$request->file);
		//$filename = $request->type.'_'.$request->created_at.'.'.$request->file_ext;
		return response()->download($downloadfile, $request->type."_".$request->file);
	}
}	