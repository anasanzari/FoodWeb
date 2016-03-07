<?php
require_once '../classes/session.php';
require '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

$session = new Session();
$session->adminForceLogin("../index.php");

$restaurants = Restaurant::orderBy("id","desc")->get();
?>

  <?php getTemplate(1,'header',[]); ?>

  <body>
    <?php getTemplate(1,'admin_nav',[]); ?>
  <div class="admincontainer">
    <div class="container">
      <div class="row">

        <div class="col s12 m8 offset-m2">
          <h2>Restaurants</h2>
          <ul class="collection">
            <?php
          foreach($restaurants as $restaurant)
          {
            ?>
            <li class="collection-item restaurant">
              <div class="menu">
                <a href="view_items.php?id=<?= $restaurant->id ?>"  title="view">
                  <i class="fa fa-m fa-round fa-list"></i>
                </a>
                <a href="edit_restaurant.php?id=<?= $restaurant->id ?>" title="edit">
                  <i class="fa fa-m fa-round fa-edit"></i>
                </a>
                <a href="delete_restaurant.php?id=<?= $restaurant->id ?>" title="delete">
                  <i class="fa fa-m fa-round fa-close"></i>
                </a>
              </div>
              <div class="img-wrap">
                <img src="../<?=$restaurant->img?>" class="img-responsive" />
              </div>
              <h4 class="line1"><?= $restaurant->name ?></h4>
              <!--h4 class="line2"><?= $restaurant->place ?></h4-->
              <div class="chip"><?= $restaurant->place ?></div>
              <div class="chip">Min Order: &#8377 <?= $restaurant->min_order ?> </div>
            </li>
        <?php }
        ?>

          </ul>

          <a href="create_restaurant.php" title="Add Restaurant">
            <i class="fa fa-m fa-round fa-plus"></i>
          </a>

        </div>
      </div>

    </div>
  </div>

    <?php getTemplate(1,'footer',[]); ?>

  </body>

  </html>
