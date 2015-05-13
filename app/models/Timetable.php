<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Timetable extends Eloquent {

    protected $fillable = array('start_time', 'end_time', 'class_id', 'subject_id', 'users_id', 'section_id');

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'timetable';
}
