/**
 * Creates a Question model.
 */
app.factory("Question",['$http',function($http){
	function Question (q) {
		this.id = q.id;
		this.question = q.question;
		this.options = q.options;
		this.answer = q.answer;
	}

	Question.prototype.question = null;
	Question.prototype.options = null;
	Question.prototype.answer = null;
	
	/**
	 * compares the selected options against the answer and returns true if its correct.
	 */
	Question.prototype.isCorrect = function(selectedOption) {
		return selectedOption == this.answer;
	}
	
	return Question;
}]);
