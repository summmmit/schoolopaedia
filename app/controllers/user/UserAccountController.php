<?php
/**
 * Created by PhpStorm.
 * User: summmmit
 * Date: 2/11/2015
 * Time: 1:47 AM
 */

class UserAccountController  extends BaseController {

    public function getCreate(){
        return View::make('user.account.register');
    }

    public function postCreate(){

        $validator = Validator::make(Input::all(),
            array(
                'first_name'            => 'required|max:30',
                'last_name'             => 'required|max:30',
                'city'                  => 'required|max:30',
                'state'                 => 'required|max:30',
                'sex'                   => 'required',
                'email'                 => 'max:60|email|unique:users',
                'password'              => 'required|min:6',
                'password_again'        => 'required|same:password',
            )
        );
        if($validator->fails()){
            return Redirect::route('account-create')
                ->withErrors($validator)
                ->withInput();
        }else{            
            $first_name                 = Input::get('first_name');
            $middle_name                = Input::get('middle_name');
            $last_name                  = Input::get('last_name');
            $email                      = Input::get('email');
            $sex                        = Input::get('sex');
            $city                       = Input::get('city');
            $state                      = Input::get('state');
            $password                   = Input::get('password');
            
            // Unique Voter Id
            $voter_id                   = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,10))),1,10);
            
            //Activation Code
            $code                       = str_random(60);
            
            $User = User::create(array(
                'first_name'                => $first_name,
                'last_name'                 => $last_name,

                'email'                     => $email,
                'password'                  => Hash::make($password),
                'password_updated_at'       => date("Y-m-d H:i:s"),
                
                'voter_id'                  => $voter_id,
                'sex'                       => $sex,
                'city'                      => $city,
                'state'                     => $state,
                'address_updated_at'        => date("Y-m-d H:i:s"),

                'code'                      => $code,
                'active'                    => 0
                
                ));
            
            if($User){                
                return Redirect::route('user-sign-in')
                    ->with('global', 'You have been Registered. You can activate Now.');
            }else{
                return Redirect::route('user-sign-in')
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
                return Redirect::route('user-sign-in')
                    ->with('global', 'Activted thanks');
            }
        }
        return Redirect::route('user-sign-in')
            ->with('global', 'Cant activate do after some time');
    }

    public function getSignIn(){
        return View::make('user.account.login');

    }

    public function postSignIn(){
        $validator = Validator::make(Input::all(),
            array(
                'email' => 'required',
                'password' => 'required'
            )
        );
        if($validator->fails()){
            return Redirect::route('user-sign-in')
                ->withErrors($validator)
                ->withInput();
        }else{

            $remember = (Input::has('remember')) ? true : false;

            $auth = Auth::attempt(array(
                'email'    => Input::get('email'),
                'password' =>  Input::get('password'),
                'active'   => 1
            ), $remember);

            if($auth){
                return Redirect::intended('/user/home');
            }else{
                return Redirect::route('user-sign-in')
                    ->with('global', 'Email Address or Password Wrong');
            }
        }

        return Redirect::route('user-sign-in')
            ->with('global', 'account not activated');

    }

    public function getSignOut(){
        Auth::logout();
                return Redirect::route('user-sign-in')
                    ->with('global', 'You Have Been Successfully Signed Out');
    }
    
    public function getUserHome(){
        return View::make('user.userHome');
    }

    public function postEdit(){

        $validator = Validator::make(Input::all(),
            array(
                'first_name'            => 'required|max:30',
                'last_name'             => 'required|max:30',
                'email'                 => 'max:60|email|unique:users',
                'mobile_number'         => 'max:10',
                'dd'                    => 'max:2',
                'mm'                    => 'max:2',
                'yyyy'                  => 'max:4',
                'sex'                   => 'required',
                'marriage_status'       => 'required',
                'relative_id'           => 'required|max:15',
                'relation_with_person'  => 'required',
                'add_1'                 => 'required|max:30',
                'city'                  => 'required|max:30',
                'state'                 => 'required|max:30',
                'pin_code'              => 'required|max:10',
                'country'               => 'required|max:30',
                //'pic'                   => 'required',
                'newsletter'            => 'required'
            )
        );
        if($validator->fails()){
            return Redirect::route('account-create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $first_name                 = Input::get('first_name');
            $middle_name                = Input::get('middle_name');
            $last_name                  = Input::get('last_name');
            $email                      = Input::get('email');
            $mobile_number              = Input::get('mobile_number');
            $dob                        = Input::get('dd')."-".Input::get('mm')."-".Input::get('yyyy');
            $sex                        = Input::get('sex');
            $marriage_status            = Input::get('marriage_status');
            $relative_id                = Input::get('relative_id');
            $relation_with_person       = Input::get('relation_with_person');
            $add_1                      = Input::get('add_1');
            $add_2                      = Input::get('add_2');
            $city                       = Input::get('city');
            $state                      = Input::get('state');
            $pin_code                   = Input::get('pin_code');
            $country                    = Input::get('country');
            $pic                        = Input::get('pic');
            $newsletter                 = Input::get('newsletter');

            $now                        = date("Y-m-d H-m-i");
            $mobile_updated_at          = $now;
            $address_updated_at         = $now;
            $pic_updated_at             = $now;

            // To verify Mobiles
            $moobile_verified           = 0;

            //Activation COde
            $code = str_random(60);

            $voter_id = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', mt_rand(1,10))),1,10);

            $User = User::create(array(
                'first_name'                => $first_name,
                'middle_name'               => $middle_name,
                'last_name'                 => $last_name,

                'email'                     => $email,

                'mobile_number'             => $mobile_number,
                'mobile_updated_at '        => $mobile_updated_at ,

                'dob'                       => $dob,
                'sex'                       => $sex,
                'marriage_status'           => $marriage_status,

                'relative_id'               => $relative_id,
                'relation_with_person'      => $relation_with_person,

                'add_1'                     => $add_1,
                'add_2'                     => $add_2,
                'city'                      => $city,
                'state'                     => $state,
                'country'                   => $country,
                'pin_code'                  => $pin_code,
                'address_updated_at'        => $address_updated_at,

                'pic'                       => "asdgasdg",
                'pic_updated_at'            => $pic_updated_at,

                'newsletter'                => $newsletter,

                'code'                      => $code,
                'active'                    => 0
            ));
//
//            if($User){
//
//                //send email
//
////                       Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($create){
////                       $message->to($create->email, $create->username)->subject('Activate Your Account');
////                        });
//
//                //redirect with a flash message
////                return Redirect::route('create-message')->with('message', 'Your account has been createde u can activate now');
////            }else{
////                return Redirect::route('create-message')->with('message', 'Your account has been not Been Created. Try Again Later');
////            }
//                return Redirect::route('home');
//            }else{
//                return Redirect::route('home');
//            }

        }
    }

    public function getCreateMessage($message){
    }

}