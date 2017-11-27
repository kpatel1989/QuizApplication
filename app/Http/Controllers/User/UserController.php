<?php 

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Config;
use Input;
use App\Models\User;
use App\Models\UserCredential;
use App\Providers\MailServiceProvider;

class UserController extends Controller {

	public function __construct() {

	}

	public function login(Request $request,Response $response) {
		$userData = array(
			"emailId" => $request->input("emailAddress"),
			"password" => $request->input('password')
		);
		$user = User::where('emailId',$userData['emailId'])->first();
		$userCred = UserCredential::where('userId',$user['id'])->first();
		if ($user['id'] != null && $userCred['password'] === $userData['password']) {
			$user["sessionId"] = $request->session()->getId();
			return $user;
		}
		return response(['error'=> 'Invalid User name/password'],401);
	}

	public function register(Request $request) {
		$userData = array(
			"emailId" => $request->input("emailAddress"),
			"password" => $request->input('password'),
			"firstName" => $request->input("firstName"),
			"lastName" => $request->input('lastName')
		);
		$user = new User();
		$user->emailId = $userData['emailId'];
		$user->firstName = $userData['firstName'];
		$user->lastName = $userData['lastName'];
		$user->save();

		$userCred = new UserCredential();
		$userCred->userId = $user['id'];
		$userCred->password = $userData['password'];
		$userCred->save();

		$user["sessionId"] = $request->session()->getId();
		return $user;
	}

	public function logout(Request $request) {
		$request->session()->flush();
		return response([""],200);
	}

	public function get($userId,Request $request,Response $response) {
		return User::where('id',$userId)->first();
	}

	public function subscribe(Request $request,Response $response) {
		//email
		$emailId = $request->input('subscribeEmailId');
		$user = User::where("emailId", $emailId)->first();
		if (empty($user)) {
			$user = new User();
			$user->emailId = $emailId;
		}
		$user ->isSubscriber = 1;
		$user->save();

		// send email
		$subject = "Thank you for subscribing";
		$body = "Thank you for subscribing to the JS Blog";
		return  response()->json(MailServiceProvider::sendMail($emailId, Config::get('mail.from'), $subject, $body));
	}
}

?>