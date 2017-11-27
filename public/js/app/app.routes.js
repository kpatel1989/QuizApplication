app.config(['$routeProvider', '$locationProvider',function($routeProvider, $locationProvider) {
	$routeProvider
        .when('/', {
            controller: 'HomeController',
            templateUrl: 'templates/quiz-home.html',
        })
        .when('/test/:testName/instruction', {
            controller: 'TestInstructionController',
            templateUrl: 'templates/quiz-instruction.html',
        })
        .when('/test/start', {
            controller: 'TestController',
            templateUrl: 'templates/quiz-test.html',
        })
        .when('/test/result', {
            controller: 'ResultController',
            templateUrl: 'templates/quiz-result.html',
        })
        .when('/user/dashboard', {
            controller: 'DashboardController',
            templateUrl: 'templates/user-dashboard.html',
        })
        .otherwise({ redirectTo: '/' });
}]);

app.run(run);

function run($rootScope, $location, $localStorage, $http) {
    // keep user logged in after page refresh
    if ($localStorage.userData) {
        $http.defaults.headers.common['Authorization'] = $localStorage.userData.sessionId;
    }

    $rootScope.$on('$locationChangeStart', function (event, next, current) {
        var userPage = $.inArray($location.path(), ['/user/dashboard']) !== -1;
        if (userPage) {
            if (!$localStorage.userData) {
                $location.path('/');
            }
        }
    });
    $rootScope.$on('$routeChangeStart', function () {
        var testPage = $location.path() === '/test/start';
        if(testPage && $localStorage.testStarted){
            $location.path('/');
            delete $localStorage.testStarted;  
        }
        var resultPage = $location.path() === '/test/result';
        if(resultPage && $localStorage.testFinished){
            $location.path('/');
            delete $localStorage.testFinished;     
        }
    });
}