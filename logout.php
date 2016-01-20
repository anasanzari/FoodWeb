<?php
require_once './classes/session.php';
$session = new Session();
$session->logOut();
header('Location: ./index.php');

 ?>
