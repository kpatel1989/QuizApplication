<?php
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	
	/**
	* 	Defines a User Model.
	*/
	class QuestionOption extends Model
	{
		protected $table = 'question_options';
		public $timestamps = false;
	}
?>