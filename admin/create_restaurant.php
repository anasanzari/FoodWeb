<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

$session = new Session();
$session->adminForceLogin("../index.php");

if(isset($_POST['create']))
{
  $restaurant = new Restaurant;
  $restaurant->name = $_POST['name'];
  $restaurant->place = $_POST['place'];
  $restaurant->min_order = $_POST['min_order'];
  $restaurant->save();
  header("location:index.php");
}
?>

<?php getTemplate(1,'header',[]); ?>

<body>
  <?php getTemplate(1,'admin_nav',[]); ?>
  <div class="admincontainer">
    <div class="container">
      <div class="row">

        <div class="col s12 m8 offset-m2">
          <h3>Add Restaurant</h3>

          <form class="col s12" action="create_restaurant.php" method="post">
            <div class="input-field col s12">
              <input type="text" name="name">
              <label>Name</label>
            </div>
            <div class="input-field col s12">
              <input type="text" name="place">
              <label>Place</label>
            </div>
            <div class="input-field col s12">
              <input type="text" name="min_order">
              <label>Min Order</label>
            </div>
            <div class="input-field col s12">
              <input type="submit" name="create" value="Add" class="waves-effect btn"/>
            </div>
          </form>


        </div>
      </div>

    </div>
  </div>

    <?php getTemplate(1,'footer',[]); ?>

  </body>

  </html>
