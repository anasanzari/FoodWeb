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


 ?>
<?php getTemplate(1,'header',[]); ?>
<body>
<?php include './includes/nav.php'; ?>

<div class="accountcontainer">
  <div class="container">
    <div class="row">
      <div class="col s12 m12">
        <h4>Account Details</h4>
        <div class="account">
          <ul class="collection">
            <li class="collection-item">
              Name: <span class="bluetext"><?= $user->name ?></span>
            </li>
            <li class="collection-item">
              Phone: <span class="bluetext"><?= $user->phone ?></span>
            </li>
            <li class="collection-item">
              Address: <span class="bluetext"><?= $user->address ?></span>
            </li>
            <li class="collection-item">
              Email: <span class="bluetext"><?= $user->email ?></span>
            </li>
          </ul>
          <a href="editaccount.php" class="waves-effect btn menubtn">Edit Account</a>
          <a href="password.php" class="waves-effect btn menubtn">Change Password</a>
        </div>


      </div>
    </div>
  </div>
</div>

<?php getTemplate(1,'footer',[]); ?>
<script>

</script>
</body>
