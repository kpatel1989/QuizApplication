<?php
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	
	/**
	* 	Defines a User Model.
	*/
	class User extends Model
	{
		protected $table = 'users';
		public $timestamps = false;
	}
?>