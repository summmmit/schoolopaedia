<?php

class UserLoginController extends BaseController {

    //Show register Form
    public function getCreate() {
        return View::make('user.account.register');
    }

    public function postCreate() {

        $validator = Validator::make(Input::all(), array(
                'first_name' => 'required|max:30',
                'last_name' => 'required|max:30',
                'email' => 'max:60|email|unique:users',
                'password' => 'required|min:6',
                'password_again' => 'required|same:password',
            )
        );

        if ($validator->fails()) {
            return Redirect::route('user-account-create')
                ->withErrors($validator)
                ->withInput();
        } else {

            try {

                $first_name = Input::get('first_name');
                $last_name = Input::get('last_name');
                $email = Input::get('email');
                $password = Input::get('password');

                //Pre activate user
                $user = Sentry::register(array('email' => $email, 'password' => $password), true);
                //$user = Sentry::register(array('email' => $input['email'], 'password' => $input['password']));

                //Get the activation code & prep data for email
                $activationCode  = $user -> GetActivationCode();
                $userId = $user -> getId();

                //send email with link to activate.
                /*Mail::send('emails.register_confirm', $data, function($m) use ($data) {
                 $m -> to($data['email']) -> subject('Thanks for Registration - Support Team');
                 });*/

                echo "<pre>";
                print_r($user);

                die();

                //If no groups created then create new groups
                try {
                    $user_group = Sentry::findGroupById(1);
                } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                    $this -> createGroup('users');
                    $this -> createGroup('admin');
                    $user_group = Sentry::findGroupById(1);
                }

                $user -> addGroup($user_group);

                $user = new User();

                $user -> user_id = $data['userId'];
                $user -> email = $data['email'];
                $user -> username = $input['username'];
                $user -> save();

                //success!
                Session::flash('success_msg', 'Thanks for sign up . Please activate your account by clicking activation link in your email');
                return Redirect::to('/register');

            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                Session::flash('error_msg', 'Username/Email Required.');
                return Redirect::to('/register') -> withErrors($v) -> withInput(Input::except(array('password', 'password_confirmation')));
            } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                Session::flash('error_msg', 'User Already Exist.');
                return Redirect::to('/register') -> withErrors($v) -> withInput(Input::except(array('password', 'password_confirmation')));
            }

        }
    }

}
