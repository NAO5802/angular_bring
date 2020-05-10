'use strict';

angular.module('itemList')
  .component('itemList', {
    templateUrl: 'item_list/item_list.template.html',
    controller: function itemController($scope, $http) {

      $scope.init = function() {
        $scope.getAllItems();
      }

      $scope.getAllItems = function() {
        $scope.allItems = {};
        $http.get('api/items/read.php').then(function onSuccess( result ) {
          $scope.allItems = result.data;
        }).catch(function onError() {
          console.log('items取得エラー');
        });
      }

      $scope.addItem = function ( inputItemName ) {
        var itemParams = {};
        itemParams.name = inputItemName;
        $http.post('api/items/create.php', itemParams).then(function onSuccess() {
          console.log('addItem成功');
        }).catch(function onError() {
          console.log('addItemエラー');
        });
        $scope.inputItemName = '';
        $scope.init();
      };

      $scope.changeItemStatus = function ( item ) {
        var itemParams = {};
        itemParams.item = item;
        itemParams.updateKind = 'changeItemStatus';

        $http.put('api/items/update.php', itemParams).then(function onSuccess() {
          console.log('archive成功');
        }).catch(function onError() {
          console.log('archiveエラー');
        });
      };

      // itemController読み込み時に実行
      $scope.init();
    }
  });

