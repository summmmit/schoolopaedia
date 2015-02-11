<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array(
		'first_name',
		'middle_name',
		'last_name',
		'email',
		'mobile_number',
		'mobile_updated_at',
		'dob',
		'sex',
		'marriage_status',
		'relative_id',
		'relation_with_person',
		'add_1',
		'add_2',
		'city',
		'state',
		'country',
		'pin_code',
		'address_updated_at',
		'pic',
		'pic_updated_at',
		'newsletter',
		'username',
		'password',
		'password_temp',
		'code',
		'active'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
