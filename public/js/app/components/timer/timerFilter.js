/**
 * stopWatchFilter to give the look and feel of a count down clock.
 */
app.filter("stopWatchFilter",function(){
	return function(input) {
		var secs = input%60+"";
		var minutes = (input >= 60) ? Math.floor(input/60)%60 + ":" : "0:";
		var hours = (input >= (60*60)) ? Math.floor(input/60/60) + ":" : "";
		return "" + hours + minutes + secs + "";
	}
});