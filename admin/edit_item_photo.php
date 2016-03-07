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

$rest_id =$_GET['rest_id'];
$item_id = $_GET['item_id'];

if(isset($_POST['create']))
{
  $file = $_FILES['img'];
  $item = Item::where('item_id',$item_id)->first();
  //dd($item);
  unlink('../'.$item->img);
  $item->img = 'public/images/uploads/items/'.basename($file['name']);
  $item->save();
  $error = Uploader::attach_file($file,'../public/images/uploads/items',basename($file['name']));
  if($error==0){
    header("location:view_items.php?id=$rest_id");
  }
}
$item = Item::find($item_id);
?>


<?php getTemplate(1,'header',[]); ?>

<body>
  <?php getTemplate(1,'admin_nav',[]); ?>
  <div class="admincontainer">
    <div class="container">
      <div class="row">

        <div class="col s12 m8 offset-m2">
          <h3 class="center">Edit Item Image</h3>
          <div class="center">
            <img src="../<?=$item->img?>" class="responsive-img circle img-rest" />
          </div>
          <form class="col s12" action="edit_item_photo.php?item_id=<?= $item_id ?>&rest_id=<?= $rest_id ?>" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
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
