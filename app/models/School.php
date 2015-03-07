<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class School extends Eloquent {

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = array(
        'name',
        'manager_name',
        'phone_number',
        'email',
        'add_1',
        'add_2',
        'city',
        'state',
        'country',
        'pin_code',
        'logo',
        'registration_code',
        'staff_code',
        'students_code',
        'active',
        'registration_date'
    );

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school';
}