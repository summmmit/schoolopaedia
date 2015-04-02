<?php

class UserClassController extends BaseController {

    public function getUsers(){
        return View::make('user.class-users');
    }

    public function postCreate(){

    }

}
