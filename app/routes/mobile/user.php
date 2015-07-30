<?php
/*
 * Unauthenticated Group
 */
Route::group(array('prefix' => 'mobile/user', 'before' => 'guest'), function() {
    /*
     *  User Account Create By Mobile App (post)
     */
    Route::Post('/account/create/post', array(
        'as' => 'mobile-user-account-create-post',
        'uses' => 'MobileUserController@postCreate'
    ));
    /*
     * User Activate Account (get)
     */
    Route::get('/account/{userId}/activate/{code}', array(
        'as' => 'user-account-activate',
        'uses' => 'UserLoginController@getActivate'
    ));
    /*
     *  User Sign-in (post)
     */
    Route::Post('/sign/in/post', array(
        'as' => 'user-sign-in-post',
        'uses' => 'MobileUserController@postSignIn'
    ));

});
