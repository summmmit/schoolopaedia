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
    });
    /*
     * User Create Account (get)
     */
    Route::get('/user/account', array(
        'as' => 'user-account-create',
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
        Route::Post('/user/edit', array(
            'as' => 'user-edit-post',
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
