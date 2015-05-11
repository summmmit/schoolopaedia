<?php
/*
 * Unauthenticated Group
 */
Route::group(array('prefix' => 'teacher', 'before' => 'guest'), function() {
    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {
        /*
         *  User Sign-in (post)
         */
        Route::Post('/sign/in/post', array(
            'as' => 'teacher-sign-in-post',
            'uses' => 'UserAccountController@postSignIn'
        ));
    });
    /*
     * User Create Account (get)
     */
    Route::get('/account/create', array(
        'as' => 'teacher-account-create',
        'uses' => 'TeacherLoginController@getCreate'
    ));
});
/*
 * Authenticated Group
 */
Route::group(array('prefix' => 'teacher', 'before' => 'teacherAuth'), function() {
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
