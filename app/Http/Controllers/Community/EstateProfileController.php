<?php
namespace App\Http\Controllers\Community;

use App\Model\Estates;
use App\Model\Fonts;
use App\Model\EstateImages;
use App\Model\Role_Setting;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EstateProfileController extends Controller {

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

	public function showEstateProfile(Request $request)
	{
		$estate =  Estates::where('id', $request->session()->get('visit_estate_id'))
									->first();
		$fonts = Fonts::all();
		$current_font = Fonts::where('id', $estate->font_id)
								->first();
		if($estate->sitemap==0){
			$sitemap = url('img\icon-no-image.png');
		}else{
			$temp = EstateImages::where('id', $estate->sitemap)
						->first();
			$sitemap = url('uploads/images/'.$temp->image_type.'/'.$temp->image_name.'.'.$temp->image_ext);
		}
		if($estate->logo==0){
			$logo = url('img\icon-no-image.png');
		}else{
			$temp = EstateImages::where('id', $estate->logo)
						->first();
			$logo = url('uploads/images/'.$temp->image_type.'/'.$temp->image_name.'.'.$temp->image_ext);
		}
		if($estate->banner==0){
			$banner = url('img\icon-no-banner.png');
		}else{
			$temp = EstateImages::where('id', $estate->banner)
						->first();
			$banner = url('uploads/images/'.$temp->image_type.'/'.$temp->image_name.'.'.$temp->image_ext);
		}

		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}

		return View::make('pages.community.estate_profile', array('user'=>Auth::user(), 'submenu'=>'estate_profile', 'menu'=>'community', 'estate'=>$estate, 'fonts'=>$fonts, 'sitemap'=>$sitemap, 'logo'=>$logo, 'banner'=>$banner, 'current_font'=>$current_font, 'rolesetting'=>$RoleSetting));
	}

	public function updateEstateProfile(Request $request)
	{
		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}
		if ($RoleSetting->estate_manager ==1 || $RoleSetting->estate_officer == 1 || $RoleSetting->estate_developer == 1) {
			$estate = array();
			$estate[$request->name] = $request->value;
			$result['success'] = Estates::where('id', $request->pk)
						->update($estate);
			echo json_encode($result);
		} else {
			abort(403);
		}
	}

	public function uploadEstateFloorPlan(Request $request)
	{
		$floorplan = $request->file('file');
		$filename = 'floorplan_'.$request->id.'.'.$floorplan->getClientOriginalExtension();
		$floorplan->move(public_path('uploads/floorplan/'), $filename);
		$estate['floor_plan'] = $filename;
		Estates::where('id', $request->id)
					->update($estate);
		return redirect('community/estate_profile');
	}
	
	public function uploadEstateImage(Request $request)
	{
		$image = $request->file('file');
		$image_name = $request->type."_".$request->id.'_'.time();
		$image_ext = $image->getClientOriginalExtension();
		$image_type = $request->type;
		$filename = $image_name.'.'.$image_ext;
		$image->move(public_path('uploads/images/'.$image_type.'/'), $filename);
		$mapInfo['image_name'] = $image_name;
		$mapInfo['image_ext'] = $image_ext;
		$mapInfo['image_type'] = $image_type;
		$mapInfo['original_name'] = $image->getClientOriginalName();
		$image_id = EstateImages::insertGetId($mapInfo);
		$estate[$image_type] = $image_id;
		Estates::where('id', $request->id)
					->update($estate);
		return redirect('community/estate_profile');
	}

	public function updateEstateFont(Request $request)
	{
		$estate['font_id'] = $request->font_id;
		Estates::where('id', $request->session()->get('visit_estate_id'))
					->update($estate);
		return redirect('community/estate_profile');
	}
}	