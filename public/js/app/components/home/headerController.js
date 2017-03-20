app.controller("HeaderController", ['$scope','$rootScope', "User", "$location", "UserAuthenticationService", "$localStorage",
	function($scope,$rootScope,User, $location,UserAuthenticationService,$localStorage) {
		if ($localStorage.userData) {
			$scope.user  = $rootScope.user = new User($localStorage.userData);
			$scope.isLoggedIn = true;
		} else {
			$scope.isLoggedIn = false;
		}
		$scope.go = function ( path ) {
		  $location.path( path );
		};
		$scope.logout = function() {
			var defer = UserAuthenticationService.logout();
			defer.then($scope.onLogout);
		}
		$scope.onLogout = function() {
			//refresh page;
			$scope.isLoggedIn = false;
			delete $rootScope.user;
			$scope.go("/");
		}
		$rootScope.$on(app.constant.events.userSignedIn,function(obj,userData){
			$scope.user = userData;
			$scope.isLoggedIn = true;
		});
	}
]);