<?php

class SchoolController extends BaseController {

    public function getCreate(){
        return View::make('main.register');
    }

    public function postCreate(){

        $validator = Validator::make(Input::all(),
            array(
                'name'                     => 'required|max:30',
                'manager_name'             => 'required|max:30',
                'phone_number'             => 'required|max:15',
                'add_1'                    => 'required',
                'city'                     => 'required|max:30',
                'state'                    => 'required|max:30',
                'country'                  => 'required',
                'pin_code'                 => 'required|max:6',
                'email'                    => 'max:60|email|unique:users'
            )
        );
        if($validator->fails()){
            return Redirect::route('activate-account-create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $name                       = Input::get('name');
            $manager_name               = Input::get('manager_name');
            $phone_number               = Input::get('phone_number');
            $add_1                      = Input::get('add_1');
            $add_2                      = Input::get('add_2');
            $city                       = Input::get('city');
            $state                      = Input::get('state');
            $country                    = Input::get('country');
            $pin_code                   = Input::get('pin_code');
            $email                      = Input::get('email');

            //Registration Code
            $registration_code          = str_random(50);
            //staff Code
            $code_for_teachers          = str_random(60);
            //students Code
            $code_for_students          = str_random(70);
            //students Code
            $code_for_admin             = str_random(80);

            $today                      = date("Y-m-d H:i:s");

            $school = School::create(array(
                'name'                      => $name,
                'manager_full_name'         => $manager_name,
                'phone_number'              => $phone_number,
                'email'                     => $email,
                'add_1'                     => $add_1,
                'add_2'                     => $add_2,
                'city'                      => $city,
                'state'                     => $state,
                'country'                   => $country,
                'pin_code'                  => $pin_code,
                'registration_code'         => $registration_code,
                'code_for_admin'            => $code_for_admin,
                'code_for_teachers'         => $code_for_teachers,
                'code_for_students'         => $code_for_students,
                'active'                    => 0,
                'registration_date'         => $today,
            ));

            if($school){

                //send email
                Mail::send('emails.auth.activate.school', array('link' => URL::route('activate-account-activate', $registration_code), 'name' => $name, 'adminCode' => $code_for_admin, 'teachersCode' => $code_for_teachers, 'studentsCode' => $code_for_students), function($message) use ($school){
                    $message->to($school->email, $school->name)->subject('Activate Your Account');
                });
                return Redirect::route('activate-account-create')
                    ->with('global', 'You have been Registered. You can activate Now.');
            }else{
                return Redirect::route('activate-account-create')
                    ->with('global', 'You have not Been Registered. Try Again Later Some time.');
            }
        }

    }

    public function getActivate($code){

        $school = School::where('registration_code' , '=', $code)->where('active', '=', 0);

        if($school->count()){
            $school = $school->first();

            //update school

            $school->active = 1;

            if($school->save()){
                return Redirect::route('activate-account-create')
                    ->with('global', 'Activated thanks. You can login now');
            }
        }
        return Redirect::route('activate-account-create')
            ->with('global', 'Cant activate do after some time');
    }


}
