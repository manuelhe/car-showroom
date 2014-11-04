'use strict';

/**
 * @ngdoc function
 * @name jsappApp.controller:CarCtrl
 * @description
 * # CarCtrl
 * Controller of the jsappApp
 */
angular.module('jsappApp')
  .controller('CarCtrl', function ($scope, $http, $routeParams, $location) {

    $http.get('http://localhost:80/gaptest/public-api/cars/' + $routeParams.id)
        .success(function(data){
            $scope.car = data;
        })
        .error(function() {
            $location.path('/');
        });

  });
