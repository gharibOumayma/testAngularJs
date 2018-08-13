<?php

//index.php

session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Connexion</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <style>
  .form_style
  {
   width: 400px;
   margin: auto;
   padding-top: 150px;


  }
  .btn{
    color: #fff;
    background-color:  #a6ff4d;
    width: 120px;
    font-size: 18px;
  }
  .btn-link{
    color: #fff;
    font-size: 18px;
  }
  .panel-transparent {
        background: none;
    }

    .panel-transparent .panel-heading{
        background: rgba(122, 130, 136, 0.2)!important;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.2)!important;
    }
          body {
            background-color:#000;
            background-image: url(https://inra-dam-front-resources-cdn.brainsonic.com/ressources/afile/410683-37dbd-picture_client_format_2-prospective-agriculture-futur.jpg);
            width: 100%;
            height: 100%;
            position: absolute;
            background-size: cover;
            font-family:Lato;*/
            
        }
  </style>
 </head>
 <body>
               <nav class="navbar navbar-default">
               <div class="container-fluid">
               <div class="container">
                   <div class="navbar-header">
                   <a class="navbar-brand" href="http://localhost/testAngularJs/home.html">BeePhyto</a>
                   </div>
               <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Connexion<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="http://localhost/testAngularJs/LoginAdmin/index.php#">Administrateur</a></li>
            <li class="divider"></li>
            <li><a href="#">À propos</a></li>
          </ul>
        </li>
                </ul>
               </div> 
               </div>
               </div>
              </nav>
  <br />
   <!--<h3 align="center">Welcome!!</h3>-->
  <br />

  <div ng-app="login_register_app" ng-controller="login_register_controller" class="container form_style">
   <?php
   if(!isset($_SESSION["name"]))
   {
   ?>
   <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
    <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
    {{alertMessage}}
   </div>

   <div class="panel  panel-transparent" ng-show="login_form" align="center" >
    <div class="panel-heading">
     <!--<h3 class="panel-title" style="font-size:200%;"><font color="#cc7a00">Login</font></h3>-->
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitLogin()">
      <div class="form-group">
       <input type="text" name="email" ng-model="loginData.email" class="form-control"  placeholder="Email" />
      </div>
      <div class="form-group">
       <input type="password" name="password" ng-model="loginData.password" class="form-control" placeholder="Password" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="login" class="btn" value="Login"/>
       <br />
     <!--  <input type="button" name="register_link" class="btn-link" ng-click="showRegister()" value="Register" />  -->
      </div>
     </form>
    </div>
   </div>

   <div class="panel panel-transparent" ng-show="register_form">
    <div class="panel-heading">
     <!--<h3 class="panel-title">Register</h3>-->
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <input type="text" name="name" ng-model="registerData.name" class="form-control" placeholder="Name" />
      </div>
      <div class="form-group">
       <input type="text" name="email" ng-model="registerData.email" class="form-control" placeholder="Email" />
      </div>
      <div class="form-group">
       <input type="password" name="password" ng-model="registerData.password" class="form-control" placeholder="Password" />
      </div>
      <div class="form-group" align="center">
       <input type="submit" name="register" class="btn" value="Register" />
       <br />
       <input type="button" name="login_link" class="btn-link" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <?php
   }
   else
   {
   ?>
   <div class="panel panel-transparent">
    <div class="panel-heading">
     <!--<h3 class="panel-title">Welcome to system</h3>-->
    </div>
    <div class="panel-body">
     <h1><font color="#fff">Welcome to BeePhyto - <?php echo $_SESSION["name"];?> -</font></h1>
     <a href="logout.php" class="btn"><font color="#fff">Logout</font></a>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <a class="btn" href="http://localhost/testAngularJs/Actualites/index.html"><font color="#fff">Next &raquo;</font></a>
    </div>
   </div>
   <?php
   }
   ?>

  </div>
 </body>
</html>

<script>
var app = angular.module('login_register_app', []);
app.controller('login_register_controller', function($scope, $http){
 $scope.closeMsg = function(){
  $scope.alertMsg = false;
 };

 $scope.login_form = true;

 $scope.showRegister = function(){
  $scope.login_form = false;
  $scope.register_form = true;
  $scope.alertMsg = false;
 };

 $scope.showLogin = function(){
  $scope.register_form = false;
  $scope.login_form = true;
  $scope.alertMsg = false;
 };

 $scope.submitRegister = function(){
  $http({
   method:"POST",
   url:"register.php",
   data:$scope.registerData
  }).success(function(data){
   $scope.alertMsg = true;
   if(data.error != '')
   {
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    $scope.alertClass = 'alert-success';
    $scope.alertMessage = data.message;
    $scope.registerData = {};
   }
  });
 };

 $scope.submitLogin = function(){
  $http({
   method:"POST",
   url:"login.php",
   data:$scope.loginData
  }).success(function(data){
   if(data.error != '')
   {
    $scope.alertMsg = true;
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    location.reload();
   }
  });
 };

});
</script>