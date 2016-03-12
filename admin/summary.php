<?php
require_once '../classes/session.php';
require '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';
require '../classes/Order.php';

$session = new Session();
$session->adminForceLogin("../index.php");

$restaurants = Restaurant::orderBy("id","desc")->get();

$orders = Order::with('restaurant')->where('status','Delivered')->orderBy('rest_id')->get();

$colours = ['#97BBCD', '#DCDCDC', '#F7464A', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360', '#1CBB9B',
    '#2DCC70', '#3598DB', '#AE7AC4', '#354A5F', '#F2C311', '#E67F22', '#E84C3D', '#ED2458', '#2D54B8',
    '#15B35C', '#F88505', '#FBBF4F', '#C1A985', '#FF6F69', '#BF235E', '#FF3155', '#49F770', '#FF3155',
    '#BA097D', '#F49600', '#1AA3A3', '#EA0F23', '#6C5871', '#C2CF99'];

$totals = [];
$data ="[";
$current = $orders[0]->rest_id;
$c_rest =  $orders[0]->restaurant->name;
$c_count = 0;
$c_total = 0;


$count = 0;
foreach ($orders as $key => $value) {

  if(($current != $value->rest_id)||$key==(sizeof($orders)-1)){
    $val =  ['count'=>$c_count,'total'=>$c_total,'restaurant'=>$c_rest];
    $data .=  '{value: '.$c_total.',color: "'.$colours[$count%sizeof($colours)].'",highlight: "'.$colours[$count%sizeof($colours)].'",label:"'.$c_rest.'"},';
    $totals[] =$val;
    $c_count = 0;
    $c_total = 0;
    $current = $value->rest_id;
    $c_rest = $value->restaurant->name;
    $count++;
  }
  $c_count++;
  $items = json_decode($value->items,TRUE);
  foreach ($items as $key => $item) {
    $c_total += $item['price'] * $item['order'];
  }
}
if(sizeof($orders)>0){
  $val =  ['count'=>$c_count,'total'=>$c_total,'restaurant'=>$c_rest];
  $data .=  '{value: '.$c_total.',color:"'.$colours[$count%sizeof($colours)].'",highlight: "'.$colours[$count%sizeof($colours)].'",label:"'.$c_rest.'"}]';

  $totals[] =$val;
}

?>

  <?php getTemplate(1,'header',[]); ?>

  <body>
    <?php getTemplate(1,'admin_nav',[]); ?>
  <div class="admincontainer summary">
    <div class="container">

      <div class="row">

        <div class="col s12 m4">
          <h2>Summary</h2>
          <?php if(sizeof($orders)<=0){ ?>
            <p class="alert">No Data to generate summary.</p>
          <?php } ?>  
            <canvas id="myChart" width="250" height="250"></canvas>
        </div>
        <div class="col s12 m8" style="padding-top:100px">

          <?php if(sizeof($orders)>0){ ?>
            <ul class="collection">
              <li class="collection-item">
                <span>Restaurants</span>
                <span>Total Orders</span>
                <span>Total Amount</span>
              </li>
              <?php
              foreach ($totals as $key => $value) {
                ?>
                <li class="collection-item">
                  <span><?=$value['restaurant']?></span>
                  <span><?=$value['count']?></span>
                  <span> &#8377 <?=$value['total']?></span>
                </li>
                <?php
              }
            }else{ ?>
            <?php
            }?>
            </ul>


        </div>
      </div>

    </div>
  </div>

    <?php getTemplate(1,'footer',[]); ?>
    <script src="../public/js/Chart.min.js"></script>
    <script>
    var data = <?=$data?>

      var ctx = document.getElementById("myChart").getContext("2d");
      var myDoughnutChart = new Chart(ctx).Doughnut(data);
    </script>

  </body>

  </html>
