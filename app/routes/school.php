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
        'as'  => 'activate-account-activate',
        'uses' => 'SchoolController@getActivate'
    ));
});
