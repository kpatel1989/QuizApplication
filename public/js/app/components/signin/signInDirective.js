
/**
 * SignIn directive handler.
 */
app.directive("signin",function(){
	return {
		restrict: 'AE',	
		templateUrl: 'templates/signin.html',
		controller: 'signInController'
	}
});