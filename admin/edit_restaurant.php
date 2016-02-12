<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';


$rest_id = $_GET['id'];
$restaurant = Restaurant::find($rest_id);
if(isset($_POST['create']))
{
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
    <form action="edit_restaurant.php?id=<?= $restaurant->id ?>" method="post">
      Name:<input type="text" name="name" value="<?= $restaurant->name ?>"><br>
      Place:<input type="text" name="place" value="<?= $restaurant->place ?>"><br>
      Min Order:<input type="text" name="min_order" value="<?= $restaurant->min_order ?>"><br>
      <input type="submit" name="create" value="Add">
    </form>
  </body>
</html>
