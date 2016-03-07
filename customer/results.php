<?php
require_once '../classes/session.php';
require __DIR__.'/../vendor/autoload.php';
$session = new Session();
$session->forceLogin('../index.php');

 ?>

<?php include '../includes/header.php';
require_once '../classes/Restaurant.php';
 require_once '../classes/Item.php';
 require '../config.php';
 require '../classes/boot.php';
?>
<?php
  if(isset($_GET['restaurant']))
  {
    $input = $_GET['restaurant'];
    $res = Restaurant::where('place','LIKE','%'.$input.'%')->get();
  }
?>
  <body>
    <?php include './includes/nav.php'; ?>

      <div class="customercontainer">
        <div class="container">
          <div class="row">
            <div class="col s12">
              <h4>Search Results</h3>
              <ul class="collection">
              <?php
              foreach($res as $res)
                {
                  echo '<li class="collection-item">
                  <div class="img-wrap">
                  <img src="../'.$res->img.'" class="responsive-img circle"></div>
                  <h4 class="line1">'. $res->name.'</h4>';
                  $cuisines = Item::where('restaurant_id',$res->id)->distinct('cuisine')->lists('cuisine')->toArray();
                  /* Shouldn't do the above query like this */
                  echo '<p> Cuisines: ';
                  foreach($cuisines as $key => $cuisine)
                  {
                    if($key==sizeof($cuisines)-1){
                      echo $cuisine;
                    }
                    else echo $cuisine.',';
                  }
                  echo '</p>

                  <div class="chip">'.$res->place.'</div>
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
