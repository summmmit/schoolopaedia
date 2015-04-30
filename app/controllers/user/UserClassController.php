<?php

class UserClassController extends BaseController {

    public function getUsers(){
        return View::make('user.class-users');
    }

    public function postCreate(){

    }

    public function getSchedule(){
        return View::make('user.class-schedule');
    }

    public function postClassTimeTable(){
        $class_id = Input::get('class_id');
        $period = Timetable::where('class_id', '=', $class_id)->get();

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

    public function getWeekelySchedule(){
        return View::make('user.class-weekely-schedule');
    }
    
    public function getAttendance(){
        return View::make('user.attendance');
    }
    
    public function getInbox(){
        return View::make('user.inbox');
    }
    
    public function getAssignments(){
        return View::make('user.assignments');
    }

    public function getEvents(){
        return View::make('user.events');
    }

    public function postSetInitial(){
        $session_id = Input::get('session_id');
        $stream_id = Input::get('stream_id');
        $class_id = Input::get('class_id');
        $section_id = Input::get('section_id');

        $users_to_class = new UsersToClass();
        $users_to_class->session_id = $session_id;
        $users_to_class->stream_id  = $stream_id;
        $users_to_class->class_id   = $class_id;
        $users_to_class->section_id = $section_id;
        $users_to_class->user_id = Sentry::getUser()->id;
        if($users_to_class->save()){
            return Redirect::route('user-home')->with('global', 'You Have Been Successfully Registered for this session');
        }else{
            return Redirect::route('user-class-set-initial')->with('global', 'You can not be registered this time. Please Try later.');
        }
    }
    /**
     * Ajax Api's
     */
    /**
     * APi for Attendance
     */    
    public function postNewLeaveApplication(){       

        $response = array(
            'status' => 'success',
            'msg' => 'Classes fetched successfully',
            'errors' => null,
            'result' => array(
                'periods' => "aasdgasdgs"
            )
        );
        return Response::json($response);
    }
    /**
     * Api for Brief Registration
     */
    public function postBriefRegistration(){

        $first_name = Input::get('first_name');
        $last_name = Input::get('last_name');
        $sex = Input::get('sex');

        $user_details = UserDetails::where('user_id', '=', Sentry::getUser()->id)->get()->first();

        $user_details->first_name = $first_name;
        $user_details->last_name = $last_name;
        $user_details->sex = $sex;

        if($user_details->save()){

            $response = array(
                'status' => 'success',
                'result' => array(
                    'details' => $user_details
                )
            );
            return Response::json($response);
        }else{

            $response = array(
                'status' => 'failed',
                'result' => array(
                    'details' => null
                )
            );
            return Response::json($response);
        }
    }
    /**
     * Api for getting Classes by Stream Id
     */
    public function postGetClassesFromStreamId() {

        $stream_id = Input::get('stream_id');
        $school_id = Sentry::getUser()->school_id;

        $classes = Classes::where('streams_id', '=', $stream_id)->where('school_id', '=', $school_id)->get();

        $response = array(
            'status' => 'success',
            'result' => array(
                'classes' => $classes
            )
        );

        return Response::json($response);
    }
    /**
     * Api to get Sections from class
     */
    public function postGetSections() {
        $classId = Input::get('class_id');

        $sections = Sections::where('class_id', '=', $classId)->get();

        $response = array(
            'status' => 'success',
            'result' => array(
                'sections' => $sections
            )
        );

        return Response::json($response);
    }

}
