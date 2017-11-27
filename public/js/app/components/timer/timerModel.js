/**
 * Timer Model.
 */
app.factory("Timer",["$interval","$rootScope",function($interval,$rootScope){
	var Timer = function() {

	}
	Timer.prototype.time = 0;
	Timer.prototype.startTime = 0;
	Timer.prototype.promise = null;

	/**
	 * Starts the timer for given milliseconds.
	 */
	Timer.prototype.start = function(timeInMilliSeconds) {
		this.startTime = timeInMilliSeconds;
		this.time = timeInMilliSeconds/1000;
		var self = this;

		// Creates an interval to run the function every second. 
		// Returns a promise, which is used later to cancel the interval and to broadcast the timer end event.
		this.promise = $interval(function() {
			self.time--;
		}, 1000, self.time);

		// Broadcast the timer stopped event
		this.promise.then(function(){
			$rootScope.$broadcast(app.constant.events.timerStopped);
		}, function() {
			console.log("Timer cancelled.");
		});
	};
	Timer.prototype.restart = function() {
		this.stop();
		this.start(this.startTime);
	};
	Timer.prototype.stop = function() {
		$interval.cancel(this.promise);
	}
	return Timer;
}]);