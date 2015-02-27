<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminAccountController
 *
 * @author 1084760
 */

class AdminTimeTableController  extends BaseController {

    public function getTimeTableCreate(){
        return View::make('admin.timetableset');
    }

    public function postTimeTableCreate(){
        //return View::make('');
    }
    
}