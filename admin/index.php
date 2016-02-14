<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

$restaurants = Restaurant::orderBy("id","desc")->get();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s12 m6 offset-m3">
    <table>
      <tr>
        <th>Name</th>
        <th>Place</th>
        <th>Links</th>
      </tr>
      <?php
      foreach($restaurants as $restaurant)
      {
      ?>
    <tr>
      <td><?= $restaurant->name ?></td>
      <td><?= $restaurant->place ?></td>
      <td>
        <a href="view_items.php?id=<?= $restaurant->id ?>"><button>View Items</button></a>
        <a href="edit_restaurant.php?id=<?= $restaurant->id ?>"><button>Edit</button></a>
        <a href="delete_restaurant.php?id=<?= $restaurant->id ?>"><button>Delete</button></a>
      </td>
    </tr>
    <?php
  }?>
    </table>
    </div>
  </div>
  <a href="create_restaurant.php"><button>Add Restaurant</button></a>
</div>
  </body>
</html>
