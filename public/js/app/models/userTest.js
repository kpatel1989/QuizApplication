/**
 * Creates a UserTest model to save the quiz for a user.
 */
app.factory("UserTest",["$http", function($http){
	var UserTest = function(userTestData) {
		this.user = userTestData ? userTestData.user : null;
		this.score = 0;
		this.attemptedQuestions = {};
	}
	UserTest.prototype.userId = null;
	UserTest.prototype.testId = null;
	UserTest.prototype.score = null;
	UserTest.prototype.attemptedQuestions = {};

	/**
	 * Returns the list of selectedOptions
	 */
	UserTest.prototype.getSelectedOptions = function() {
		return this.attemptedQuestions;
	};

	/**
	 * Returns the selected option for the given question.
	 */
	UserTest.prototype.getSelectedOption = function(questionId) {
		return this.attemptedQuestions[questionId];
	};

	/**
	 * saves the score computed in the question bank model.
	 */
	UserTest.prototype.setScore = function(score) {
		this.score = score;
	};

	/**
	 * Returns the score.
	 */
	UserTest.prototype.getScore = function() {
		return this.score;
	};

	/**
	 * Converts the UserTest Model into a json object.
	 */
	UserTest.prototype.toJSON = function() {
		return {
			id : this.id,
			testId : this.testId,
			score : this.score,
			attemptedQuestions : this.attemptedQuestions,
			user: (this.user ? this.user.toJSON() : null)
		}
	}
	return UserTest;
}])