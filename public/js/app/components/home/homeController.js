app.controller("HomeController", ['$scope','$rootScope', "User", "$location", "UserTestService", '$localStorage', 
	function($scope,$rootScope,User, $location,UserTestService, $localStorage) {
		$scope.quizData = null;

		$scope.go = function ( path ) {
		  $location.path(path);
		};

		$scope.testList = [];

		$scope.getTest = function() {
			UserTestService.getTestList().then(function(res) {
				$scope.testList = res.data;
			})
		}

		$scope.loadTest = function(test) {
			$scope.go('/test/' + test.testName.toLowerCase() + '/instruction');
			$localStorage.currentTest = test;
		}

		$scope.$on('$viewContentLoaded', function() {
		    $scope.getTest();
		});
	}
]);