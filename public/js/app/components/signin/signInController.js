app.controller("signInController", ['$scope','$rootScope', "UserAuthenticationService", "$localStorage", "User", 
	function($scope,$rootScope,UserAuthenticationService,$localStorage, User) {

		$scope.signInError = "";
		$scope.validateEmailAddress = function() {
			$scope.invalidEmailAddress = !signInForm.emailAddress.validity.valid;
		}
		$scope.validatePassword = function() {
			$scope.invalidPassword = !$scope.user.password || ($scope.user.password == "");
		}
		$scope.validateConfirmPassword = function() {
			$scope.invalidConfirmPassword = !$scope.user.confirmPassword || ($scope.user.confirmPassword == "" || $scope.user.password != $scope.user.confirmPassword);
		}

		/**
		 * Check of first name is valid on firstName textbox blur event. 
		 */
		$scope.validateFirstName = function() {
			$scope.invalidFirstName = !$scope.user.firstName || ($scope.user.firstName == "")
		}
		
		/**
		 * Check of last name is valid on lastName textbox blur event. 
		 */
		$scope.validateLastName = function() {
			$scope.invalidLastName = !$scope.user.lastName || ($scope.user.lastName == "");
		}
		
		$scope.signIn = function() {
			$scope.validateEmailAddress();
			$scope.validatePassword();
			$localStorage.userData = {};
			if (!$scope.invalidEmailAddress && !$scope.invalidPassword) {
				delete $scope.user.confirmPassword;
				UserAuthenticationService.login($scope.user).then(function(res) {
					UserAuthenticationService.setCredentials(res.data);
					$rootScope.user = new User(res.data);
					$rootScope.$broadcast(app.constant.events.userSignedIn,res.data);
					$('#signInModal').modal('hide');
				}, function(error) {
					$scope.signInError = error.data.error;
					console.log(error);
				});
			}
		}

		$scope.register = function() {
			$scope.validateEmailAddress();
			$scope.validatePassword();
			$scope.validateConfirmPassword();
			if (!$scope.invalidEmailAddress && !$scope.invalidPassword && !$scope.invalidConfirmPassword) {
				delete $scope.user.confirmPassword;
				UserAuthenticationService.register($scope.user).then(function(res) {
					UserAuthenticationService.setCredentials(res.data);
					$rootScope.user = new User(res.data);
					$rootScope.$broadcast(app.constant.events.userSignedIn,res.data);
					$('#signInModal').modal('hide');
				}, function(error) {
					$scope.signInError = error.data.error;
					console.log(error);
				});	
			}
		}

		$scope.$on('$viewContentLoaded', function() {
		    $scope.signInError = null;
		});
	}
]);