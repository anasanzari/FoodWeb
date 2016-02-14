<?php
require_once '../classes/session.php';
require_once '../classes/functions.php';
require __DIR__.'/../vendor/autoload.php';
require_once '../classes/Item.php';
require_once '../classes/Restaurant.php';
require '../config.php';
require '../classes/boot.php';

$session = new Session();
$session->adminForceLogin("../index.php");

$rest_id =$_GET['id'];
if(isset($_POST['create']))
{
  $item = new Item;
  $item->name = $_POST['name'];
  $item->cuisine = $_POST['cuisine'];
  $item->price = $_POST['price'];
  $item->restaurant_id = $rest_id;
  $item->save();
  header("location:view_items.php?id=$rest_id");
}
?>

<?php getTemplate(1,'header',[]); ?>

<body>
  <?php getTemplate(1,'admin_nav',[]); ?>
  <div class="admincontainer">
    <div class="container">
      <div class="row">

        <div class="col s12 m8 offset-m2">
          <h3>Add Menu Item</h3>
          <form class="col s12" action="create_item.php?id=<?= $rest_id ?>" method="post">
            <div class="input-field col s12">
              <input type="text" name="name">
              <label>Name</label>
            </div>
            <div class="input-field col s12">
              <input type="text" name="cuisine">
              <label>Cuisine</label>
            </div>
            <div class="input-field col s12">
              <input type="text" name="price">
              <label>Price</label>
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
