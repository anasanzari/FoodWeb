<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require_once '../classes/Item.php';
require '../config.php';
require '../classes/boot.php';


$item_id = $_GET['item_id'];
$rest_id = $_GET['rest_id'];
Item::destroy($item_id);
header("location:view_items.php?id=$rest_id");

?>
