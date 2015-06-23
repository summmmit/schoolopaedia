<?php

class BaseController extends Controller {

    protected $user;
    protected $schoolId;
    protected $schoolSessionId;

    public function __construct() {

        $this->user = Sentry::getUser();

        $this->schoolId = $this->user->school_id;
    }

    protected function getUser() {
        return $this->user;
    }

    /**
     * @return schoolId
     */
    protected function getSchoolId() {
        return $this->schoolId;
    }

    /**
     * @return SchoolSessionId
     */
    protected function getSchoolSessionId() {

        $session = SchoolSession::where('school_id', '=', $this->getschoolId())
            ->where('current_session', '=', 1)
            ->get()->first();

        return $this->schoolSessionId = $session->id;
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
