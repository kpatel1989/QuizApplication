<?php
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;
	
	/**
	* 	Defines a User Model.
	*/
	class UserTest extends Model
	{
		protected $table = 'user_tests';
		public $timestamps = false;

		public static function getAllTests($userId){
			$userTableName = (new User())->getTable();
			$userTestTableName = (new UserTest())->getTable();
			$testTableName = (new Test())->getTable();
			$questionsTableName = (new Question())->getTable();
			$totalQuestions = DB::table($questionsTableName)
				->select(DB::raw($questionsTableName.'.testId,' . ' count(id) as total'))
				->groupBy(DB::raw($questionsTableName.'.testId'))
				->get();
			$questionsPerTest = [];
			foreach ($totalQuestions as $question) {
				$questionsPerTest[$question->testId] = $question->total;
			}
			$userTests = DB::table($userTestTableName)
		            ->join($testTableName, $testTableName.'.id', '=', $userTestTableName.'.testId')
		            ->select(DB::raw($userTestTableName.'.id, '. $userTestTableName.'.score, testId, testTaken, testName'))
		            ->where($userTestTableName.".userId",$userId)
		            ->get();
		    foreach($userTests as $userTest) {
		    	$userTest->maxScore = $questionsPerTest[$userTest->testId];
		    }
		    return $userTests;
		}
	}
?>
