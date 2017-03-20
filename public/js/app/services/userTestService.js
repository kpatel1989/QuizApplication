(function () {
    'use strict';

    app.service('UserTestService', UserTestService);

    UserTestService.$inject = ['$http', '$timeout' , '$q'];

    function UserTestService($http, $timeout, $q) {
    	var service = {};
    	service.submitTest = function(userTestData) {
            return $http.post("/api/usertest/save",{
                'userTestData' : userTestData
            });
        }

        service.getTestList = function(){
            return $http.get("/api/test/all");
        }

        service.updateTest = function(userTestData) {
            return $http.put('api/user/test/'+userTestData.id, {
                'userTestData' : userTestData
            })
        }
        service.getData = function(testName) {
            var defer = $q.defer();
            $http.get("api/quiz/"+ testName)
                .then(function(res) {
                    defer.resolve(res);
                });
            return defer.promise;
        }

        service.getAllTestsTaken = function(userData){
            var defer = $q.defer();
            $http.get("api/user/"+ userData.id + "/tests")
                .then(function(res) {
                    defer.resolve(res);
                });
            return defer.promise;
        }
    	return service;
    }

})();