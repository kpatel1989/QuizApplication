<?php
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	
	/**
	* 	Defines a User Model.
	*/
	class UserCredential extends Model
	{
		protected $table = 'user_credentials';
		public $timestamps = false;
	}
?>