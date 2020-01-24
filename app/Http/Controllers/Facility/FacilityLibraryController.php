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

class FacilityLibraryController extends Controller {

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

	public function showFacilityLibrary(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$facility_types = Facility_Type::where('estate_id', $estate_id)
										->get();
		$facilities = Facility::select(DB::raw('facilities.*, facility_images.id as image_id, facility_images.image_name, facility_images.image_ext'))
								->leftjoin('facility_images','facilities.id','=','facility_images.facility_id')
								->where('estate_id', $estate_id)
								->orderBy('facility_type', 'asc')
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

		return View::make('pages.facility.library', array('user'=>Auth::user(), 'submenu'=>'library', 'menu'=>'facility', 'estate_id'=>$estate_id, 'facility_types'=>$facility_types, 'facilities'=>$facilities, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}	

	public function showFacilityLibraryAdd(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$facility_types = Facility_Type::where('estate_id', $estate_id)
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

		return View::make('pages.facility.library_add', array('user'=>Auth::user(), 'submenu'=>'library', 'menu'=>'facility', 'estate_id'=>$estate_id, 'facility_types'=>$facility_types, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function addFacilityLibrary(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$image = $request->file('file');
		$facility['facility_type'] = $request->facility_type;
		$facility['facility_name'] = $request->facility_name;
		$facility['facility_location'] = $request->facility_location;
		$time1 = new \DateTime($request->start);
		$start = $time1->format('H:i');
		$facility['start'] = $start;
		$time2 = new \DateTime($request->end);
		$end = $time2->format('H:i');
		$facility['end'] = $end;
		$facility['facility_charge'] = $request->facility_charge;
		$facility['service_charge'] = $request->administrative_charge;
		$facility['deposit'] = $request->deposit;
		$facility['description'] = $request->description;
		$facility['rules'] = $request->regulation;
		$facility['equipment'] = $request->equipment;
		$facility['estate_id'] = $estate_id;
		$facility['based'] = ($request->based==0)?0:$request->session_value;
		$facility['reservation'] = ($request->reservation?1:0);
		$facility['status'] = $request->status;
		$facility_id = Facility::insertGetId($facility);
		if($image){
			$image_name = 'facility'.$request->facility_type."_".$facility_id.'_'.time();
			$image_ext = $image->getClientOriginalExtension();
			$filename = $image_name.'.'.$image_ext;
			$image->move(public_path('uploads/images/facility/'), $filename);
			$img['image_name'] = $image_name;
			$img['image_ext'] = $image_ext;
			$img['facility_id'] = $facility_id;
			FacilityImages::insert($img);
		}
		for($i=0; $i<7; $i++){
			$hours['facility_id'] = $facility_id;
			$hours['weekday'] = $i;
			$time1 = new \DateTime($request['start_'.$i]);
			$start = $time1->format('H:i');
			$time2 = new \DateTime($request['end_'.$i]);
			$end = $time2->format('H:i');
			$hours['start'] = $start;
			$hours['end'] = $end;
			Facility_Hours::insert($hours);
		}
		return redirect('facility/library');
	}

	public function updateFacilityLibrary(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$image = $request->file('file');
		$facility['facility_type'] = $request->facility_type;
		$facility['facility_name'] = $request->facility_name;
		$facility['facility_location'] = $request->facility_location;
		$time1 = new \DateTime($request->start);
		$start = $time1->format('H:i');
		$facility['start'] = $start;
		$time2 = new \DateTime($request->end);
		$end = $time2->format('H:i');
		$facility['end'] = $end;
		$facility['facility_charge'] = $request->facility_charge;
		$facility['service_charge'] = $request->administrative_charge;
		$facility['deposit'] = $request->deposit;
		$facility['description'] = $request->description;
		$facility['rules'] = $request->regulation;
		$facility['equipment'] = $request->equipment;
		$facility['estate_id'] = $estate_id;
		$facility['based'] = ($request->based==0)?0:$request->session_value;
		$facility['reservation'] = ($request->reservation?1:0);
		$facility['status'] = $request->status;
		$facility_id = $request->id;
		Facility::where('id', $facility_id)
				->update($facility);
		if($image){
			$image_name = 'facility'.$request->facility_type."_".$facility_id.'_'.time();
			$image_ext = $image->getClientOriginalExtension();
			$filename = $image_name.'.'.$image_ext;
			$image->move(public_path('uploads/images/facility/'), $filename);
			$img['image_name'] = $image_name;
			$img['image_ext'] = $image_ext;
			$img['facility_id'] = $facility_id;
			$update = FacilityImages::where('facility_id', $facility_id)
						->update($img);
			if(!$update){
				$img['facility_id'] = $facility_id;
				FacilityImages::insert($img);
			}
		}
		for($i=0; $i<7; $i++){
			$hours['facility_id'] = $facility_id;
			$hours['weekday'] = $i;
			$time1 = new \DateTime($request['start_'.$i]);
			$start = $time1->format('H:i');
			$time2 = new \DateTime($request['end_'.$i]);
			$end = $time2->format('H:i');
			$hours['start'] = $start;
			$hours['end'] = $end;
			Facility_Hours::where('facility_id', $facility_id)
						->where('weekday', $i)
						->update($hours);
		}
		return redirect('facility/library');
	}

	public function viewLibrary(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$facility = Facility::select(DB::raw('facilities.*, facility_images.id as image_id, facility_images.image_name, facility_images.image_ext, facility_types.id as facility_type_id, facility_types.type_name'))
								->leftjoin('facility_images','facilities.id','=','facility_images.facility_id')
								->leftjoin('facility_types', 'facilities.facility_type', '=', 'facility_types.id')
								->where('facilities.id', $request->id)
								->first();
		$facility_hours = Facility_Hours::where('facility_id', $request->id)
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

		return View::make('pages.facility.library_view', array('user'=>Auth::user(), 'submenu'=>'library', 'menu'=>'facility', 'estate_id'=>$estate_id, 'facility'=>$facility, 'facility_hours'=>$facility_hours, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function EditLibrary(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$facility_types = Facility_Type::where('estate_id', $estate_id)
										->get();
		$facility = Facility::select(DB::raw('facilities.*, facility_images.id as image_id, facility_images.image_name, facility_images.image_ext, facility_types.id as facility_type_id, facility_types.type_name'))
								->leftjoin('facility_images','facilities.id','=','facility_images.facility_id')
								->leftjoin('facility_types', 'facilities.facility_type', '=', 'facility_types.id')
								->where('facilities.id', $request->id)
								->first();
		$facility_hours = Facility_Hours::where('facility_id', $request->id)
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

		return View::make('pages.facility.library_edit', array('user'=>Auth::user(), 'submenu'=>'library', 'menu'=>'facility', 'estate_id'=>$estate_id, 'facility'=>$facility, 'facility_hours'=>$facility_hours, 'facility_types'=>$facility_types, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function BookLibrary(Request $request)
	{
		//$date = new \DateTime($request->bookdate);
		$estate_id = $request->session()->get('visit_estate_id');
		$facility_types = Facility_Type::where('estate_id', $estate_id)
										->get();
		$facility = Facility::select(DB::raw('facilities.*, facility_images.id as image_id, facility_images.image_name, facility_images.image_ext, facility_types.id as facility_type_id, facility_types.type_name'))
								->leftjoin('facility_images','facilities.id','=','facility_images.facility_id')
								->leftjoin('facility_types', 'facilities.facility_type', '=', 'facility_types.id')
								->where('facilities.id', $request->id)
								->first();
		$facility_hours = Facility_Hours::where('facility_id', $request->id)
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

		return View::make('pages.facility.library_book', array('user'=>Auth::user(), 'submenu'=>'library', 'menu'=>'facility', 'estate_id'=>$estate_id, 'facility'=>$facility, 'facility_hours'=>$facility_hours, 'facility_types'=>$facility_types, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function getAvailable(Request $request)
	{
		$date = new \DateTime($request->bookdate);
		$bookdate = $date->format('Y-m-d');
		$facility_hour = Facility_Hours::where('facility_id', $request->facility_id)
										->where('weekday', $request->weekday)
										->first();
		$facility_book = Facility_Book::where('facility_id', $request->facility_id)
										->where('bookdate', $bookdate)
										->orderBy('start','asc')
										->get();
		$facility = Facility::where('id', $request->facility_id)
							->first();
		$available = array();
		if($facility->based==0){
			array_push($available, array('start'=>$facility_hour->start));
			$add_key = 0;
			foreach($facility_book as $key => $value){
				$available[$key]['end'] = $value->start;
				array_push($available, array('start'=>$value->end));
				$add_key = $key+1;
			}
			$available[$add_key]['end'] = $facility_hour->end;
		}		
		else{
			array_push($available, array('start'=>$facility_hour->start));
			$add_key = 0;
			$time = new \DateTime($facility_hour->start);
			$time2 = new \DateTime($facility_hour->end);
			foreach ($facility_book as $key => $value) {
				# code...
				$time3 = new \DateTime($value['start']);
				$time4 = new \DateTime($value['end']);
				$time->add(new \DateInterval('PT'.$facility->based.'H'));
				while($time<$time3){
					$available[$add_key]['end'] = $time->format('H:i:s');
					$add_key+=1;
					$available[$add_key]['start'] = $time->format('H:i:s');
					$time->add(new \DateInterval('PT'.$facility->based.'H'));
				}
				$available[$add_key]['end'] = $time3->format('H:i:s');
				$time = $time4;
				if($time4<$time2){
					$add_key+=1;
					$available[$add_key]['start'] = $time->format('H:i:s');
				}
			}
			if($time<$time2){
				$time->add(new \DateInterval('PT'.$facility->based.'H'));
				while($time<$time2){				
					$available[$add_key]['end'] = $time->format('H:i:s');
					$add_key+=1;
					$available[$add_key]['start'] = $time->format('H:i:s');
					$time->add(new \DateInterval('PT'.$facility->based.'H'));
				}
				$available[$add_key]['end'] = $time2->format('H:i:s');
			}		
			
		}
		$result = array(
				'based' =>$facility->based,
				'available' => $available
			);
		echo json_encode($result);
	}

	public function BookFacility(Request $request)
	{
		$book['facility_id'] = $request->facility_id;
		$date = new \DateTime($request->bookdate);
		$bookdate = $date->format('Y-m-d');
		$book['bookdate'] = $bookdate;
		$book['book_by'] = Auth::user()->id;
		$create = new \DateTime();
		$book['created_at'] = $create->format('Y-m-d H:i:s');

		$facility_hour = Facility_Hours::where('facility_id', $request->facility_id)
										->where('weekday', $request->weekday)
										->first();
		$facility_book = Facility_Book::where('facility_id', $request->facility_id)
										->where('bookdate', $bookdate)
										->orderBy('start','asc')
										->get();
		$facility = Facility::where('id', $request->facility_id)
							->first();
		if($facility->based==0){
			$available = array();
			array_push($available, array('start'=>$facility_hour->start));
			$add_key = 0;
			foreach($facility_book as $key => $value){
				$available[$key]['end'] = $value->start;
				array_push($available, array('start'=>$value->end));
				$add_key = $key+1;
			}
			$available[$add_key]['end'] = $facility_hour->end;

			$time1 = new \DateTime($request->start);
			$start = $time1->format('H:i:s');
			$facility['start'] = $start;
			$time2 = new \DateTime($request->end);
			$end = $time2->format('H:i:s');
			$book['start'] = $start;
			$book['end'] = $end;
			foreach ($available as $key => $value) {
				# code...
				$time3 = new \DateTime($value['start']);
				$time4 = new \DateTime($value['end']);
				if($time1>=$time3&&$time2<=$time4){
					Facility_Book::insert($book);
					return redirect()->back()->withErrors([
	                'success' => 'book success',
	            ]);
				}
			}
			return redirect()->back()->withErrors([
	                'error' => 'please select time again',
	            ]);
		}else{
			$time1 = new \DateTime($request->start);
			$start = $time1->format('H:i:s');
			$facility['start'] = $start;
			$time2 = new \DateTime($request->end);
			$end = $time2->format('H:i:s');
			$book['start'] = $start;
			$book['end'] = $end;
			Facility_Book::insert($book);
				return redirect()->back()->withErrors([
                'success' => 'book success',
            ]);
		}
	}

}	