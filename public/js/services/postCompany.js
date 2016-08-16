/**
 * service: postCompany
 */
angular.module('EventApp')
    .service('postCompany', ['$http', '$location',
        function($http, $location) {
            this.submitFormComapny = function(dataForm) {
                var uploadUrl = '/api/v1/stands/' + dataForm.stand_id + '/company';
                var fd = new FormData();

                fd.append('name', dataForm.name);
                fd.append('address', dataForm.address);
                fd.append('description', dataForm.description);
                fd.append('phone', dataForm.phone);
                fd.append('admin_email', dataForm.admin_email);
                fd.append('admin_full_name', dataForm.admin_name);
                fd.append('logo_url', dataForm.logo);
                fd.append('marketing_document', dataForm.document);


                $http.post(uploadUrl, fd, {
                    transformRequest: angular.identity,
                    headers: {
                        'Content-Type': undefined,
                        'X-Authorization': API_KEY
                    }
                })
                    .success(function(response) {
                        if (response.status === 'OK') {
                            $http.get('/api/v1/stands/' + dataForm.stand_id, {
                                headers: {
                                    'X-Authorization': API_KEY
                                }
                            })
                                .then(function(response) {
                                    $location.path('/event/'+response.data.data.event_id);
                                }, function(error) {
                                    $location.path('/events');
                                });

                        } else {
                            alert(response.message);
                        }
                    })
                    .error(function(response) {
                        console.log('KO')
                    });
            }
        }
    ]);