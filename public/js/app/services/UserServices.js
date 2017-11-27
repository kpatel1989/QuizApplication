(function () {
    'use strict';

    app.service('UserService', UserService);

    UserService.$inject = ['$http', '$timeout', '$localStorage'];

    function UserService($http, $timeout, $localStorage) {
    	var service = {};
    	service.subscribe = function(subscribeEmailId) {
    		$http.post("/api/subscribe",{
    			subscribeEmailId: subscribeEmailId
    		});
    	} 
    	return service;
    };
})();