'use strict';

/**
 * @ngdoc function
 * @name jsappApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the jsappApp
 */
angular.module('jsappApp')
  .controller('MainCtrl', function ($scope, $http) {
     $http.get('http://localhost:80/gaptest/public-api/cars').success(function(data) {
        $scope.cars = data;
    });

  });
