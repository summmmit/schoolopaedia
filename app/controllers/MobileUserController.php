<?php

class MobileUserController extends BaseController {

	public function postCreate()
	{
        $response = array(
            'name' => 'sumit',
            'age' => 24
        );

        return Response::json($response);
	}

}
