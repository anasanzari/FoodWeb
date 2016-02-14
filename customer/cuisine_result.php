<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/functions.php';
require_once '../classes/Restaurant.php';
 require_once '../classes/Item.php';
 require '../config.php';
 require '../classes/boot.php';

$session = new Session();
$session->forceLogin('../index.php');

 ?>

<?php include '../includes/header.php';?>
<?php
  if(isset($_GET['cuisine']))
  {
    $cuisine = $_GET['cuisine'];
    $resid = Item::where('cuisine',$cuisine)->get()->lists('restaurant_id')->toArray();
    $res = Restaurant::whereIN('id',$resid)->get();
  }
?>
  <body>
    <?php include './includes/nav.php'; ?>

      <div class="customercontainer">
        <div class="container">
          <div class="row">
            <div class="col s12">
              <?php echo'<h4>'.$cuisine.'</h3>';?>
              <ul class="collection">
              <?php
              foreach($res as $res)
                {
                  echo '<li class="collection-item">
                  <!--img src="../public/images/restaurants/dominos.jpg" class="square"-->
                  <h4 class="line1">'. $res->name.'</h4>';
                  $cuisines = Item::where('restaurant_id',$res->id)->distinct('cuisine')->lists('cuisine')->toArray();
                  echo '<p>';
                  foreach($cuisines as $key => $cuisine)
                  {
                    if($key==sizeof($cuisines)-1){
                      echo $cuisine;
                    }
                    else echo $cuisine.', ';
                  }
                  echo '</p>
                  <div class="chip">Min order : &#8377 '.$res->min_order.'</div>
                  <a href="./menu.php?id='.$res->id.'" class="waves-effect btn menubtn">Menu</a>
                  </li>';
                }
              ?>
              </ul>
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>


          <?php include '../includes/footer.php'; ?>
            <script>
              $(document).ready(function() {
                $('.parallax').parallax();
              });
            </script>
  </body>
