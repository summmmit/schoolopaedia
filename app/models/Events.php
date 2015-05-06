<?php

class Events extends Eloquent {

    protected $fillable = array('title', 'start', 'end', 'category', 'allday', 'content', 'school_id');
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

}
