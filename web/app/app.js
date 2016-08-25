var app = angular.module("todoApp", ["ngRoute"]);
app.config(function($routeProvider){
  $routeProvider
  .when("/", {
        templateUrl : "app/html/todo.html",
        controller : "TodoController"
    });
});
