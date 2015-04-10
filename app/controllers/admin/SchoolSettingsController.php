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

    public function getSchoolSessions() {
        $session = SchoolSession::where('school_id', '=', $this->getschoolId())->get();
    }

    public function getSchoolSettings() {
        $schedule = SchoolSchedule::where('school_id', '=', $this->getschoolId())->get();
        $session = SchoolSession::where('school_id', '=', $this->getschoolId())->get()->first();
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
