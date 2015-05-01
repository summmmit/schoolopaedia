<?php

/**
 * Description of AdminAccountController
 *
 * @author 1084760
 */
class SchoolSettingsController extends BaseController {

    protected $user;
    protected $schoolId;
    protected $schoolSessionId;

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

    protected function getSchoolSessionId() {
        
        $session = SchoolSession::where('school_id', '=', $this->getschoolId())->orderBy('session_start', 'desc')->get()->first();
        
        return $this->schoolSessionId = $session->id;
    }
    
    public function postSetSchoolSessions() {
        $start_session_from = Input::get('start_session_from');
        $end_session_untill = Input::get('end_session_untill');

        $school_session = new SchoolSession();
        $school_session->session_start = $start_session_from;
        $school_session->session_end = $end_session_untill;
        $school_session->school_id = $this->getSchoolId();

        $school_session->save();

        return Redirect::route('admin-school-set-sessions');
    }

    public function getSchoolSessions() {
        $session = SchoolSession::where('school_id', '=', $this->getschoolId())->get();
    }

    //for the school schedules

    public function postSetSchoolSchedule() {

        $schedule_starts_from = Input::get('schedule_starts_from');
        $schedule_ends_untill = Input::get('schedule_ends_untill');
        $school_opening_time = Input::get('school_opening_time');
        $school_lunch_time = Input::get('school_lunch_time');
        $school_closing_time = Input::get('school_closing_time');

        $school_schedule = new SchoolSchedule();
        $school_schedule->start_from = $schedule_starts_from;
        $school_schedule->close_untill = $schedule_ends_untill;
        $school_schedule->opening_time = $school_opening_time;
        $school_schedule->lunch_time = $school_lunch_time;
        $school_schedule->closing_time = $school_closing_time;
        $school_schedule->school_id = $this->getSchoolId();
        $school_schedule->school_session_id = $this->getSchoolSessionId();

        if ($school_schedule->save()) {

            $response = array(
                'status' => 'OK',
                'msg' => 'Updated created successfully',
                'errors' => null,
                'result' => array(
                    'schedule' => $school_schedule,
                )
            );

            return Response::json($response);
        } else {

            $response = array(
                'status' => 'Error',
                'msg' => 'Not Updated',
                'errors' => null,
                'result' => array(
                    'schedule' => 'none',
                )
            );

            return Response::json($response);
        }
    }

    public function getSchoolSettings() {
        $schedule = SchoolSchedule::where('school_id', '=', $this->getschoolId())->where('school_session_id', '=', $this->getSchoolSessionId())->get();
        $session = SchoolSession::find($this->getSchoolSessionId());
        
        return View::make('admin.school-settings')->with('schedules', $schedule)->with('session', $session);
    }

    public function postScheduleStartFrom() {

        $schedule = SchoolSchedule::find(Input::get('pk'));
        $schedule->opening_time = Input::get('value');

        if ($schedule->save()) {

            $response = array(
                'status' => 'OK',
                'msg' => 'Updated created successfully',
                'errors' => null,
                'result' => array(
                    'schedule' => $schedule,
                )
            );

            return Response::json($response);
        } else {

            $response = array(
                'status' => 'Error',
                'msg' => 'Not Updated',
                'errors' => null,
                'result' => array(
                    'schedule' => 'none',
                )
            );

            return Response::json($response);
        }
    }

    public function postScheduleLunchFrom() {

        $schedule = SchoolSchedule::find(Input::get('pk'));
        $schedule->lunch_time = Input::get('value');

        if ($schedule->save()) {

            $response = array(
                'status' => 'OK',
                'msg' => 'Updated created successfully',
                'errors' => null,
                'result' => array(
                    'schedule' => $schedule,
                )
            );

            return Response::json($response);
        } else {

            $response = array(
                'status' => 'Error',
                'msg' => 'Not Updated',
                'errors' => null,
                'result' => array(
                    'schedule' => 'none',
                )
            );

            return Response::json($response);
        }
    }

    public function postScheduleCloseFrom() {

        $schedule = SchoolSchedule::find(Input::get('pk'));
        $schedule->closing_time = Input::get('value');

        if ($schedule->save()) {

            $response = array(
                'status' => 'OK',
                'msg' => 'Updated created successfully',
                'errors' => null,
                'result' => array(
                    'schedule' => $schedule,
                )
            );

            return Response::json($response);
        } else {

            $response = array(
                'status' => 'Error',
                'msg' => 'Not Updated',
                'errors' => null,
                'result' => array(
                    'schedule' => 'none',
                )
            );

            return Response::json($response);
        }
    }

}
