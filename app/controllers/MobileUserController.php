<?php

class MobileUserController extends BaseController
{

    public function postCreate()
    {

        $email = Input::get('email');
        $password = Input::get('password');
        $password_again = Input::get('password_again');

        $request = [
            'email' => $email,
            'password' => $password,
            'password_again' => $password_again
        ];

        if ($password != $password_again) {

            $errorResponse = [
                'status' => 'failed',
                'error' => [
                    'message' => 'Error',
                    'description' => 'Password and Password Confirm Should be Same.'
                ],
                'request' => $request
            ];

            return Response::json($errorResponse);
        }

        try {

            $user = Sentry::createUser(array(
                'email' => $email,
                'password' => $password,
                'activated' => 0,
                'email_updated_at' => date("Y-m-d h:i:s"),
                'password_updated_at' => date("Y-m-d h:i:s"),
            ));


            //Get the activation code & prep data for email
            $activationCode = $user->GetActivationCode();
            $userId = $user->getId();

            //If no groups created then create new groups
            try {
                $user_group = Sentry::findGroupById(2);
            } catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
                $this->createGroup('administrator');
                $this->createGroup('students');
                $user_group = Sentry::findGroupById(2);
            }

            $user->addGroup($user_group);

            $userDetails = new UserDetails();

            $userDetails->user_id = $userId;
            $userDetails->save();

            $successResponse = [
                'status' => 'success',
                'result' => 'null',
                'request' => $request
            ];

        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {

            $errorResponse = [
                'status' => 'failed',
                'error' => [
                    'message' => 'Error',
                    'description' => 'Email and Password Required.'
                ],
                'request' => $request
            ];
            return Response::json($errorResponse);

        } catch (Cartalyst\Sentry\Users\UserExistsException $e) {

            $errorResponse = [
                'status' => 'failed',
                'error' => [
                    'message' => 'Error',
                    'description' => 'User Already Exists.'
                ],
                'request' => $request
            ];
            return Response::json($errorResponse);

        }

        return Response::json($successResponse);
    }

    public function getActivate($userId, $activationCode)
    {
        try {
            // Find the user using the user id
            $user = Sentry::findUserById($userId);

            // Attempt to activate the user
            if ($user->attemptActivation($activationCode)) {
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

    //Authenticate User
    public function postSignIn()
    {

        try {

            $credentials = array(
                'email' => Input::get('identity'),
                'password' => Input::get('password')
            );

            //Try to authenticate user
            $user = Sentry::getUserProvider()->findByLogin(Input::get('identity'));
            $throttle = Sentry::getThrottleProvider()->findByUserId($user->id);
            $throttle->check();

            //For now auto activate users
            $user = Sentry::authenticate($credentials, false);

            //At this point we may get many exceptions lets handle all user management and throttle exceptions
        } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {

            $error = ApiResponseClass::errorResponse('Error', 'Email field is required.', $credentials);
            return $error;
        } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {

            $error = ApiResponseClass::errorResponse('Error', 'Password field is required.', $credentials);
            return $error;
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {

            $error = ApiResponseClass::errorResponse('Error', 'Wrong password, try again.', $credentials);
            return $error;
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {

            $error = ApiResponseClass::errorResponse('Error', 'User was not found.', $credentials);
            return $error;
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {

            $error = ApiResponseClass::errorResponse('Error', 'User is not activated.', $credentials);
            return $error;
        } catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
            Session::flash('global', 'User is suspended ');
            return Redirect::to('/user/sign/in');
        } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
            Session::flash('global', 'User is banned.');
            return Redirect::to('/user/sign/in');
        }

        $login_flag = null;
        // Login_flag => 1 - go to home screen , 2 - go to school register page, 3 - go to new class register page

        $users_login_info = UsersLoginInfo::where('user_id', '=', $user->id)->get();

        if ($users_login_info->count() > 0) {
            $school_id = $user->school_id;

            $school_session = SchoolSession::where('school_id', '=', $school_id)->where('current_session', '=', 1)->get()->first();

            $user_registered_to_session = UsersToClass::where('session_id', '=', $school_session->id)
                ->where('user_id', '=', Sentry::getUser()->id)->get();
            if ($user_registered_to_session->count() > 0) {

                $login_flag = 1;
            } else {
                Session::flash('global', 'Loggedin Successfully.<br>You Have to Register For new School Session first');

                $login_flag = 3;
            }

        } else {

            $login_flag = 2;
        }

        $result = array(
            'user' => $user,
            'login_flag' => $login_flag
        );

        $success = ApiResponseClass::successResponse($result, $credentials);
        return $success;
    }
}
