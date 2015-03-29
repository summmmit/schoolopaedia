<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Timetable extends Eloquent {

    protected $fillable = array('start_time', 'end_time', 'classes_id', 'subject_id', 'users_id');

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timetable';

    /**
     * belong to function for activate table
     */
    public function classes() {
        return $this->belongsto('classes', 'id', 'classes_id');
    }
    /**
     * belong to function for Subjects table
     */
    public function subjects() {
        return $this->belongsto('subjects', 'id', 'subject_id');
    }
    /**
     * belong to function for Users table
     */
    public function users() {
        return $this->belongsto('users', 'id', 'users_id');
    }
}
