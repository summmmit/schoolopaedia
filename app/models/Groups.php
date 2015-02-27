<?php

class Groups extends Eloquent {
	protected $fillable = array('name', 'permissions');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';
        
        /**
         * belong to function for user table
         */
        public function user(){
            return $this->belongsto('User', 'id', 'permissions');
        }
}