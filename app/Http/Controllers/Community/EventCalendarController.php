<?php
namespace App\Http\Controllers\Community;

use App\Model\User;
use App\Model\EstateEvents;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EventCalendarController extends Controller {

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
	
	public function showEventCalendar(Request $request)
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
		
		return View::make('pages.community.event_calendar', array('user'=>Auth::user(), 'submenu'=>'event_calendar', 'menu'=>'community', 'estate_id'=>$estate_id,  'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}	

	public function addEvent(Request $request)
	{
		$event['title'] = $request->title;
		$event['event_type'] = $request->event_type;
		$event['description'] = $request->description;
		$event['start'] = $request->start;
		$event['end'] = $request->end;
		$event['contact_person'] = $request->contact_person;
		$event['contact_number'] = $request->contact_number;
		$event['contact_email'] = $request->contact_email;
		$event['estate_id'] = $request->session()->get('visit_estate_id');
		$event['allDay'] = $request->allDay;

		$result['insert_id'] = EstateEvents::insertGetId($event);
		echo json_encode($result);
	}

	public function updateEvent(Request $request)
	{
		$id = $request->id;
		$event['title'] = $request->title;
		$event['event_type'] = $request->event_type;
		$event['description'] = $request->description;
		$event['start'] = $request->start;
		$event['end'] = $request->end;
		$event['contact_person'] = $request->contact_person;
		$event['contact_number'] = $request->contact_number;
		$event['contact_email'] = $request->contact_email;
		$event['allDay'] = $request->allDay;

		$result = EstateEvents::where('id', $id)
								->update($event);
		echo json_encode($result);
	}

	public function removeEvent(Request $request)
	{
		$id = $request->id;
		$result = EstateEvents::where('id', $id)
								->delete();
		echo json_encode($result);
	}

	public function getEvents(Request $request)
	{
		$result = EstateEvents::where('estate_id',$request->session()->get('visit_estate_id'))
				->get();
		echo json_encode($result);
	}

}	