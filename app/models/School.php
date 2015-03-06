<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class School extends Eloquent {

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];
    protected $fillable = array(
        'name',
        'manager_full_name',
        'add_1',
        'add_2',
        'city',
        'state',
        'country',
        'registration_code',
        'code_for_admin',
        'code_for_teachers',
        'code_for_students',
        'registration_date'
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school';

    /**
     * for the foreign key permissions to the classes table
     */
    public function classes() {
        return $this->hasmany('Classes', 'school_id', 'id');
    }

}
