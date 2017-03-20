app.controller('DashboardController', ['$scope','$rootScope','User','$localStorage', 'UserTestService', function($scope, $rootScope, User, $localStorage, UserTestService){
		$scope.user = $localStorage.userData;
		var promise = UserTestService.getAllTestsTaken($scope.user);
		promise.then(function(res) {
			$scope.testsTaken = res.data.tests;
		});

}]);
app.filter('myDateFormat',['$filter', function myDateFormat($filter) {
	return function(text) {
		var d = new Date(text);
		return $filter('date')(d,'yyyy-MM-dd');
	}
}]);
