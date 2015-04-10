<?php

/**
 * Description of AdminAccountController
 *
 * @author 1084760
 */
class SchoolSettingsController extends BaseController {

    protected $user;
    protected $schoolId;

    public function __construct() {

        $this->user = Auth::user();

        $this->schoolId = $this->user->school_id;
    }

    protected function getUser() {
        return $this->user;
    }

    protected function getSchoolId() {
        return $this->schoolId;
    }

    public function getSchoolSettings() {
        $schedule = SchoolSchedule::where('schoo')->get();
        return View::make('admin.school-settings');
    }

    public function postScheduleStartFrom() {
        
        $schedule = SchoolSchedule::find(Input::get('pk'));
        $schedule->start_from = Input::get('value');
        $schedule->save();

        $response = array(
            'status' => 'OK',
            'msg' => 'Setting created successfully',
            'errors' => null,
            'result' => array(
                'schedule' => $schedule,
            )
        );

        return Response::json($response);
    }
    
    
}
