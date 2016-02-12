<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require_once '../classes/Item.php';
require '../config.php';
require '../classes/boot.php';

$rest_id =$_GET['id'];
$items = Item::where("restaurant_id",$rest_id)->get();
$restaurant = Restaurant::find($rest_id);
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
          <h2><?= $restaurant->name ?> <small><?= $restaurant->place ?></small></h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Cuisine</th>
        <th>Price</th>
        <th>Links</th>
      </tr>
      <?php
      foreach($items as $item)
      {
      ?>
    <tr>
      <td><?= $item->name ?></td>
      <td><?= $item->cuisine ?></td>
      <td><?= $item->price ?></td>
      <td>
        <a href="edit_item.php?item_id=<?= $item->item_id ?>&&rest_id=<?= $restaurant->id ?>"><button>Edit</button></a>
        <a href="delete_item.php?item_id=<?= $item->item_id ?>&&rest_id=<?= $restaurant->id ?>"><button>Delete</button></a>
      </td>
    </tr>
    <?php
  }?>
    </table>
    </div>
  </div>
  <a href="create_item.php?id=<?= $restaurant->id ?>"><button>Add Item</button></a>
</div>
  </body>
</html>
