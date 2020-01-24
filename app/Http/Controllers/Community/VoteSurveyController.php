<?php
namespace App\Http\Controllers\Community;

use App\Model\User;
use App\Model\Survey;
use App\Model\Survey_Answers;
use App\Model\Polls;
use App\Model\Poll_Options;
use App\Model\Poll_Answers;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class VoteSurveyController extends Controller {

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
	
	public function showVoteSurvey(Request $request)
	{
		$estate_id = $request->session()->get('visit_estate_id');
		$survey = Survey::where('estate_id',$estate_id)
							->get();
		$survey_answers = Survey_Answers::where('user_id', Auth::user()->id)
											->get();
		$polls = Polls::where('estate_id',$estate_id)
							->get();
		foreach ($polls as $key => $value) {
			# code...
			$polls[$key]->options = Poll_Options::where('poll_id',$value->id)
											->get();
		}
		$poll_answers = Poll_Answers::select(DB::raw('poll_answers.*, poll_options.id as option_id, poll_options.option'))
									->leftjoin('poll_options', 'poll_answers.answer', '=', 'poll_options.option_value')
									->whereRaw(DB::raw('poll_answers.poll_id = poll_options.poll_id'))
									->where('user_id', Auth::user()->id)
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

		return View::make('pages.community.vote_survey', array('user'=>Auth::user(), 'submenu'=>'vote_survey', 'menu'=>'community', 'estate_id'=>$estate_id, 'survey'=>$survey, 'survey_answers'=>$survey_answers, 'polls'=>$polls, 'poll_answers'=>$poll_answers, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function addSurveyQuestion(Request $request)
	{
		$survey['estate_id'] = $request->session()->get('visit_estate_id');
		$survey['question'] = $request->question;
		$id = Survey::insertGetId($survey);

		echo json_encode(array('id'=>$id));
	}	

	public function addSurveyAnswer(Request $request)
	{
		$answer['user_id'] = Auth::user()->id;
		$answer['survey_id'] = $request->survey_id;
		$answer['answer'] = $request->answer;

		$id = Survey_Answers::insertGetId($answer);

		echo json_encode(array('id'=>$id));
	}

	public function addPollQuestion(Request $request)
	{
		$options = $request->options;
		$poll['estate_id'] = $request->session()->get('visit_estate_id');
		$poll['question'] = $request->question;

		$id = Polls::insertGetId($poll);
		foreach ($options as $key => $value) {
			# code...
			$options[$key]['poll_id'] = $id;
		}
		Poll_Options::insert($options);

		echo json_encode(array('id'=>$id));
	}

	public function addPollAnswer(Request $request)
	{
		$answer['user_id'] = Auth::user()->id;
		$answer['poll_id'] = $request->poll_id;
		$answer['answer'] = $request->answer;

		$id = Poll_Answers::insertGetId($answer);

		echo json_encode(array('id'=>$id));
	}
}	