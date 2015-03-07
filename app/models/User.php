<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {
    
    use UserTrait, RemindableTrait;

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = array(
		'first_name',
		'middle_name',
		'last_name',
		'voter_id',
		'email',
                'email_updated_at',
		'password',
		'password_temp',
                'password_updated_at',
		'code',
		'active',
		'dob',
		'sex',
		'marriage_status',
		'relative_id',
		'relation_with_person',
                'mobile_verified',
		'mobile_number',
		'mobile_updated_at',
                'home_number',
		'add_1',
		'add_2',
		'city',
		'state',
		'country',
		'pin_code',
		'address_updated_at',
		'pic',
		'pic_updated_at',
                'permissions',
		'newsletter'
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
        
        /**
         * for the foreign key permissions to the group table
         */
        public function groups(){
            return $this->hasone('Groups', 'permissions', 'id');
        }

}
