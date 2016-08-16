<!DOCTYPE html>
<html ng-app="EventApp" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Virtual exposition</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    @yield('js')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Virtual exposition
                </a>
                <ul class="nav navbar-nav">
                    <li><a ng-href="events">Home</a></li>
                    <li><a ng-href="liveEvents">Live Events</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <ng-view></ng-view>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="lib/angular/angular.min.js"></script>
    <script src="lib/angular-modal-service/dst/angular-modal-service.min.js"></script>
    <script src="lib/angular/angular-route-v1.2.22.js"></script>
    <script src="lib/angular/angular-sanitize-v1.2.22.js"></script>
    
    <!-- Application Files -->
    <script src="js/app.js"></script>
    <script src="js/controllers/EventCtrl.js"></script>
    <script src="js/controllers/CompanyCtrl.js"></script>
    <script src="js/controllers/StandCtrl.js"></script>
    <script src="js/controllers/StandLiveCtrl.js"></script>
    <script src="js/factories/EventFactory.js"></script>
    <script src="js/factories/StandFactory.js"></script>
    <script src="js/services/postCompany.js"></script>
    <script src="js/services/lazyLoadApi.js"></script>
    <script src="js/directives/fileModel.js"></script>
</body>
</html>
