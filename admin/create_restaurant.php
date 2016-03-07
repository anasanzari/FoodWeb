<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';
require '../classes/Uploader.php';


$session = new Session();
$session->adminForceLogin("../index.php");

if(isset($_POST['create']))
{
  $file = $_FILES['img'];
  $restaurant = new Restaurant;
  $restaurant->name = $_POST['name'];
  $restaurant->place = $_POST['place'];
  $restaurant->min_order = $_POST['min_order'];
  $restaurant->img = 'public/images/uploads/restaurants/'.basename($file['name']);
  $restaurant->save();
  $error = Uploader::attach_file($file,'../public/images/uploads/restaurants',basename($file['name']));
  if($error==0){
    header("location:index.php");
  }
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

          <form class="col s12" action="create_restaurant.php" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
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

            <div class="file-field col s12 input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" name="img" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
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
