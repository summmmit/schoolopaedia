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
         *  School Sign-in (post)
         */
        Route::Post('/register', array(
            'as' => 'activate-account-create-post',
            'uses' => 'SchoolController@postCreate'
        ));
    });
    /*
     * School Create Account (get)
     */
    Route::get('/register', array(
        'as' => 'activate-account-create',
        'uses' => 'SchoolController@getCreate'
    ));
    /*
     * School Activate Account (get)
     */
    Route::get('/activate/account/{code}', array(
        'as' => 'activate-account-activate',
        'uses' => 'SchoolController@getActivate'
    ));
    /**
     * Ajax Api
     */
    /*
     * Validate User By school code and student code
     */
    Route::Post('/school/student/validation', array(
        'as' => 'student-validation-post',
        'uses' => 'SchoolController@postValidateSchoolForStudents'
    ));
    /*
     * Get Current School Session
     */
    Route::Post('/school/current/session', array(
        'as' => 'school-current-session',
        'uses' => 'SchoolController@postGetSchoolCurrentSession'
    ));
    /*
     * Validate Admin By school code and student code
     */
    Route::Post('/school/admin/validation', array(
        'as' => 'admin-validation-post',
        'uses' => 'SchoolController@postValidateSchoolForAdmin'
    ));
});
