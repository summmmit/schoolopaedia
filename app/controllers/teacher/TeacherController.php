<?php

class TeacherController extends BaseController {

	public function getAttendance()
	{
		return View::make('teacher.attendance');
	}

}
