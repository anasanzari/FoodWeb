<?php
 require_once '../classes/session.php';
 require_once '../classes/functions.php';
 require __DIR__.'/../vendor/autoload.php';
 require '../config.php';
 require '../classes/boot.php';
 require_once '../classes/User.php';


 $session = new Session();
 $session->forceLogin('../index.php');

 $user = User::find($session->getUsername());

 if(isset($_POST['update'])){

     $user->name = $_POST['name'];
     $user->phone = $_POST['phone'];
     $user->address = $_POST['address'];
     if($user->save()){
       header('Location: ./account.php');
     }
 }
?>

<?php getTemplate(1,'header',[]); ?>
<body>
<?php include './includes/nav.php'; ?>

<div class="accountcontainer">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h4>Edit Account</h4>

        <form class="col s12" action="editaccount.php" method="POST">
              <div class="row">
                <div class="input-field col s12">
                  <input name="name"  type="text" required value="<?=$user->name?>">
                  <label>Name</label>
                </div>
                <div class="input-field col s12">
                  <input  name="phone"  type="text" required value="<?=$user->phone?>">
                  <label>Phone</label>
                </div>
                <div class="input-field col s12">
                  <textArea name="address" class="materialize-textarea" required><?=$user->address?></textarea>
                  <label>Address</label>
                </div>
                <!--div class="input-field col s12">
                  <input name="password" type="password" required>
                  <label>Password</label>
                </div>
                <div class="input-field col s12">
                  <input name="con_password" type="password" required>
                  <label>Confirm Password</label>
                </div-->
                <div class="input-field col s12">
                  <input type="submit" class="waves-effect btn" value="Update" name="update"/>
                </div>
              </div>
        </form>


      </div>
    </div>
  </div>
</div>

<?php getTemplate(1,'footer',[]); ?>
<script>

</script>
</body>
