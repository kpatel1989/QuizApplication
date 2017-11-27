app.factory("Test",['$http',function($http){
	var Test = function(testData) {
		if (testData) {
			this.id = testData.id;
			this.name = testData.name;
		}
	}

	return Test;
}]);