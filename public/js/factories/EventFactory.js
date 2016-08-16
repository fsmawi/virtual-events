/**
 * Factory: EventFactory
 */
angular.module('EventApp')
    .factory('EventFactory', ['$http', function($http) {

    var urlBase = '/api/v1';
    var eventFactory = {};

    eventFactory.getliveEvents = function () {
        return $http.get(urlBase+'/live_events', {
          headers: { 'X-Authorization': API_KEY }
        })
    };

   eventFactory.getNotStartedEvents = function () {
        return $http.get(urlBase+'/events', {
          headers: { 'X-Authorization': API_KEY }
        })
    };

    return eventFactory;
}]);