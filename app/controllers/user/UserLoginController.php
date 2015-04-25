<?php

class UserLoginController extends BaseController {

	public function showWelcome()
	{
		return View::make('hello');
	}

}
