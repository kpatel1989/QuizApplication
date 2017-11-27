<?php 

namespace App\Http\Controllers\Quiz;
use App\Http\Controllers\Controller;
use File;
use Config;
use App\Models\User;
use App\Models\Test;
use App\Models\UserTest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuizController extends Controller {

	public function __construct() {

	}

	public function getTestList() {
		$tests = new Test();
		$testList = Test::all();
		return $testList;
	}

	public function getTest($testName) {
		return File::get(Config::get('app.ROOT_PATH') . '/api/quiz-' . $testName . ".json");
	}

	public function saveUserTest(Request $request, Response $response) {
		$userTestData = $request->input("userTestData");
		$userData = $userTestData['user'];
		$userTestModel = new UserTest();
		if ($userData) {
			$userTestModel->userId = $userData['id'];
		}
		$userTestModel->testId = $userTestData['testId'];
		$userTestModel->score = $userTestData['score'];
		$userTestModel->save();
		return $userTestModel;
	}

	public function updateUserTest(Request $request, Response $respone) {
		$userTestData = $request->input("userTestData");
		$userData = $userTestData['user'];
		$userTestModel = UserTest::where('id',$userTestData['id'])->first();
		if (!$userTestData) {
			return response(['error'=> 'User Test data not found.'],404);
		}
		if ($userData) {
			$userTestModel->userId = $userData['id'];
		}
		$userTestModel->testId = $userTestData['testId'];
		$userTestModel->score = $userTestData['score'];
		$userTestModel->save();
		return $userTestModel;	
	}

	public function getUserTests($userId, Request $request, Response $response) {
		$userTests = UserTest::getAllTests($userId);
		return response(['tests'=>$userTests]);
	}
}

?>