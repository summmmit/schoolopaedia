<?php

namespace App\restApi;

class ApiResponse {
    
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
