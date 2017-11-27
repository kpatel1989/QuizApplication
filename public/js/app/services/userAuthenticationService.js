(function () {
    'use strict';

    app.service('UserAuthenticationService', UserAuthenticationService);

    UserAuthenticationService.$inject = ['$http', '$timeout', '$localStorage'];

    function UserAuthenticationService($http, $timeout, $localStorage) {
    	var service = {};
    	service.login = function(userData) {
            return $http.post("/api/user/authenticate",userData);
        }
        service.logout = function() {
            this.clearCredentials();
    		return $http.post("/api/user/logout");
    	}
    	service.register = function(userData) {
    		return $http.post("/api/user/register",userData)
    	}
        service.setCredentials = function(responseData) {
            $localStorage.userData = responseData;
            $http.defaults.headers.common['Authorization'] = responseData.sessionId;
        }
        service.clearCredentials = function() {
            $localStorage.$reset();
        }
    	return service;
    }

})();