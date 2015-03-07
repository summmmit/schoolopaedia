<?php
/**
 * Created by PhpStorm.
 * User: summmmit
 * Date: 2/28/2015
 * Time: 3:23 PM
 */
/*
 * Unauthenticated Group
 */
Route::group(array('before' => 'guest'), function() {

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function() {
        /*
         *  Admin Sign-in (post)
         */
        Route::Post('/register', array(
            'as' => 'school-account-create-post',
            'uses' => 'SchoolController@postCreate'
        ));
    });
    /*
     * Admin Create Account (get)
     */
    Route::get('/register', array(
        'as' => 'school-account-create',
        'uses' => 'SchoolController@getCreate'
    ));
});
