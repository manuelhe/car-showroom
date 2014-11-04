'use strict';

/**
 * @ngdoc function
 * @name jsappApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the jsappApp
 */
angular.module('jsappApp')
  .controller('AboutCtrl', function ($scope) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
  });
