<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Item.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

$rest_id =$_GET['rest_id'];
$item_id = $_GET['item_id'];
$item = Item::find($item_id);

if(isset($_POST['create']))
{
  $item->name = $_POST['name'];
  $item->cuisine = $_POST['cuisine'];
  $item->price = $_POST['price'];
  $item->save();
  header("location:view_items.php?id=$rest_id");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="edit_item.php?item_id=<?= $item->item_id ?>&&rest_id=<?= $rest_id ?>" method="post">
      Name:<input type="text" name="name" value="<?= $item->name ?>"><br>
      Cuisine:<input type="text" name="cuisine" value="<?= $item->cuisine ?>"><br>
      Price:<input type="text" name="price" value="<?= $item->price ?>"><br>
      <input type="submit" name="create" value="Add">
    </form>
  </body>
</html>
