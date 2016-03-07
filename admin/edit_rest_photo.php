<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Item.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';
require '../classes/Uploader.php';

$session = new Session();
$session->adminForceLogin("../index.php");

$rest_id = $_GET['id'];
$restaurant = Restaurant::find($rest_id);

if(isset($_POST['create']))
{
  $file = $_FILES['img'];
  $restaurant = Restaurant::find($rest_id);
  //dd($item);
  unlink('../'.$restaurant->img);
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
          <h3>Edit Item Photo</h3>
          <form class="col s12" action="edit_rest_photo.php?id=<?= $rest_id ?>"" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="file-field col s12 input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" name="img" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            <div class="input-field col s12">
              <input type="submit" name="create" value="Save" class="waves-effect btn"/>
            </div>
          </form>


        </div>
      </div>

    </div>
  </div>

    <?php getTemplate(1,'footer',[]); ?>

  </body>

  </html>
