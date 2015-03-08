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
        $classes = Classes::where('school_id', '=', 1)->get();
        return View::make('admin.timetableset')->with('classes', $classes);
    }

    public function postTimeTableCreate(){
        //return View::make('');
    }
    
    public function apiClasses(){
        $classes = Classes::where('school_id', '=', 1)->get()->toJson();
        return View::make('admin.timetableset')->with('classes', $classes);
    }
    
}