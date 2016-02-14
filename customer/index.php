<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Item.php';
require '../config.php';
require '../classes/boot.php';
$session = new Session();
$session->forceLogin('../index.php');

 ?>
<?php getTemplate(1,'header',[]); ?>
<body>
<?php include './includes/nav.php'; ?>

  <div class="parallax-container">
    <div class="cus_sh">
      <div class="container">
        <div class="row">
          <div class="col s12 m6 offset-m3">
            <h3>Search Restaurants</h3>
            <form action="results.php" method="GET">
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Location" name="restaurant"  type="text">
                    </div>
                    <div class="input-field col s12">
                      <input type="submit" class="waves-effect btn pbtn" value="Search"/>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="parallax front">
      <div class="overlay"></div>
      <img src="../public/images/rest.jpg" />
    </div>
  </div>

  <div class="cuisine">
    <div class="container">
      <div class="row">
        <div class="col m12">
          <h2>Cuisines</h3>
            <div class="row">
              <?php
               $cuisine = Item::distinct('cuisine')->lists('cuisine')->toArray();
               $i=0;
              foreach($cuisine as $cuisine)
            {
              if($i%4 == 0)
                {
              echo '
              <div class="col m3 s12">
                <div class="collection">';
            }
              echo '<a href="cuisine_result.php?cuisine='.$cuisine.'" class="collection-item">'.$cuisine.'</a>';

              if($i%4 == 3)
                {
              echo '
               </div>
              </div>';
            }
            $i++;
            }
            if($i%4 != 0)
              {
            echo '
             </div>
            </div>';
          }
            ?>
              </div>
            </div>
        </div>
      </div>
    </div>

  </div>

<?php getTemplate(1,'footer',[]); ?>
<script>
  $(document).ready(function() {
    $('.parallax').parallax();
  });
</script>
</body>
