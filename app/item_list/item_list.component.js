'use strict';

angular.module('itemList')
  .component('itemList', {
    templateUrl: 'item_list/item_list.template.html',
    controller: function itemController($scope, $http) {

      $scope.allItems = {};
      $http.get('api/items/index.php').then(function onSuccess( result ) {
        $scope.allItems = result.data;
      }).catch(function onError() {
        console.log('items取得エラー');
      });

      $scope.addItem = function ( inputItemName ) {
        var itemParams = {};
        itemParams.name = inputItemName;
        
        $http.post('api/items/update.php', itemParams).then(function onSuccess() {
          console.log('addItem成功');
        }).catch(function onError() {
          console.log('addItemエラー');
        });
      };
    }
  });

