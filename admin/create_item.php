<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Item.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

$rest_id =$_GET['id'];
if(isset($_POST['create']))
{
  $item = new Item;
  $item->name = $_POST['name'];
  $item->cuisine = $_POST['cuisine'];
  $item->price = $_POST['price'];
  $item->restaurant_id = $rest_id;
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
    <form action="create_item.php?id=<?= $rest_id ?>" method="post">
      Name:<input type="text" name="name"><br>
      Cuisine:<input type="text" name="cuisine"><br>
      Price:<input type="text" name="price"><br>
      <input type="submit" name="create" value="Add">
    </form>
  </body>
</html>
