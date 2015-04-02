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
        'as'  => 'user-account-activate',
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
        'as'  => 'user-account-recover',
        'uses' => 'UserAccountController@getRecover'
    ));
});

/*
 * Authenticated Group
 */
Route::group(array('before' => 'auth'), function(){

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function(){
        
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
    });
    /*
     * non - protection Routes
     *
     * SignOUt (get)
     */
    Route::get('/user/account/sign-out', array(
        'as'  => 'user-sign-out',
        'uses' => 'UserAccountController@getSignOut'
    ));
    
    /*
     * User Home (get)
     */
    Route::get('/user/home', array(
        'as'  => 'user-home',
        'uses' => 'UserAccountController@getUserHome'
    ));
    
    /*
     * User Profile (get)
     */
    Route::get('/user/profile', array(
        'as'  => 'user-profile',
        'uses' => 'UserAccountController@getUserProfile'
    ));
    
    /*
     * Other Class Users (get)
     */
    Route::get('/user/class/students', array(
        'as'  => 'user-class-students',
        'uses' => 'UserClassController@getUsers'
    ));
    
});