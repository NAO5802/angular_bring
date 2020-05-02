'use strict';

angular.module('angular_bring')
  .controller('itemController', function itemController($scope) {
    $scope.addItem = function (item) {
      console.log('success');
    };
  });
