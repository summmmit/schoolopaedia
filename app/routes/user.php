<?php

/*
 * Unauthenticated Group
 */
Route::group(array('before' => 'guest'), function() {

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {
        /*
         *  User Sign-in (post)
         */
        Route::Post('/user/signin/post', array(
            'as' => 'user-sign-in-post',
            'uses' => 'UserAccountController@postSignIn'
        ));
        /*
         *  User Create Account (post)
         */
        Route::Post('/user/account', array(
            'as' => 'user-account-create-post',
            'uses' => 'UserAccountController@postCreate'
        ));
        /*
         *  Create Account (post)
         */
        Route::Post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AccountController@postCreate'
        ));
        /*
         *  User Sign-in (post)
         */
        Route::Post('/user/forgot/password/post', array(
            'as' => 'user-forgot-password-post',
            'uses' => 'UserAccountController@postForgotPassword'
        ));
    });
    /*
     * User Create Account (get)
     */
    Route::get('/user/account', array(
        'as' => 'user-account-create',
        'uses' => 'UserAccountController@getCreate'
    ));
    /*
     * User SignIn Account (get)
     */
    Route::get('/user/sign/in', array(
        'as' => 'user-sign-in',
        'uses' => 'UserAccountController@getSignIn'
    ));
    /*
     * User Activate Account (get)
     */
    Route::get('/user/account/activate/{code}', array(
        'as' => 'user-account-activate',
        'uses' => 'UserAccountController@getActivate'
    ));
    /*
     * User Forgot password (get)
     */
    Route::get('/user/forgot/password', array(
        'as' => 'user-forgot-password',
        'uses' => 'UserAccountController@getForgotPassword'
    ));
    /*
     * User Recover Account (get)
     */
    Route::get('/user/account/recover/{code}', array(
        'as' => 'user-account-recover',
        'uses' => 'UserAccountController@getRecover'
    ));
});

/*
 * Authenticated Group
 */
Route::group(array('before' => 'auth'), function() {

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {

        /*
         *  Edit User Details (post)
         */
        Route::Post('/user/edit', array(
            'as' => 'user-edit-post',
            'uses' => 'UserAccountController@postEdit'
        ));
        /*
         *  Change User login Details (post)
         */
        Route::Post('/user/login/details', array(
            'as' => 'user-login-details-post',
            'uses' => 'UserAccountController@postChangePassword'
        ));

        /*
         * Class set Intial Settings (Post)
         */
        Route::Post('/user/class/set/intial', array(
            'as' => 'user-class-set-initial-post',
            'uses' => 'UserAccountController@postSetInitial'
        ));
    });
    /*
     * non - protection Routes
     *
     * SignOUt (get)
     */
    Route::get('/user/account/sign-out', array(
        'as' => 'user-sign-out',
        'uses' => 'UserAccountController@getSignOut'
    ));

    /*
     * User Home (get)
     */
    Route::get('/user/home', array(
        'as' => 'user-home',
        'uses' => 'UserAccountController@getUserHome'
    ));

    /*
     * User Profile (get)
     */
    Route::get('/user/profile', array(
        'as' => 'user-profile',
        'uses' => 'UserAccountController@getUserProfile'
    ));

    /*
     * Class set Intial Settings (get)
     */
    Route::get('/user/class/set/intial', array(
        'as' => 'user-class-set-initial',
        'uses' => 'UserAccountController@getSetInitial'
    ));

    /*
     * Other Class Users (get)
     */
    Route::get('/user/class/students', array(
        'as' => 'user-class-students',
        'uses' => 'UserClassController@getUsers'
    ));

    /*
     * Class schedule (get)
     */
    Route::get('/user/class/schedule', array(
        'as' => 'user-class-schedule',
        'uses' => 'UserClassController@getSchedule'
    ));

    /*
     * Class schedule Periods (get)
     */
    Route::Post('/user/class/schedule/periods', array(
        'as' => 'user-class-schedule-periods',
        'uses' => 'UserClassController@postClassTimeTable'
    ));

    /*
     * Class schedule Periods (get)
     */
    Route::get('/user/class/weekely/schedule', array(
        'as' => 'user-class-weekely-schedule',
        'uses' => 'UserClassController@getWeekelySchedule'
    ));
    /*
     * User Schedule Settings
     */
    /*
     * TimeTable per day
     */
    Route::get('/user/schedule/per/day', array(
        'as' => 'user-schedule-per-day',
        'uses' => 'UserScheduleController@getTimeTablePerDay'
    ));
});
