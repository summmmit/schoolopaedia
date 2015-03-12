<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Streams extends Eloquent {

    protected $fillable = array('stream_name', 'school_id');

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'streams';

    /**
     * belong to function for school table
     */
    public function school() {
        return $this->belongsto('school', 'id', 'school_id');
    }

}
