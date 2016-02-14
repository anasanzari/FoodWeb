<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
$session = new Session();
$session->forceLogin('../index.php');
require_once '../classes/Restaurant.php';
require_once '../classes/Item.php';
require_once '../classes/Order.php';
 require_once '../classes/Orderitem.php';
 require '../config.php';
 require '../classes/boot.php';

$res_id = $_GET['id'];
if(!isset($_POST['order']))
{
  header("location:menu.php?id=$res_id");
}
else
{

 $id = $_POST['itemid'];
 $order = new Order;
 $order->user_id = $_SESSION['username'];
 $order->price = $_POST['price'];
 $order->save();
   foreach($id as $id)
   {
     if($_POST[$id]!=0)
     {
         $item = Item::find($id);
         $ordered = new Orderitem;
         $ordered->order_id = $order->id;
         $ordered->item_name = $item->name;
         $ordered->quantity = $_POST[$id];
         $ordered->save();
     }
   }
   header("location:menu.php?id=$res_id");
}
?>
