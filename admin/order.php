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
$session->forceLogin('../index.php');

if(isset($_POST['status'])){
  $order = Order::find($_GET['id']);
  $order->status = $_POST['status'];
  $order->save();
}

$user = User::find($session->getUsername());

$order = Order::with('restaurant')->find($_GET['id']);

$items = json_decode($order->items,TRUE);

 ?>
<?php getTemplate(1,'header',[]); ?>
<body>
<?php getTemplate(1,'admin_nav',[]); ?>

<div class="orderscontainer" ng-controller="PageController">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h3>Order Details</h3>
        <p>Order ID: <?= $order->id ?> </p>
        <p>Restaurant: <?= $order->restaurant->name ?></p>
        <p>Address: <?= $order->address ?></p>
        <p>Status: <span class="redtext"><?= $order->status ?></span>
        </p>
        <div class="row">
          <div class="col m6">
            <ul class="collection placeorder">
              <?php
              $total = 0;
              foreach ($items as $key => $item) {
                $total += $item['price'] * $item['order'];
                ?>
                <li class="collection-item">
                  <div class="right">
                    <div class="chip itemtotal">&#8377 <?=$item['price'] * $item['order']?></div>
                  </div>
                  <p class="inline"><?=$item['name']?> X <?=$item['order']?></p>
                </li>
                <?php
              } ?>

              <li class="collection-item">
                <div class="tot">
                  Total : <div class="chip grandtotal"> &#8377 <?=$total?></div>
                </div>
              </li>
            </ul>
            <?php if($order->status!='Delivered'){

            ?>
              <form action="order.php?id=<?=$_GET['id']?>" method="POST">
                <div class="input-field col s12">
                 <select name="status">
                   <option value="Processing">Processing</option>
                   <option value="Delivered">Delivered</option>
                 </select>
                 <label>Status</label>
               </div>
               <div class="input-field col s12">
                <input type="submit" class="waves-effect btn menubtn" value="Change Status" />
              </form>
              <?php
            }
               ?>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php getTemplate(1,'footer',[]); ?>
<script>
$(document).ready(function() {
    $('select').material_select();
  });
</script>
</body>
