<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiResponses
 *
 * @author Summmmit
 */
class ApiResponses {
    
    public function successResponse($result = array(), $request = array()){
        
        $successResponse = [
            'status'   => 'success',
            'result'   =>  $result,
            'request'  =>  $request
        ];
        return Response::json($successResponse);
    }
    
    public function errorResponse($message, $description, $request = array()){
        
        $errorResponse = [
            'status'    => 'failed',
            'error'     => [
                'message'      =>  $message,
                'description'  =>  $description
            ],
            'request'   => $request
        ];
        return Response::json($errorResponse);
    }
}
