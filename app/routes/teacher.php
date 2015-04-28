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
        Route::Post('/teacher/sign/in/post', array(
            'as' => 'teacher-sign-in-post',
            'uses' => 'UserAccountController@postSignIn'
        ));
    });
    /*
     * User Create Account (get)
     */
    Route::get('/teacher/account', array(
        'as' => 'teacher-account-create',
        'uses' => 'UserAccountController@getCreate'
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
        Route::Post('/teacher/edit', array(
            'as' => 'teacher-edit-post',
            'uses' => 'UserAccountController@postEdit'
        ));
    });
    /*
     * non - protection Routes
     *
     * SignOUt (get)
     */
    Route::get('/teacher/attendance', array(
        'as' => 'teacher-attendance',
        'uses' => 'TeacherController@getAttendance'
    ));
});
