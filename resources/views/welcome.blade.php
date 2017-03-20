<!DOCTYPE html>
<html >
<head>
    <title>Javascript Blog Post</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta description="This web app will certify you about how much you know about javascript.">
    <link rel="icon" href="images/favicon.png">
    
    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css">

    <script type="text/javascript" src="{{config('app.url')}}/js/lib/jquery.min.js" ></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/lib/angular.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/lib/angular-route.min.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/lib/angular-cookies.min.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/lib/ngStorage.min.js"></script>
</head>
<body ng-app="quizApp">
    <nav class="navbar navbar-default hidden-print" ng-controller="HeaderController">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Javascript Blog Post</a>
        </div>
        <!-- Collect the nav link, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="sign-in" ng-show="!isLoggedIn"><a href="#" data-toggle="modal" data-target="#signInModal">Sign in / Register </a></li>
            <li ng-show="isLoggedIn">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> </span> <span>@{{user.firstName}}</span> <span>@{{user.lastName}}</span> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a ng-click="go('/user/dashboard')">Dashboard</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a ng-click="logout()"> Logout</a>
                    </li>
                </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <signin></signin>
    <div class="container">
            <div ng-view></div>
    </div>
    
    <script type="text/javascript" src="{{config('app.url')}}/js/app/app.module.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/app.routes.js"></script>
    
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/timer/timerController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/timer/timerDirective.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/timer/timerModel.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/timer/timerFilter.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/models/questionModel.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/models/questionBankModel.js"></script>
    
    <script type="text/javascript" src="{{config('app.url')}}/js/app/services/userAuthenticationService.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/services/userTestService.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/services/UserServices.js"></script>
    
    <script type="text/javascript" src="{{config('app.url')}}/js/app/models/userModel.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/models/userTest.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/models/Test.js"></script>

    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/signin/signinController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/signin/signinDirective.js"></script>

    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/home/homeController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/home/headerController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/test/TestInstructionController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/test/TestController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/test/ResultController.js"></script>
    <script type="text/javascript" src="{{config('app.url')}}/js/app/components/user/dashboardController.js"></script>
</body>
</html>