<!DOCTYPE html>
<html>
<head>
    <!--Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body ng-app="indiqueApp">
<div class="container-fluid">

    <ng-view></ng-view>
</div>
<script src="js/app.js"></script>
<script src="js/controllers/ClienteCtrl.js"></script>
</body>
</html>