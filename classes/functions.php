<?php

function getTemplate($level,$name,$params=[]){
   $s = "";
   if($level==0){
     $s = "./"; // current directory
   }else{
     for ($i=0; $i < $level ; $i++) {
       $s .= "../";
     }
   }
   require_once $s."includes/$name.php";
}

 ?>
