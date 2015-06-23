<?php

class AdminEventsController extends BaseController {

    public function getSchoolEvents() {
        return View::make('admin.events');
    }

    /**
     * Ajax Api for getting event types
     */
    public function postGetEventTypes() {

        $school_id = $this->getSchoolId();
        $event_types = EventTypes::where('school_id', '=', $school_id)->get();

        $response = array(
            'status' => 'Success',
            'result' => array(
                'event_types' => $event_types,
            )
        );

        return Response::json($response);
    }

    /**
     * Ajax Api for getting event types
     */
    public function postCreateEvent() {

        $title = Input::get('title');
        $start = Input::get('start');
        $end = Input::get('end');
        $allDay = Input::get('allDay');
        $category = Input::get('category');
        $content = Input::get('content');
        $school_id = $this->getSchoolId();

        if ($allDay == "true") {
            $allDay = 1;
        } else {
            $allDay = 0;
        }

        $event = new Events();
        $event->title = $title;
        $event->start = date($start);
        $event->end = date($end);
        $event->allday = $allDay;
        $event->category = $category;
        $event->content = $content;
        $event->school_id = $school_id;

        if ($event->save()) {

            $response = array(
                'status' => 'Success',
                'result' => array(
                    'events' => $event,
                )
            );

            return Response::json($response);
        } else {

            $response = array(
                'status' => 'Failed',
                'result' => array(
                    'events' => 'none',
                )
            );

            return Response::json($response);
        }
    }

    public function postGetEvent() {

        $school_id = $this->getSchoolId();

        $all_events = Events::where('school_id', '=', $school_id)->get();

        $i = 0;
        foreach ($all_events as $all_event) {
            $event_type_name = EventTypes::where('id', '=', $all_event->category)->get()->first();
            $all_events[$i++]['category'] = $event_type_name->event_type_name;
        }

        return Response::json($all_events);
    }


}
