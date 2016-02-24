<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require '../config.php';
require '../classes/boot.php';
require_once '../classes/Item.php';
require_once '../classes/Restaurant.php';
require_once '../classes/User.php';
require_once '../classes/Order.php';

$session = new Session();
$session->adminForceLogin("../index.php");

$orders = Order::with('restaurant')->where('status','Processing')->orderBy('id','desc')->get();

$delivered = Order::with('restaurant')->where('status','Delivered')->orderBy('id','desc')->get();

 ?>
<?php getTemplate(1,'header',[]); ?>
<body>
<?php getTemplate(1,'admin_nav',[]); ?>

<div class="orderscontainer" ng-controller="PageController">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h3>New Orders</h3>
        <?php if(sizeof($orders)>0){ ?>
          <ul class="collection">
            <?php
            foreach ($orders as $key => $value) {
              ?>
              <li class="collection-item">
                <div class="chip">Order ID: <?=$value->id?></div>
                <?=$value->restaurant->name?>
                <a href="./order.php?id=<?=$value->id?>" class="waves-effect btn menubtn">Details</a>
              </li>
              <?php
            }
          }else{ ?>
            <p class="alert">No New Orders.</p>
          <?php
          }?>
          </ul>
      <?php if(sizeof($delivered)>0){ ?>
        <h3>Delivered Orders</h3>
        <ul class="collection">
          <?php
          foreach ($delivered as $key => $value) {
            ?>
            <li class="collection-item">
              <div class="chip">Order ID: <?=$value->id?></div>
              <?=$value->restaurant->name?>
              <a href="./order.php?id=<?=$value->id?>" class="waves-effect btn menubtn">Details</a>
            </li>
            <?php
          }
        }?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php getTemplate(1,'footer',[]); ?>
<script>

</script>
</body>
