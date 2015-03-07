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
            return Redirect::route('admin-account-create')
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
            $registration_code          = str_random(60);
            //staff Code
            $staff_code                 = str_random(60);
            //students Code
            $students_code              = str_random(60);

            $today                      = date("Y-m-d");

            $User = School::create(array(
                'name'                      => $name,
                'manager_name'              => $manager_name,
                'phone_number'              => $phone_number,
                'email'                     => $email,
                'add_1'                     => $add_1,
                'add_2'                     => $add_2,
                'city'                      => $city,
                'state'                     => $state,
                'country'                   => $country,
                'pin_code'                  => $pin_code,
                'registration_code'         => $registration_code,
                'staff_code'                => $staff_code,
                'students_code'             => $students_code,
                'active'                    => 0,
                'registration_date'         => $today,
            ));

            if($User){

                //send email
                Mail::send('emails.auth.activate', array('link' => URL::route('admin-account-activate', $code), 'voter_id' => $voter_id), function($message) use ($User){
                    $message->to($User->email, $User->voter_id)->subject('Activate Your Account');
                });
                return Redirect::route('admin-sign-in')
                    ->with('global', 'You have been Registered. You can activate Now.');
            }else{
                return Redirect::route('admin-sign-in')
                    ->with('global', 'You have not Been Registered. Try Again Later Some time.');
            }
        }

    }

    public function getActivate($code){

        $user = User::where('code' , '=', $code)->where('active', '=', 0);

        if($user->count()){
            $user = $user->first();

            //update user

            $user->active = 1;
            $user->code = "";

            if($user->save()){
                return Redirect::route('admin-sign-in')
                    ->with('global', 'Activated thanks. You can login now');
            }
        }
        return Redirect::route('admin-sign-in')
            ->with('global', 'Cant activate do after some time');
    }


}
