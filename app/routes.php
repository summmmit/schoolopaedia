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
    Route::get('/user/signin', array(
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
});

/*
 * Authenticated Group
 */
Route::group(array('before' => 'auth'), function(){

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function(){
        
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
    
});