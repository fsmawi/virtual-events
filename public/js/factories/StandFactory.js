/**
 * Factory: StandFactory
 */
angular.module('EventApp')
    .factory('StandFactory', ['$http', function($http) {

    var urlBase = '/api/v1';
    var standFactory = {};

    standFactory.getStands = function (id) {
        return $http.get(urlBase+'/events/'+id, {
          headers: { 'X-Authorization': API_KEY }
        })
    };

    standFactory.setVisitor = function (id) {

        var fd = new FormData();
        fd.append('ip','0.0.0.0');

        return $http.post(urlBase+'/stands/'+id+'/visitors', fd, {
                    transformRequest: angular.identity,
                    headers: {
                        'Content-Type': undefined,
                        'X-Authorization': API_KEY
                    }
                });
    };

    return standFactory;
}]);