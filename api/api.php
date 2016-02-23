<?php

require __DIR__.'/../vendor/autoload.php';
require '../config.php';
require_once '../classes/session.php';
require '../classes/boot.php';
require '../classes/functions.php';
require_once '../classes/User.php';
require_once '../classes/Item.php';
require_once '../classes/Restaurant.php';
require_once '../classes/Order.php';

$session = new Session();

if(!$session->getLoggedin()){
  setStatus($out,'fail','Login required.');
}

$user = User::find($session->getUsername());

$data = file_get_contents("php://input");
$data = json_decode($data,TRUE);

$out = [];

if(isset($data['post'])){
  $type = $data['post'];
  switch ($type) {
      case 'order' : $out = order($data); break;
          break;
      default: setStatus($out,'fail','invalid type.');
          break;
  }


}else{
  //get request
  if (isset($_GET['query'])) {
        $type = $_GET['query'];
        switch ($type) {
            case 'menu' : $out = menu();
                break;
            default: setStatus($out,'fail','invalid type.');
                break;
        }

  } else {
      setStatus($out,'fail','query not set.');
  }

}

header('Content-type: text/plain');
echo json_encode($out, JSON_PRETTY_PRINT);


function setStatus($out,$msg,$error=NULL){
  $out['status'] = $msg;
  if(!is_null($error)){
    $out['error'] = $error;
  }
}

function menu(){
  $rest_id = $_GET['id'];
  $items = Item::where("restaurant_id",$rest_id)->get();
  return $items;
}
function logger() {
    $queries = \Illuminate\Database\Capsule\Manager::getQueryLog();
    $formattedQueries = [];
    foreach( $queries as $query ) :
        $prep = $query['query'];
        foreach( $query['bindings'] as $binding ) :
            $prep = preg_replace("#\?#", $binding, $prep, 1);
        endforeach;
        $formattedQueries[] = $prep;
    endforeach;
    return $formattedQueries;
}

function online_users($type){

    return $r;
}




/* post functions */
function order($data){
  global $user;
  $data['userid'] = $user->id;
  $data['status'] = "Processing";
  $order = Order::create($data);
  return $order;
}

?>
