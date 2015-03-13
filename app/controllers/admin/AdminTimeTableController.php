<?php

/**
 * Description of AdminAccountController
 *
 * @author 1084760
 */
class AdminTimeTableController extends BaseController {

    protected $user;
    protected $schoolId;

    public function __construct() {

        $this->user = Auth::user();

        $this->schoolId = $this->user->school_id;
    }

    protected function getUser() {
        return $this->user;
    }

    protected function getSchoolId() {
        return $this->schoolId;
    }

    public function getTimeTableCreate() {
        $classes = Classes::where('school_id', '=', $this->getSchoolId())->get();
        $streams = Streams::where('school_id', '=', $this->getSchoolId())->get();
        return View::make('admin.timetableset')->with('classes', $classes)->with('streams', $streams);
    }

    public function postTimeTableCreate() {
        //return View::make('');
    }

    public function postAddClasses() {

        $new_class = Input::get('class');

        $class = new Classes();
        $class->class = $new_class;
        $class->school_id = 1;
        if ($class->save()) {

            $response = array(
                'status' => 'success',
                'msg' => 'Setting created successfully',
                'data_send' => array(
                    'id' => $class->id,
                    'inserted_item' => $class->class
                ),
            );

            return Response::json($response);
        }
    }

    public function postAddStreams() {

        $validator = Validator::make(Input::all(), array(
                    'stream_name' => 'required|max:30|min:3'
        ));

        if ($validator->fails()) {

            $response = array(
                'status' => 'failed',
                'msg' => 'Item is not updated',
                'errors' => $validator,
            );

            return Response::json($response);
        } else {

            $new_stream = Input::get('stream_name');
            $new_stream_id = Input::get('stream_id');

            if ($new_stream_id) {

                $streams = Streams::find($new_stream_id);
                $streams->stream_name = $new_stream;

                if ($streams->save()) {

                    $response = array(
                        'status' => 'success',
                        'msg' => 'Setting created successfully',
                        'data_send' => array(
                            'id' => $streams->id,
                            'inserted_item' => $streams->stream_name
                        ),
                    );

                    return Response::json($response);
                }
            } else {

                $streams = new Streams();
                $streams->stream_name = ucfirst($new_stream);
                $streams->school_id = $this->getSchoolId();

                if ($streams->save()) {

                    $response = array(
                        'status' => 'success',
                        'msg' => 'Setting created successfully',
                        'data_send' => array(
                            'id' => $streams->id,
                            'inserted_item' => $streams->stream_name
                        ),
                    );

                    return Response::json($response);
                }
            }
        }

        $response = array(
            'status' => 'failed',
            'msg' => 'Item is not updated'
        );

        return Response::json($response);
    }

    public function postDeleteStreams() {

        $new_stream = Input::get('stream_id');
        $stream_name = Input::get('stream_name');


        if ($new_stream) {
            $streams = Streams::find($new_stream);
        } else {
            $streams = Streams::where('stream_name', '=', $stream_name);
        }

        if ($streams->delete()) {

            $response = array(
                'status' => 'success',
                'msg' => 'Setting created successfully',
                'deleted_item_id' => $new_stream,
            );

            return Response::json($response);
        } else {

            $response = array(
                'status' => 'failed',
                'msg' => 'Item is Not deleted',
                'Item_id' => $new_stream,
            );

            return Response::json($response);
        }
    }

}
