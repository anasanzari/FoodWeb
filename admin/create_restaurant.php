<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

if(isset($_POST['create']))
{
  $restaurant = new Restaurant;
  $restaurant->name = $_POST['name'];
  $restaurant->place = $_POST['place'];
  $restaurant->min_order = $_POST['min_order'];
  $restaurant->save();
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="create_restaurant.php" method="post">
      Name:<input type="text" name="name"><br>
      Place:<input type="text" name="place"><br>
      Min Order:<input type="text" name="min_order"><br>
      <input type="submit" name="create" value="Add">
    </form>
  </body>
</html>
