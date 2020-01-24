<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('email', array('uses' => 'Community\AnnouncementController@sendEmail'));
Route::get('/', array('uses' => 'Auth\LoginController@showLoginForm'));
Route::get('login', array('uses' => 'Auth\LoginController@showLoginForm'));
Route::get('register', array('uses' => 'Auth\RegisterController@showRegistrationForm'));
Route::get('password/email', array('uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'));
Route::get('password/reset/{token}', array('uses' => 'Auth\ResetPasswordController@showResetForm'));
Route::get('home', array('middleware'=>'auth', 'uses'=>'HomeController@showDashboard'));
Route::get('user_profile', array('middleware'=>'auth', 'uses'=>'HomeController@showUserProfile'));
//community
Route::get('community/announcement', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@showAnnouncement'));
Route::get('community/estate_profile', array('middleware'=>'auth', 'uses'=>'Community\EstateProfileController@showEstateProfile'));
Route::get('community/estate_regulation', array('middleware'=>'auth', 'uses'=>'Community\EstateRegulationController@showEstateRegulation'));
Route::get('community/event_calendar', array('middleware'=>'auth', 'uses'=>'Community\EventCalendarController@showEventCalendar'));
Route::get('community/vote_survey', array('middleware'=>'auth', 'uses'=>'Community\VoteSurveyController@showVoteSurvey'));
Route::get('community/council_committee', array('middleware'=>'auth', 'uses'=>'Community\CouncilCommitteeController@showCouncilCommittee'));
//estate service
Route::get('service/moving', array('middleware'=>'auth', 'uses'=>'Service\MovingController@showMoving'));
Route::get('service/maintenance', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@showMaintenance'));

//operations
Route::get('operations/financial', array('middleware'=>'auth', 'uses'=>'Operations\FinancialController@showFinancial'));
Route::post('operations/financial/get_financial', array('middleware'=>'auth', 'uses'=>'Operations\FinancialController@getFinancial'));

//estate security
Route::get('security/accesscard', array('middleware'=>'auth', 'uses'=>'Security\AccessCardManagementController@showAccessCardManagement'));

//estate facility
Route::get('facility/library', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@showFacilityLibrary'));
Route::get('facility/library_add', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@showFacilityLibraryAdd'));
Route::get('facility/management', array('middleware'=>'auth', 'uses'=>'Facility\FacilityManagementController@showFacilityManagement'));
//home
Route::get('home/warranty', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@showWarranty'));
Route::get('home/warranty_registration', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@showRegistration'));
//energy
Route::get('home/energy', array('middleware'=>'auth', 'uses'=>'Home\EnergyController@showEnergy'));
//Route::get('home/warranty_registration', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@showRegistration'));

//Logout
Route::get('logout', array('uses'=>'Auth\LoginController@logout'));
//community announcement


Route::group(['middleware' => ['web']], function () {
    Route::post('login', array('uses' => 'Auth\LoginController@login'));
    Route::post('register', array('uses' => 'Auth\RegisterController@register'));
    Route::post('password/email', array('uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'));
    Route::post('password/reset', array('uses' => 'Auth\ResetPasswordController@reset'));
    Route::post('user_profile/update_image', array('middleware'=>'auth', 'uses'=>'HomeController@updateImage'));
    Route::post('user_profile/change_password', array('middleware'=>'auth', 'uses'=>'HomeController@changePassword'));
    Route::post('user_profile/update_profile', array('middleware'=>'auth', 'uses'=>'HomeController@updateProfile'));
    Route::post('user_profile/update_contact', array('middleware'=>'auth', 'uses'=>'HomeController@updateContact'));
    Route::post('user_profile/update_emergency', array('middleware'=>'auth', 'uses'=>'HomeController@updateEmergency'));
    Route::post('user_profile/update_role_settings', array('middleware'=>'auth', 'uses'=>'HomeController@updateRoleSettings'));

    //community announcement API
    Route::post('community/announcement/get_announcements_today_residents', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_today_residents'));
	Route::post('community/announcement/get_announcements_week_residents', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_week_residents'));
	Route::post('community/announcement/get_announcements_month_residents', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_month_residents'));
	Route::post('community/announcement/get_announcements_all_residents', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_all_residents'));
	Route::post('community/announcement/get_announcements_today_managers', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_today_managers'));
	Route::post('community/announcement/get_announcements_week_managers', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_week_managers'));
	Route::post('community/announcement/get_announcements_month_managers', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_month_managers'));
	Route::post('community/announcement/get_announcements_all_managers', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@getAnnouncements_all_managers'));
	Route::post('community/announcement/set_announcement', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@setAnnouncement'));
	Route::post('community/announcement/edit_announcement', array('middleware'=>'auth', 'uses'=>'Community\AnnouncementController@editAnnouncement'));
	//community estateprofile API
	Route::post('community/estate_profile/update_estate_profile', array('middleware'=>'auth', 'uses'=>'Community\EstateProfileController@updateEstateProfile'));
	Route::post('community/estate_profile/upload_estate_image', array('middleware'=>'auth', 'uses'=>'Community\EstateProfileController@uploadEstateImage'));
	Route::post('community/estate_profile/update_estate_font', array('middleware'=>'auth', 'uses'=>'Community\EstateProfileController@updateEstateFont'));
	Route::post('community/estate_profile/upload_estate_floorplan', array('middleware'=>'auth', 'uses'=>'Community\EstateProfileController@uploadEstateFloorPlan'));
	//community estate regulation API
	Route::get('community/estate_regulation/get_bylaws', array('middleware'=>'auth', 'uses'=>'Community\EstateRegulationController@getByLaws'));
	Route::get('community/estate_regulation/get_byhandbook', array('middleware'=>'auth', 'uses'=>'Community\EstateRegulationController@getHandBook'));
	Route::get('community/estate_regulation/get_byagm', array('middleware'=>'auth', 'uses'=>'Community\EstateRegulationController@getAGM'));
	Route::post('community/estate_regulation/upload_document', array('middleware'=>'auth', 'uses'=>'Community\EstateRegulationController@uploadDocument'));
	Route::get('/download/{type}/{file}', array('middleware'=>'auth', 'uses'=>'Community\EstateRegulationController@downloadDocument'));

	//community event calendar API
	Route::post('community/event_calendar/add_event', array('middleware'=>'auth', 'uses'=>'Community\EventCalendarController@addEvent'));
	Route::post('community/event_calendar/get_events', array('middleware'=>'auth', 'uses'=>'Community\EventCalendarController@getEvents'));
	Route::post('community/event_calendar/update_event', array('middleware'=>'auth', 'uses'=>'Community\EventCalendarController@updateEvent'));
	Route::post('community/event_calendar/remove_event', array('middleware'=>'auth', 'uses'=>'Community\EventCalendarController@removeEvent'));

	//community Survey & Vote API
	Route::post('community/vote_survey/add_survey_question', array('middleware'=>'auth', 'uses'=>'Community\VoteSurveyController@addSurveyQuestion'));
	Route::post('community/vote_survey/add_survey_answer', array('middleware'=>'auth', 'uses'=>'Community\VoteSurveyController@addSurveyAnswer'));
	Route::post('community/vote_survey/add_poll_question', array('middleware'=>'auth', 'uses'=>'Community\VoteSurveyController@addPollQuestion'));
	Route::post('community/vote_survey/add_poll_answer', array('middleware'=>'auth', 'uses'=>'Community\VoteSurveyController@addPollAnswer'));

	//estate service moving API
	Route::get('service/moving/get_requests', array('middleware'=>'auth', 'uses'=>'Service\MovingController@getRequests'));
	Route::post('service/moving/new_request', array('middleware'=>'auth', 'uses'=>'Service\MovingController@newRequest'));
	Route::post('service/moving/update_status', array('middleware'=>'auth', 'uses'=>'Service\MovingController@updateStatus'));

	//estate service maintenance API	
	Route::get('service/maintenance/get_jobs', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@getJobs'));
	Route::get('service/maintenance/get_maintenance', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@getMaintenance'));
	Route::post('service/maintenance/new_job', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@newJob'));
	Route::post('service/maintenance/new_maintenance', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@newMaintenance'));
	Route::post('service/maintenance/update_status', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@updateStatus'));
	Route::get('service/maintenance/view_maintenance/{id}', array('middleware'=>'auth', 'uses'=>'Service\MaintenanceController@viewMaintenance'));

	//estate security api
	Route::get('security/accesscardmanagement/getAccessCard', array('middleware'=>'auth', 'uses'=>'Security\AccessCardManagementController@getAccessCard'));
	Route::post('security/accesscardmanagement/new_accesscard', array('middleware'=>'auth', 'uses'=>'Security\AccessCardManagementController@newAccessCard'));
	Route::post('security/accesscardmanagement/issue_accesscard', array('middleware'=>'auth', 'uses'=>'Security\AccessCardManagementController@issueAccessCard'));


	//estate facility libray API
	Route::post('facility/library/library_add', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@addFacilityLibrary'));
	Route::post('facility/library/library_book', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@BookFacility'));
	Route::post('facility/library/library_edit', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@updateFacilityLibrary'));
	Route::get('facility/library/library_view/{id}', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@viewLibrary'));
	Route::get('facility/library/library_edit/{id}', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@EditLibrary'));
	Route::get('facility/library/library_book/{id}', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@BookLibrary'));
	Route::post('facility/library/get_available', array('middleware'=>'auth', 'uses'=>'Facility\FacilityLibraryController@getAvailable'));

	//estate facility management API
	Route::get('facility/management/get_book', array('middleware'=>'auth', 'uses'=>'Facility\FacilityManagementController@getBook'));	
	Route::post('facility/management/update_status', array('middleware'=>'auth', 'uses'=>'Facility\FacilityManagementController@updateStatus'));

	//estate service financial management API
	Route::post('operations/financial/update_financial', array('middleware'=>'auth', 'uses'=>'Operations\FinancialController@updateFinancial'));
	Route::post('operations/financial/delete_financial', array('middleware'=>'auth', 'uses'=>'Operations\FinancialController@deleteFinancial'));

	//warranty API
	Route::post('home/warranty/regist_warranty', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@registWarranty'));
	Route::get('home/warranty/get_warranty', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@getWarranty'));
	Route::get('home/warranty/edit_warranty/{id}', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@showEditWarranty'));
	Route::post('home/warranty/update_warranty', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@updateWarranty'));
	Route::post('home/warranty/remove_warranty', array('middleware'=>'auth', 'uses'=>'Home\WarrantyController@removeWarranty'));

	Route::get('home/energy/visualization', array('middleware'=>'auth', 'uses'=>'Home\EnergyController@showVisualization'));
	Route::post('home/energy/add_node', array('middleware'=>'auth', 'uses'=>'Home\EnergyController@add_node'));
	Route::get('home/energy/config', array('middleware'=>'auth', 'uses'=>'Home\EnergyController@showConfig'));

});






//Route::get('/home', 'HomeController@index');
