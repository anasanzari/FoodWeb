<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';


$rest_id = $_GET['id'];
Restaurant::destroy($rest_id);
header("location:index.php");

?>
