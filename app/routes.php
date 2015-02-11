<?php

/*
 * Home (get)
 */
Route::get('/', array(
	'as'  => 'home',
	'uses' => 'HomeController@showWelcome'
));

/*
 * Unauthenticated Group
 */
Route::group(array('before' => 'guest'), function(){

	/*
     * CSRF protection
     */
	Route::group(array('before' => 'csrf'), function(){
		/*
         * Create Account (post)
         */
		Route::Post('/account/create', array(
			'as'  => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

	});
	/*
     * Create Account (get)
     */
	Route::get('/account/create', array(
		'as'  => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	/*
     * After Create Account message (get)
     */
	Route::get('/create/message/{message}', array(
		'as'  => 'create-message',
		'uses' => 'AccountController@getCreateMessage'
	));


});
