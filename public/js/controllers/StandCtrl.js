/**
 * Controller: StandCtrl
 */
angular.module('EventApp')
    .controller('StandCtrl', ['$scope', '$routeParams', 'StandFactory', 'ModalService', '$location',
        function($scope, $routeParams, StandFactory, ModalService, $location) {

            $scope.status = '';
            $scope.stands = [];
            $scope.title = 'Event details';

            getStands();

            function getStands() {
                StandFactory.getStands($routeParams.id)
                    .then(function(response) {
                        $scope.stands = response.data;
                        $scope.title =  $scope.stands.data.name;
                    }, function(error) {
                        $scope.status = 'Unable to load events data: ' + error.message;
                    });
            }

            $scope.displayData = function(stand) {
                ModalService.showModal({
                    templateUrl: 'modal.html',
                    controller: function() {
                        this.stand = stand;
                        this.close = function(result) {
                            close(result, 500);
                        };
                        this.reseve = function(stand) {
                            $('.modal-backdrop').remove();
                            close(null, 500);
                            $location.path('/stand/'+stand.stand_id+'/register');
                        };
                    },
                    controllerAs : "ctrl"
                }).then(function(modal) {
                    modal.element.modal();
                    modal.close.then(function(result) {
                        $scope.message = "You said " + result;
                    });
                });
            
            };
        }
    ]);