<?php
namespace App\Http\Controllers\Operations;
use App\Model\User;
use App\Model\FinancialCode;
use App\Model\Financial;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class FinancialController extends Controller {

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

	public function showFinancial(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$financialcode = FinancialCode::where('estate_id', $estate_id)
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

		return View::make('pages.operations.financial', array('user'=>Auth::user(), 'submenu'=>'financial', 'menu'=>'operations', 'estate_id'=>$estate_id, 'financialcode'=>$financialcode, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function getFinancial(Request $request)
	{
		$financial = Financial::where('tb_code', $request->id)
								->get();
		echo json_encode(array('aaData'=>$financial, 'id'=>$request->id));
	}

	public function updateFinancial(Request $request)
	{
		$data = $request->data;
		if(isset($data['id'])){
			$result = Financial::where('id', $data['id'])
									->update($data);
			if($result) $result = $data['id'];
		}else{
			$result = Financial::insertGetId($data);
		}
		echo json_encode($result);
	}
}	