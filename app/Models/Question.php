<?php
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	
	/**
	* 	Defines a User Model.
	*/
	class Question extends Model
	{
		protected $table = 'questions';
		public $timestamps = false;
	}
?>