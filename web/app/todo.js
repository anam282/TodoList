var app = angular.module("todoApp");

app.controller('TodoController', ['$scope', '$http', function($scope, $http){
	$scope.heading = "Todo List";
	$scope.todos = [];
	
	$scope.add = function(){
		dateCreated = new Date();
		request = {
			"name" : $scope.name, 
			"status" : "In progress", 
			"dateCreated" : dateCreated
		};
		$http.post('app_dev.php/todolist/task', JSON.stringify(request))
			.success(function(data, status, headers, config){
				request['id'] = headers('Location'); 
				$scope.todos.push(request);
				$scope.name= null;
			})
			.error(function(){
				console.log("unable to add task");
			});
	};

	$scope.delete = function(todo){

		$http.delete('app_dev.php/todolist/task/' + todo.id)
			.success(function(){
				var index = $scope.todos.indexOf(todo);
				$scope.todos.splice(index, 1);
			})
			.error(function(){
				console.log("unable to delete task");
			});
	};

	$scope.load = function(){
		$http.get('app_dev.php/todolist/task')
			.success(function(response){
				$scope.todos = response;
			})
			.error(function(){
				console.log("failed to load data");
			});
	};

	$scope.done = function(todo){
		$http.put('app_dev.php/todolist/task/' + todo.id, JSON.stringify({"status" : "Done"}))
			.success(function(){
				var index = $scope.todos.indexOf(todo);
				$scope.todos[index].status = "Done";
			})
			.error(function(){
				console.log("failed to update the status");
			});
	};
}]);
