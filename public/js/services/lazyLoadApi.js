/**
 * service: lazyLoadApi
 */
angular.module('EventApp')
    .service('lazyLoadApi', ['$window', '$q',
        function lazyLoadApi($window, $q) {
            
            function load() {
                console.log('loading script ...');
                var script = document.createElement('script')
                script.src = '//maps.googleapis.com/maps/api/js?key=AIzaSyB0thVLpzUn2BrOaEE-K7ScmSobhcAnaOQ&callback=init'
                document.head.appendChild(script)
            }

            var deferred = $q.defer()

            $window.init = function() {
                deferred.resolve()
            }

            if ($window.attachEvent) {
                $window.attachEvent('onload', load)
            } else {
                $window.addEventListener('load', load, false)
            }

            return deferred.promise
        }
    ]);