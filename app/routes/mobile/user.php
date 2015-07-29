<?php
/*
 * Unauthenticated Group
 */
Route::group(array('prefix' => 'mobile/user', 'before' => 'guest'), function() {
    /*
     *  Teacher Account Create (post)
     */
    Route::Post('/account/create/post', array(
        'as' => 'mobile-user-account-create-post',
        'uses' => 'MobileUserController@postCreate'
    ));

});
