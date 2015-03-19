<?php

class UserClassController extends BaseController {

    public function getUsers(){
        return View::make('user.classUsers');
    }

    public function postCreate(){

    }

}
