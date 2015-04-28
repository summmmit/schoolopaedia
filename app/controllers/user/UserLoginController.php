<?php

class UserLoginController extends BaseController {

    //Show register Form
    public function getCreate() {
        return View::make('user.account.register');
    }

    public function postCreate() {

        $validator = Validator::make(Input::all(), array(
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

                $email = Input::get('email');
                $password = Input::get('password');

                //Pre activate user
                //$user = Sentry::register(array('email' => $email, 'password' => $password), true);
                //$user = Sentry::register(array('email' => $input['email'], 'password' => $input['password']));

                $user = Sentry::createUser(array(
                    'email'     => $email,
                    'password'  => $password,
                    'activated' => 0,
                    'email_updated_at' => date("Y-m-d h:i:s"),
                    'password_updated_at' => date("Y-m-d h:i:s"),
                ));


                //Get the activation code & prep data for email
                $activationCode  = $user -> GetActivationCode();
                $userId = $user -> getId();

                //send email with link to activate.
                /*Mail::send('emails.register_confirm', $data, function($m) use ($data) {
                 $m -> to($data['email']) -> subject('Thanks for Registration - Support Team');
                 });*/

                //If no groups created then create new groups
                try {
                    $user_group = Sentry::findGroupById(2);
                } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                    $this -> createGroup('administrator');
                    $this -> createGroup('students');
                    $user_group = Sentry::findGroupById(2);
                }

                $user -> addGroup($user_group);

                $userDetails = new UserDetails();

                $userDetails -> user_id = $userId;
                $userDetails -> save();

                //send email
                Mail::send('emails.auth.activate.activate-user', array('link' => URL::route('user-account-activate', $activationCode), 'activationCode' => $activationCode, 'userId' => $userId, 'email' => $email), function($message) use ($user) {
                    $message->to($user->email)->subject('Activate Your Account');
                });

                //success!
                Session::flash('global', 'Thanks for sign up . Please activate your account by clicking activation link in your email');
                return Redirect::to('/user/account');

            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                Session::flash('global', 'Username/Email Required.');
                return Redirect::to('/register') -> withErrors($validator) -> withInput(Input::except(array('password', 'password_confirmation')));
            } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                Session::flash('global', 'User Already Exist.');
                return Redirect::to('/register') -> withErrors($validator) -> withInput(Input::except(array('password', 'password_confirmation')));
            }

        }
    }

    public function createGroup($groupName) {
        $input = array('newGroup' => $groupName);

        // Set Validation Rules
        $rules = array('newGroup' => 'required|min:4');

        //Run input validation
        $v = Validator::make($input, $rules);

        if ($v -> fails()) {
            return false;
        } else {
            try {
                $group = Sentry::getGroupProvider() -> create(array('name' => $input['newGroup'], 'permissions' => array('admin' => Input::get('adminPermissions', 0), 'users' => Input::get('userPermissions', 0), ), ));

                if ($group) {
                    return true;
                } else {
                    return false;
                }

            } catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
                return false;
            } catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
                return false;
            }
        }
    }

    public function getActivate($userId, $activationCode) {
        try {
            // Find the user using the user id
            $user = Sentry::findUserById($userId);

            // Attempt to activate the user
            if ($user -> attemptActivation($activationCode)) {
                Session::flash('global', 'User Activation Successfull Please login below.');
                return Redirect::to('/user/sign/in');
            } else {
                Session::flash('global', 'Unable to activate user Try again later or contact Support Team.');
                return Redirect::to('/user/register');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            Session::flash('global', 'User was not found.');
            return Redirect::to('/user/register');
        } catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e) {
            Session::flash('global', 'User is already activated.');
            return Redirect::to('/user/register');
        }
    }

    public function getSignIn(){
        return View::make('user.account.login');
    }

    //Authenticate User
    public function postSignIn() {

        $inputs = array('identity' => Input::get('identity'), 'password' => Input::get('password'));
        //Since user can enter username,email we cannot have email validator
        $rules = array('identity' => 'required|min:4|max:32', 'password' => 'required|min:6');

        //Find is that username or password and change identity validation rules
        //Lets use regular expressions
        if (filter_var(Input::get('identity'), FILTER_VALIDATE_EMAIL)) {
            //It is email
            $rules['identity'] = 'required|min:4|max:32|email';
        } else {
            //It is username . Check if username exist in profile table
            if (UserDetails::where('username', Input::get('identity')) -> count() > 0) {
                //User exist so get email address
                $user = UserDetails::where('username', Input::get('identity')) -> first();
                $inputs['identity'] = $user -> email;

            } else {
                Session::flash('global', 'User does not exist');
                return Redirect::to('/user/sign/in') -> withInput(Input::except('password'));
            }
        }

        $v = Validator::make($inputs, $rules);

        if ($v -> fails()) {
            return Redirect::to('/user/sign/in') -> withErrors($v) -> withInput(Input::except('password'));
        } else {
            try {


                //Try to authenticate user
                $user = Sentry::getUserProvider() -> findByLogin(Input::get('identity'));

                $throttle = Sentry::getThrottleProvider() -> findByUserId($user -> id);

                $throttle -> check();

                //Authenticate user
                $credentials = array('email' => Input::get('identity'), 'password' => Input::get('password'));

                //For now auto activate users
                $user = Sentry::authenticate($credentials, false);

                //At this point we may get many exceptions lets handle all user management and throttle exceptions
            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                Session::flash('global', 'Login field is required.');
                return Redirect::to('/user/sign/in');
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                Session::flash('global', 'Password field is required.');
                return Redirect::to('/user/sign/in');
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                Session::flash('global', 'Wrong password, try again.');
                return Redirect::to('/user/sign/in');
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Session::flash('global', 'User was not found.');
                return Redirect::to('/user/sign/in');
            } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                Session::flash('global', 'User is not activated.');
                return Redirect::to('/user/sign/in');
            } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                Session::flash('global', 'User is suspended ');
                return Redirect::to('/user/sign/in');
            } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                Session::flash('global', 'User is banned.');
                return Redirect::to('/user/sign/in');
            }
            
            Session::flash('global', 'Loggedin Successfully');
            return Redirect::intended('/user/home');

        }

    }

    public function getSignOut(){
        Sentry::logout();
        return Redirect::to('/user/sign/in');
    }

    public function getUserHome() {      
        return View::make('user.home');
    }
    
    public function getWelcomeSettings(){
        return View::make('user.welcome-settings');
    }

}
