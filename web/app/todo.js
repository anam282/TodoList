var app = angular.module("todoApp");

app.controller('TodoController', ['$scope', '$http', function($scope, $http){
	$scope.heading = "Todo List";
	$scope.todos = [];
	$scope.add = function(){
		$scope.date = new Date();
		$scope.todos.push({'task': $scope.task, 'date':$scope.date});
		$scope.task='';
	};
	$scope.done = function(todo){
		var index = $scope.todos.indexOf(todo);
		$scope.todos.splice(index, 1);
	}
}]);
