<?php
class AdminLoginController extends BaseController {

    //Show register Form
    public function getCreate() {
        return View::make('admin.account.register');
    }

    public function postCreate() {

        $validator = Validator::make(Input::all(), array(
                'email' => 'max:60|email|unique:users',
                'password' => 'required|min:6',
                'password_again' => 'required|same:password',
            )
        );

        if ($validator->fails()) {
            return Redirect::route('admin-account-create')
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
                    $user_group = Sentry::findGroupById(1);
                } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                    $this -> createGroup('administrator');
                    $this -> createGroup('students');
                    $user_group = Sentry::findGroupById(1);
                }

                $user -> addGroup($user_group);

                $userDetails = new UserDetails();

                $userDetails -> user_id = $userId;
                $userDetails -> save();

                //send email
                Mail::send('emails.auth.activate.activate-admin', array('link' => URL::route('admin-account-activate', $activationCode), 'activationCode' => $activationCode, 'userId' => $userId, 'email' => $email), function($message) use ($user) {
                    $message->to($user->email)->subject('Activate Your Account');
                });

                //success!
                Session::flash('global', 'Thanks for sign up . Please activate your account by clicking activation link in your email');
                return Redirect::to('/admin/account/create');

            } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
                Session::flash('global', 'Email Required.');
                return Redirect::to('/admin/account/create') -> withErrors($validator) -> withInput(Input::except(array('password', 'password_confirmation')));
            } catch (Cartalyst\Sentry\Users\UserExistsException $e) {
                Session::flash('global', 'User Already Exist.');
                return Redirect::to('/admin/account/create') -> withErrors($validator) -> withInput(Input::except(array('password', 'password_confirmation')));
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
                return Redirect::to('/admin/sign/in');
            } else {
                Session::flash('global', 'Unable to activate user Try again later or contact Support Team.');
                return Redirect::to('/admin/account/create');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            Session::flash('global', 'User was not found.');
            return Redirect::to('/admin/account/create');
        } catch (Cartalyst\Sentry\Users\UserAlreadyActivatedException $e) {
            Session::flash('global', 'User is already activated.');
            return Redirect::to('/admin/account/create');
        }
    }

    public function getSignIn(){
        return View::make('admin.account.login');
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
                return Redirect::to('/admin/sign/in') -> withInput(Input::except('password'));
            }
        }

        $v = Validator::make($inputs, $rules);

        if ($v -> fails()) {
            return Redirect::to('/admin/sign/in') -> withErrors($v) -> withInput(Input::except('password'));
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
                return Redirect::to('/admin/sign/in');
            } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
                Session::flash('global', 'Password field is required.');
                return Redirect::to('/admin/sign/in');
            } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
                Session::flash('global', 'Wrong password, try again.');
                return Redirect::to('/admin/sign/in');
            } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
                Session::flash('global', 'User was not found.');
                return Redirect::to('/admin/sign/in');
            } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
                Session::flash('global', 'User is not activated.');
                return Redirect::to('/admin/sign/in');
            } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
                Session::flash('global', 'User is suspended ');
                return Redirect::to('/admin/sign/in');
            } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
                Session::flash('global', 'User is banned.');
                return Redirect::to('/admin/sign/in');
            }

            $users_login_info = UsersLoginInfo::where('user_id', '=', $user->id)->get();

            Session::flash('global', 'Loggedin Successfully');

            if($users_login_info->count() > 0){
                $school_id = $user->school_id;

                $school_session = SchoolSession::where('school_id', '=', $school_id)->OrderBy('session_start', 'desc')->get()->first();

                $user_registered_to_session = UsersRegisteredToSession::where('school_session_id', '=', $school_session->id)
                                              ->where('school_id', '=', $school_id)->get();
                if($user_registered_to_session->count() > 0){

                    return Redirect::to(route('user-home'));
                }else{
                    Session::flash('global', 'Loggedin Successfully.<br>You Have to Register For new School Session first');
                    return Redirect::to(route('admin-school-set-sessions'));
                }

            }else{
                return Redirect::to(route('admin-welcome-settings'));
            }
        }

    }

    //this is the code for facebook Login
    public function getFacebookLogin($auth=NULL)
    {
        if ($auth == 'auth')
        {
            try
            {
                Hybrid_Endpoint::process();
            }
            catch (Exception $e)
            {
                return Redirect::to('fbauth');
            }
            return;
        }
        try {
            // create a HybridAuth object
            $socialAuth = new Hybrid_Auth(app_path() . '/config/packages/hybridauth/fbauth.php');
            // authenticate with Google
            $provider = $socialAuth->authenticate("Facebook");
            // fetch user profile
            $userProfile = $provider->getUserProfile();
        }
        catch(Exception $e) {
            // exception codes can be found on HybBridAuth's web site
            return $e->getMessage();
        }
        // access user profile data
        echo "Connected with: <b>{$provider->id}</b><br />";
        echo "As: <b>{$userProfile->displayName}</b><br />";
        echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";

        // logout
        //$provider->logout();
    }

    //this is the method that will handle the Google Login

    public function getGoogleLogin($auth=NULL)
    {
        if ($auth == 'auth')
        {
            Hybrid_Endpoint::process();

        }
        try {
            $oauth = new Hybrid_Auth(app_path() . '/config/packages/hybridauth/gauth.php');
            $provider = $oauth->authenticate('Google');
            $profile = $provider->getUserProfile();
        }
        catch(exception $e)
        {
            return $e->getMessage();
        }


        echo "<pre>";
        print_r( $profile );
        echo "</pre><br />";

        return $profile->email.'<a href="logout">Log Out</a>';

    }

    public function loginWithSocial($social_provider, $action = "") {
        // check URL segment
        if ($action == "auth") {

            // process authentication
            try {
                Session::set('provider', $social_provider);
                Hybrid_Endpoint::process();
            } catch (Exception $e) {
                // redirect back to http://URL/social/
                return Redirect::route('loginWith');
            }
            return;
        }

        try {
            // create a HybridAuth object
            $socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
            // authenticate with Provider
            $provider = $socialAuth -> authenticate($social_provider);

            // fetch user profile
            $userProfile = $provider -> getUserProfile();

            print_r($userProfile);
            die;
        } catch(Exception $e) {
            // exception codes can be found on HybBridAuth's web site
            Session::flash('error_msg', $e -> getMessage());
            return Redirect::to('/login');
        }

        $this -> createOAuthProfile($userProfile);

        return Redirect::to('/');
    }

    public function createOAuthProfile($userProfile) {

        if (isset($userProfile -> username)){
            $username = strlen($userProfile -> username) > 0 ? $userProfile -> username : "";
        }

        if (isset($userProfile -> screen_name)){
            $username = strlen($userProfile -> screen_name) > 0 ? $userProfile -> screen_name : "";
        }

        if (isset($userProfile -> displayName)){
            $username = strlen($userProfile -> displayName) > 0 ? $userProfile -> displayName : "";
        }

        $email = strlen($userProfile -> email) > 0 ? $userProfile -> email : "";
        $email = strlen($userProfile -> emailVerified) > 0 ? $userProfile -> emailVerified : "";

        $password = $this -> generatePassword();

        if (Profile::where('email', $email) -> count() <= 0) {
            $user = Sentry::register(array('email' => $email, 'password' => $password), true);

            try {
                $user_group = Sentry::findGroupById(1);
            } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                $this -> createGroup('users');
                $this -> createGroup('admin');
                $user_group = Sentry::findGroupById(1);
            }

            $user -> addGroup($user_group);

            $profile = new Profile();

            $profile -> user_id = $user -> getId();
            $profile -> email = $email;
            $profile -> username = $username;
            $profile -> save();
        }
        //Login user
        //Try to authenticate user
        try {
            $user = Sentry::findUserByLogin($email);

            $throttle = Sentry::getThrottleProvider() -> findByUserId($user -> id);

            $throttle -> check();

            //Authenticate user
            $credentials = array('email' => $email, 'password' => Input::get('password'));

            Sentry::login($user, false);

            //At this point we may get many exceptions lets handle all user management and throttle exceptions
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
            Session::flash('error_msg', 'Login field is required.');
            return Redirect::to('/login');
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
            Session::flash('error_msg', 'Password field is required.');
            return Redirect::to('/login');
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            Session::flash('error_msg', 'Wrong password, try again.');
            return Redirect::to('/login');
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            Session::flash('error_msg', 'User was not found.');
            return Redirect::to('/login');
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            Session::flash('error_msg', 'User is not activated.');
            return Redirect::to('/login');
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            Session::flash('error_msg', 'User is suspended ');
            return Redirect::to('/login');
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            Session::flash('error_msg', 'User is banned.');
            return Redirect::to('/login');
        }

    }

    public function getSignOut(){
        Sentry::logout();
        return Redirect::to('/admin/sign/in');
    }
    
    public function getWelcomeSettings(){   
        return View::make('admin.welcome-settings');
    }

    public function getAdminHome() {      
        return View::make('admin.home');
    }
    
    // for the school sessions
    public function getSetSchoolSessions() {
        return View::make('admin.set-initial-school-sessions');
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
}
