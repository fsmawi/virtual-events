/**
 * Controller: EventCtrl
 */
angular.module('EventApp')
    .controller('EventCtrl', ['$scope', 'EventFactory', '$location', 'lazyLoadApi',
        function($scope, EventFactory, $location, lazyLoadApi) {

            var map, infoWindow;
            var markers = [];

            $scope.events = [];
            $scope.title = 'Events';

            lazyLoadApi.then( getEvents );


            function getEvents() {

                if ($location.$$path == '/liveEvents') {
                    EventFactory.getliveEvents()
                        .then(function(response) {
                            displayMap(response);
                        }, function(error) {
                            console.log('Unable to load events data: ' + error.message);
                        });
                } else {
                    EventFactory.getNotStartedEvents()
                        .then(function(response) {
                            displayMap(response);
                        }, function(error) {
                            console.log('Unable to load events data: ' + error.message);
                        });
                }

            }

            function displayMap(data) {
                $scope.events = data.data;
                $scope.events = data.data.data;
                initMap();
                for (var i = 0; i < $scope.events.length; i++) {
                    setMarker(map, new google.maps.LatLng($scope.events[i].lat, $scope.events[i].long), $scope.events[i]);
                }
            }


            // init the map
            function initMap() {
                
                // map config
                var mapOptions = {
                    center: new google.maps.LatLng(40.36747, -98.05298),
                    zoom: 4,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    scrollwheel: false
                };

                if (map === void 0) {
                    map = new google.maps.Map(document.getElementById('gmaps'), mapOptions);
                }
            }

            // place a marker
            function setMarker(map, position, infos) {
                var marker;
                var markerOptions = {
                    position: position,
                    map: map,
                    title: infos.name,
                    infos: infos
                };

                marker = new google.maps.Marker(markerOptions);
                markers.push(marker); // add marker to array

                bindInfoMarker(marker, map, markerOptions.infos);
            }

            function bindInfoMarker(marker, map, infos) {
                if ($location.$$path == '/liveEvents') {
                    var urlHall = '#/liveEvent/' + infos.event_id ;
                    var btn     = 'Visite the hall event';
                }else{
                    var urlHall = '#/event/' + infos.event_id ;                    
                    var btn     = 'Book your place';
                }
                var html = '<h2>' + infos.name + '</h2>' +
                    '<p>' + infos.address + '</p>' +
                    '<p>from : ' + infos.date_begin + ' to : ' + infos.date_end + '</p>' +
                    '<p>' + infos.description + '</p>' +
                    '<a href="' + urlHall + '" class="btn btn-primary" role="button">'+btn+'</a>';

                google.maps.event.addListener(marker, 'click', function() {
                    document.getElementById('event-info').innerHTML = html;
                });
            }
        }
    ]);