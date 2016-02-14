<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require_once '../classes/Item.php';
require '../config.php';
require '../classes/boot.php';

$session = new Session();
$session->forceLogin('../index.php');

$rest_id =$_GET['id'];
$items = Item::where("restaurant_id",$rest_id)->get();
$restaurant = Restaurant::find($rest_id);

?>

<?php getTemplate(1,'header',[]); ?>

<body>
  <?php include './includes/nav.php'; ?>
  <div class="customercontainer">
    <div class="container">
      <div class="row">

        <div class="col s12 m8 offset-m2">
          <h4><?= $restaurant->name ?> <small><?= $restaurant->place ?></small></h4>
          <h3>Menu</h3>
          <ul class="collection">
            <?php
          foreach($items as $item)
          {
            ?>
            <li class="collection-item restaurant">
              <h4 class="line1"><?= $item->name ?></h4>
              <div class="chip"><?= $item->cuisine ?></div>
              <div class="chip"> &#8377 <?= $item->price ?> </div>
            </li>
        <?php }
        ?>

          </ul>
      </div>

    </div>
  </div>

    <?php getTemplate(1,'footer',[]); ?>

  </body>

  </html>
