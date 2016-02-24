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
$err = 0;

if(isset($_POST['update'])){
  if($_POST['password']!=$_POST['con_password']){
    $err = 1;
  }else{

    $user->password = $_POST['password'];

    if($user->save()){
      header('Location: ./account.php');
    }
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
        <h4>Change Password</h4>

        <?php if($err==1){?><p class="alert">Passwords Does Not Match</p><?php } ?>
        <form class="col s12" action="password.php" method="POST">
                <div class="input-field col s12">
                  <input name="password" type="password" required>
                  <label>New Password</label>
                </div>
                <div class="input-field col s12">
                  <input name="con_password" type="password" required>
                  <label>Confirm Password</label>
                </div>
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
