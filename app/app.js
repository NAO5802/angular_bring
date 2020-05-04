'use strict';

angular.module('angular_bring', [])
  .controller('itemController', [ '$scope', '$http', function itemController($scope, $http) {
      
      $scope.addItem = function ( inputItemName ) {
        
        var itemParams = {};
        itemParams.name = inputItemName;
        
        $http.post('api/items/update.php', itemParams).then(function onSuccess( data ) {
          console.log('成功');
          console.log(data);
        }).catch(function onError() {
          console.log('エラー');
        });
      };
      
    }]);
