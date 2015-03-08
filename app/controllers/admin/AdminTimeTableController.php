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
        $classes = Classes::select(array('class'))->where('school_id', '=', 1);
        $dataTables = Datatables::of($classes)->make()->blader('admin.timetableset');

        return $dataTables;
    }

    public function postTimeTableCreate(){
        //return View::make('');
    }
    
    public function apiClasses(){
        $classes = Classes::where('school_id', '=', 1);
        $classes = Classes::select(array('class'))->where('school_id', '=', 1);
        $dataTables = Datatables::of($classes)->make();

        echo "<pre>";
        print_r($dataTables);

        //return View::make('admin.timetableset')->with('classes', $classes);
    }
    
}