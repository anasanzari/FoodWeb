<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require_once '../classes/User.php';
require_once '../classes/Item.php';
require '../config.php';
require '../classes/boot.php';

$session = new Session();
$session->forceLogin('../index.php');

$user = User::find($session->getUsername());

$rest_id =$_GET['id'];
$items = Item::where("restaurant_id",$rest_id)->get();
$restaurant = Restaurant::find($rest_id);

?>

<?php getTemplate(1,'header',[]); ?>

<body ng-app="app">
  <?php include './includes/nav.php'; ?>
  <div class="customercontainer" ng-controller="PageController">
    <div class="">
      <div class="row">
        <div class="col s12 m6 offset-m1">
          <h4><?= $restaurant->name ?> <small><?= $restaurant->place ?></small></h4>
          <h3>Menu</h3>
          <ul class="collection">

            <li class="collection-item restaurant" ng-repeat="item in menu">

              <a class="order" href="#" ng-click="add($index)" title="add"><i class="fa fa-s fa-round fa-plus"></i></a>
              <a class="order" ng-show="item.order>0" href="#" ng-click="minus($index)" title="add"><i class="fa fa-s fa-round fa-minus"></i></a>

              <h4 class="line1">{{item.name}}</h4>
              <div class="chip">{{item.cuisine}}</div>
              <div class="chip"> &#8377 {{item.price}} </div>

            </li>
          </ul>

      </div>

      <div class="col s12 m4">
        <div class="orderbox" ng-show="total>0">
        <h4>Order Details</h4>
        <ul class="collection placeorder">
          <li class="collection-item" ng-repeat="item in menu | filter:positive">
            <div class="right">
              <div class="chip itemtotal">&#8377 {{item.price * item.order}}</div>
            </div>
            <p class="inline">{{item.name}} X {{item.order}}</p>
          </li>

          <li class="collection-item">
            <div class="left">Min Order: <?=$restaurant->min_order ?></div>
            <div class="tot">
              Total : <div class="chip grandtotal"> &#8377 {{total}}</div>
            </div>
          </li>

        </ul>
        <div class="input-field col s12">
          <textarea ng-model="address" class="materialize-textarea"><?=$user->address?></textarea>
          <label>Address</label>
        </div>
        <div class="input-field col s12">
          <button class="waves-effect waves-light btn" href="#" ng-click="order()" ng-disabled="total<minorder||address==''">Order</button>
        </div>

      </div>
    </div>

    </div>
  </div>

    <?php getTemplate(1,'footer',[]); ?>

    <script src="../public/js/angular.min.js"></script>
    <script src="../public/js/angular-resource.min.js"></script>
    <script>

    function error(r){
      console.log(r);
      var v;
      for(var key in r){
        v+=r[key];
      }
      alert(v);
    }

      var app = angular.module('app',['ngResource']);
      app.factory('Api',function ($resource) {
          return $resource("../api/api.php", {},
          {
              get:{method:'GET', cache:false,isArray:false},
              getArray:{method:'GET', cache:false,isArray:true},
              post: {method:'POST',cache:false,isArray:false},
          });
      });

      app.controller('PageController',function(Api,$scope){
        $scope.name = "Hello";
        $scope.rest_id = <?=$_GET['id']?>;
        $scope.address = "";
        $scope.minorder = <?=$restaurant->min_order?>;

        Api.getArray({query: 'menu',id:$scope.rest_id}, function (response) {
            $scope.menu = response;
            for(var i=0;i<response.length;i++){
              $scope.menu[i].order = 0;
            }
            console.log(response);
        });
        $scope.total = 0;
        $scope.add = function(index){
          $scope.menu[index].order++;
          $scope.calculate();
        }

        $scope.minus = function(index){
          if($scope.menu[index].order<=0) return;
          $scope.menu[index].order--;
          $scope.calculate();
        }


        $scope.calculate = function(){
          $scope.total = 0;
          for(var i=0;i<$scope.menu.length;i++){
              $scope.total += $scope.menu[i].order * $scope.menu[i].price;
          }
        }
        $scope.positive = function(val,index,array){
          if(val.order>0){
            return true;
          }else{
            return false;
          }
        }

        $scope.order = function(){
          if($scope.address==""||$scope.total<=0){
            return;
          }
          var r = new Api();
          r.rest_id = $scope.rest_id;
          r.address = $scope.address;
          var details = [];
          for (var i=0;i<$scope.menu.length;i++) {
            var obj = $scope.menu[i];
            if(obj.order>0){
              details.push({item_id:obj.item_id,name:obj.name,price:obj.price,order:obj.order});
            }
          }
          //var json = {startDate:$scope.start,endDate:$scope.end,details:details};
          r.items = JSON.stringify(details);
          r.post = 'order';
          r.$post({},function(response){
            console.log(response);
            //error(response);
            window.location.href="./order.php?id="+response.id;
            $scope.isgenerated = false;
          },function(response){
            console.log(response);
          })
        }

      });
    </script>

  </body>

  </html>
