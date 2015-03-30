<?php

/*
 * Home (get)
 */
Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@showWelcome'
));
/*
 * Unauthenticated Group
 */
Route::group(array('prefix' => 'administrator', 'before' => 'guest'), function() {

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {
        /*
         *  Admin Sign-in (post)
         */
        Route::Post('/admin/signin/post', array(
            'as' => 'admin-sign-in-post',
            'uses' => 'AdminAccountController@postSignIn'
        ));
        /*
         *  Admin Create Account (post)
         */
        Route::Post('/admin/account', array(
            'as' => 'admin-account-create-post',
            'uses' => 'AdminAccountController@postCreate'
        ));
        /*
         *  Create Account (post)
         */
        Route::Post('/account/create', array(
            'as' => 'account-create-post',
            'uses' => 'AdminAccountController@postCreate'
        ));
        /*
         *  Admin Sign-in (post)
         */
        Route::Post('/admin/forgot/password/post', array(
            'as' => 'admin-forgot-password-post',
            'uses' => 'AdminAccountController@postForgotPassword'
        ));
    });
    /*
     * Admin Create Account (get)
     */
    Route::get('/admin/account', array(
        'as' => 'admin-account-create',
        'uses' => 'AdminAccountController@getCreate'
    ));
    /*
     * Admin SignIn Account (get)
     */
    Route::get('/admin/signin', array(
        'as' => 'admin-sign-in',
        'uses' => 'AdminAccountController@getSignIn'
    ));
    /*
     * Admin Activate Account (get)
     */
    Route::get('/admin/account/activate/{code}', array(
        'as' => 'admin-account-activate',
        'uses' => 'AdminAccountController@getActivate'
    ));
    /*
     * Admin Forgot password (get)
     */
    Route::get('/admin/forgot/password', array(
        'as' => 'admin-forgot-password',
        'uses' => 'AdminAccountController@getForgotPassword'
    ));
    /*
     * Admin Recover Account (get)
     */
    Route::get('/admin/account/recover/{code}', array(
        'as' => 'admin-account-recover',
        'uses' => 'AdminAccountController@getRecover'
    ));
});

/*
 * Authenticated Group
 */
Route::group(array('prefix' => 'administrator', 'before' => 'auth'), function() {

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {

        /*
         *  Edit Admin Details (post)
         */
        Route::Post('/admin/edit', array(
            'as' => 'admin-edit-post',
            'uses' => 'AdminAccountController@postEdit'
        ));
        /*
         *  Change Admin login Details (post)
         */
        Route::Post('/admin/login/details', array(
            'as' => 'admin-login-details-post',
            'uses' => 'AdminAccountController@postChangePassword'
        ));
        /*
         * Admin Time Table Set (post)
         */
        Route::Post('/admin/time/table', array(
            'as' => 'admin-time-table-post',
            'uses' => 'AdminTimeTableController@postTimeTableCreate'
        ));
    });
    /*
     * non - protection Routes
     *
     * SignOUt (get)
     */
    Route::get('/admin/account/sign/out', array(
        'as' => 'admin-sign-out',
        'uses' => 'AdminAccountController@getSignOut'
    ));
    /*
     * Admin Home (get)
     */
    Route::get('/admin/home', array(
        'as' => 'admin-dashboard',
        'uses' => 'AdminAccountController@getAdminHome'
    ));
    /*
     * Admin Profile (get)
     */
    Route::get('/admin/profile', array(
        'as' => 'admin-profile',
        'uses' => 'AdminAccountController@getAdminProfile'
    ));
    /*
     * Admin Time Table Set (get)
     */
    Route::get('/admin/time/table', array(
        'as' => 'admin-time-table',
        'uses' => 'AdminTimeTableController@getTimeTableCreate'
    ));

    /**
     * Time Table Settings 
     */
    /*
     * Admin Get Class and Streams Pair  (post)
     */
    Route::Post('/admin/time/table/get/class/streams/pair', array(
        'as' => 'admin-time-table-get-class-streams-pair',
        'uses' => 'AdminTimeTableController@postGetClassStreamPair'
    ));
    /*
     * Admin Classes Add or Edit (post)
     */
    Route::Post('/admin/time/table/add/classes', array(
        'as' => 'admin-time-table-add-classes-post',
        'uses' => 'AdminTimeTableController@postAddClasses'
    ));
    /*
     * Admin Classes Delete (post)
     */
    Route::Post('/admin/time/table/delete/classes', array(
        'as' => 'admin-time-table-delete-classes-post',
        'uses' => 'AdminTimeTableController@postDeleteClasses'
    ));
    /*
     * Admin Classes get (post)
     */
    Route::Post('/admin/time/table/get/classes', array(
        'as' => 'admin-time-table-get-classes-post',
        'uses' => 'AdminTimeTableController@postGetClasses'
    ));
    /*
     * Admin Streams  (post)
     */
    Route::Post('/admin/time/table/get/streams', array(
        'as' => 'admin-time-table-get-streams',
        'uses' => 'AdminTimeTableController@postGetStreams'
    ));
    /*
     * Admin Streams Add or Edit (post)
     */
    Route::Post('/admin/time/table/add/stream', array(
        'as' => 'admin-time-table-add-stream-post',
        'uses' => 'AdminTimeTableController@postAddStreams'
    ));
    /*
     * Admin Streams Delete (post)
     */
    Route::Post('/admin/time/table/delete/stream', array(
        'as' => 'admin-time-table-delete-stream-post',
        'uses' => 'AdminTimeTableController@postDeleteStreams'
    ));
    /*
     * Admin Sections  (post)
     */
    Route::Post('/admin/time/table/get/sections', array(
        'as' => 'admin-time-table-get-streams',
        'uses' => 'AdminTimeTableController@postGetSections'
    ));
    /*
     * Admin Sections Add or Edit (post)
     */
    Route::Post('/admin/time/table/add/sections', array(
        'as' => 'admin-time-table-add-sections-post',
        'uses' => 'AdminTimeTableController@postAddSections'
    ));
    /*
     * Admin Sections Delete (post)
     */
    Route::Post('/admin/time/table/delete/sections', array(
        'as' => 'admin-time-table-delete-sections-post',
        'uses' => 'AdminTimeTableController@postDeleteSections'
    ));
    /*
     * Admin Subjects  (post)
     */
    Route::Post('/admin/time/table/get/subjects', array(
        'as' => 'admin-time-table-get-subjects',
        'uses' => 'AdminTimeTableController@postGetSubjects'
    ));
    /*
     * Admin Sections Add or Edit (post)
     */
    Route::Post('/admin/time/table/add/subjects', array(
        'as' => 'admin-time-table-add-subjects-post',
        'uses' => 'AdminTimeTableController@postAddSubjects'
    ));
    /*
     * Admin Sections Delete (post)
     */
    Route::Post('/admin/time/table/delete/subjects', array(
        'as' => 'admin-time-table-delete-subjects-post',
        'uses' => 'AdminTimeTableController@postDeleteSubjects'
    ));
    /*
      <<<<<<< HEAD
     * Admin Timetable  (post)
     */
    Route::get('/admin/time/table/get/create', array(
        'as' => 'admin-create-time-table',
        'uses' => 'AdminTimeTableController@getCreateTimeTable'
    ));
    /*
     * Admin get TimeTable by Class  (post)
     */
    Route::Post('/admin/time/table/get/periods', array(
        'as' => 'admin-time-table-get-periods',
        'uses' => 'AdminTimeTableController@postGetPeriods'
    ));
});
