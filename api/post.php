<?php

require __DIR__.'/../vendor/autoload.php';
require_once '../config.php';
require_once '../classes/boot.php';
require_once '../classes/FeedBack.php';

$out = [];
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['feedback'])){

   if(FeedBack::create($_POST)){
       $out['status'] = "success";
       $out['error'] = "none";
   }else{
       $out['status'] = "fail";
       $out['error'] = "none";
   }
}else{
       $out['status'] = "fail";
        $out['error'] = "none";
}
header('Content-type: text/plain');
echo json_encode($out);

?>
