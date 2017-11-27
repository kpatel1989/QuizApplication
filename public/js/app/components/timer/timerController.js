app.controller("timerController", ['$scope','$rootScope','Timer',function($scope, $rootScope, Timer) {
	$timer = new Timer();
	$scope.timer = $timer;
	/**
	 * Starts a timer of given milliseconds
	 */
	$scope.startTimer = function(timeInMilliSeconds) {
		$timer.start(timeInMilliSeconds);
	}

	/**
	 * stops the timer
	 */
	$scope.resetTimer = function() {
		$timer.stop();
	}

	/**
	 * Restarts a timer
	 */
	$scope.restartTimer = function() {
		$timer.restart();
	}

	$scope.startTimer(app.constant.Test_Time * 60 * 1000);
	
	/**
	 * Test finished event listener.
	 */
	$rootScope.$on(app.constant.events.testFinished,function(){
		$scope.resetTimer();
	})
}]);