<?php

/**
 * Description of AdminAccountController
 *
 * @author 1084760
 */

class AdminTimeTableController  extends BaseController {

    public function getTimeTableCreate(){
        $classes = Classes::where('school_id', '=', 1)->get();
        return View::make('admin.timetableset')->with('classes', $classes);
    }

    public function postTimeTableCreate(){
        //return View::make('');
    }
    
    public function getAddClasses(){

        $new_class = Input::get('class');

        $class = new Classes();
        $class->class = $new_class;
        $class->school_id = 1;
        if($class->save()){

            $response = array(
                'status' => 'success',
                'msg' => 'Setting created successfully',
                'data_send' => array(
                    'id' => $class->id,
                    'class_name' => $class->class
                ),
            );

            return Response::json( $response );
        }
    }
    
}