angular.module('EventApp', [
  'ngRoute', 'angularModalService'
]).config(function ( $routeProvider ) {
  
  'use strict';

  $routeProvider
    .when('/events', {
      templateUrl: 'views/events.html',
      controller: 'EventCtrl',
      controllerAs: 'event'
    })
    .when('/liveEvents', {
      templateUrl: 'views/events.html',
      controller: 'EventCtrl',
      controllerAs: 'event'
    })
    .when('/event/:id', {
      templateUrl: 'views/hall.html',
      controller: 'StandCtrl'
    })
    .when('/liveEvent/:id', {
      templateUrl: 'views/hall-live.html',
      controller: 'StandLiveCtrl'
    })
    .when('/stand/:id/register', {
      templateUrl: 'views/register.html',
      controller: 'CompanyCtrl'
    })
    .otherwise({
      redirectTo: '/events'
    });
}).run(function($rootScope){
  $rootScope.$on('$routeChangeError', function(event, current, previous, rejection){
    console.log(event, current, previous, rejection)
  })
});