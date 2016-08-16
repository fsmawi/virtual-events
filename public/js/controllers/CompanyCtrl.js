/**
 * Controller: CompanyCtrl
 */
angular.module('EventApp')
    .controller('CompanyCtrl', ['$scope', 'postCompany', '$routeParams',
        function($scope, postCompany, $routeParams) {
            'use strict';

            $scope.submitForm = function() {

                // check to make sure the form is completely valid
                if ($scope.companyForm.$valid) {
                    var dataForm = {
                        stand_id: $routeParams.id,
                        name: $scope.name,
                        address: $scope.address,
                        description: $scope.description,
                        phone: $scope.phone,
                        admin_email: $scope.admin_email,
                        admin_name: $scope.admin_name,
                        logo: $scope.logo,
                        document: $scope.document,
                    };

                    postCompany.submitFormComapny(dataForm);

                }

            };


        }
    ]);