<?php

class UserClassController extends BaseController {

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

    public function getUsers(){
        return View::make('user.class-users');
    }

    public function postCreate(){

    }

    public function getSchedule(){
        return View::make('user.class-schedule');
    }

    public function postClassTimeTable(){
        $class_id = Input::get('classes_id');
        $period = Timetable::where('classes_id', '=', $class_id)->get();

        $periods = array();
        $i = 0;
        foreach($period as $key => $value){
            $periods[$i] = array(
                'id' => $period[$key]['id'],
                'title' => 'Networking',
                'start' => $period[$key]['start_time'],
                'end'   => $period[$key]['end_time'],
                'className' => 'event-job',
                'category' => 'Job',
                'allDay' => false,
                 'content' => 'Out to design conference'
            );
            $i++;
        }

        $response = array(
            'status' => 'success',
            'msg' => 'Classes fetched successfully',
            'errors' => null,
            'classId' => $class_id,
            'result' => array(
                'periods' => $periods
            )
        );
        return Response::json($periods);
    }

    public function getTest(){
        return View::make('user.class-test');
    }

}
