<div class="container">
  
  <div class="input-group flex-nowrap">
    <div class="input-group-prepend">
      
      <span class="input-group-text" id="addon-wrapping">+</span>
    </div>
    <input type="text" class="form-control" placeholder="What would you like to buy?" ng-model="inputItemName" aria-describedby="addon-wrapping">
  </div>
  
  <div class="row row-cols-2"  ng-show="inputItemName">
    <div class="card text-white bg-info mb-3 text-center mt-1 mr-1" style="max-width: 12rem; max-height: 14rem;" ng-click="addItem( inputItemName );">
      <div class="card-body">
        <h5 class="card-title" style="min-height: 7em;"></h5>
        <h5 class="card-title">  {{ inputItemName }} </h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  
  <div class="row row-cols-2"  ng-hide="inputItemName"> 
    <div class="card text-white bg-danger mb-3 text-center mt-1 mr-1" style="max-width: 12rem; max-height: 14rem;" ng-repeat="item in allItems" ng-if="item.is_archive == 0">
      <div class="card-body" ng-click="changeItemStatus( item );">
        <h5 class="card-title" style="min-height: 7em;"></h5>
        <h5 class="card-title">  {{ item.name }} </h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>
  
  <h2 ng-hide="inputItemName">Recently Used</h2>
  <div class="row row-cols-2"  ng-hide="inputItemName"> 
    <div class="card text-white bg-info mb-3 text-center mt-1 mr-1" style="max-width: 12rem; max-height: 14rem;" ng-repeat="item in allItems" ng-if="item.is_archive == 1">
      <div class="card-body" ng-click="changeItemStatus( item );">
        <h5 class="card-title" style="min-height: 7em;"></h5>
        <h5 class="card-title">  {{ item.name }} </h5>
        <p class="card-text"></p>
      </div>
    </div>
  </div>

</div>

