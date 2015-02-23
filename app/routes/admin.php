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
        'as'  => 'admin-account-activate',
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
        'as'  => 'admin-account-recover',
        'uses' => 'AdminAccountController@getRecover'
    ));
});

/*
 * Authenticated Group
 */
Route::group(array('prefix' => 'administrator', 'before' => 'auth'), function(){

    /*
     * CSRF protection
     */
    Route::group(array('before' => 'csrf'), function(){
        
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
    });
    /*
     * non - protection Routes
     *
     * SignOUt (get)
     */
    Route::get('/admin/account/sign/out', array(
        'as'  => 'admin-sign-out',
        'uses' => 'AdminAccountController@getSignOut'
    ));
    
    /*
     * Admin Home (get)
     */
    Route::get('/admin/home', array(
        'as'  => 'admin-dashboard',
        'uses' => 'AdminAccountController@getAdminHome'
    ));
    
    /*
     * Admin Profile (get)
     */
    Route::get('/admin/profile', array(
        'as'  => 'admin-profile',
        'uses' => 'AdminAccountController@getAdminProfile'
    ));
    
});