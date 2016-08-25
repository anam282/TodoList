<!DOCTYPE html>

<?php
// We use a generic page title. Later on, after we know which page we intend to display, the title may be
// updated to something more relevant and specific
$title = 'Todo List';

?>

<html lang="en" ng-app="todoApp">
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>

    <link href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Libs -->

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <!-- jQuery -->
    <script src="//code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- jQuery libs -->

    <!-- Angular -->
    <script src="//code.angularjs.org/1.4.3/angular.js"></script>
    <script src="//code.angularjs.org/1.4.3/angular-route.min.js"></script>
    <script src="//code.angularjs.org/1.4.3/angular-resource.min.js"></script>
    <script src="//code.angularjs.org/1.4.3/angular-cookies.min.js"></script>
    <script src="//code.angularjs.org/1.4.3/angular-sanitize.min.js"></script>

    <!-- Angular libs -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <!-- Application -->
    <script src="app/app.js"></script>
    <script src="app/todo.js"></script>

</head>
<body>
    <div ng-view class="row"></div>
</body>
</html>
