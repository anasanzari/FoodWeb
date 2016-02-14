<?php

require __DIR__.'/./vendor/autoload.php';
require './config.php';
require_once './classes/session.php';
require './classes/boot.php';
require_once './classes/User.php';

$err = 0;

$session = new Session();
$session->redirectIfLogged('./customer/index.php','./admin/index.php');

if(isset($_POST['register'])){

  if($_POST['password']!=$_POST['con_password'])
  {
    $err = 1;
  }
  else{

    $user = new User;
    $user->name = $_POST['name'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->address = $_POST['address'];
    $user->password = $_POST['password'];
    $user->save();



  /*if($_POST['email']==$admin_username&&$_POST['password']==$admin_password){
    $session->logIn(0, Session::USER_ADMIN);
    header('Location: ./admin/index.php');
  }*/
    $session->logIn($user->id, Session::USER_REGULAR);
    header('Location: ./customer/index.php');
 }
}
else{
//  header('Location: index.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>FoodWeb</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link href="./public/css/styles.css" rel="stylesheet" />
  <script type="text/javascript" src="./public/js/jquery.min.js"></script>
  <script type="text/javascript" src="./public/js/materialize.min.js"></script>
</head>
<body>

  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo logo">Foodweb</a>
    </div>
  </nav>

<div class="admincontainer">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <?php if($err==1){?><p style="color:red">Passwords Does Not Match</p><?php } ?>
        <h4>Sign Up</h4>
        <form class="col s12" action="signup.php" method="POST">
              <div class="row">
                <div class="input-field col s12">
                  <input name="name"  type="text" required>
                  <label>Name</label>
                </div>
                <div class="input-field col s12">
                  <input name="email"  type="email" required>
                  <label>Email</label>
                </div>
                <div class="input-field col s12">
                  <input  name="phone"  type="text" required>
                  <label>Phone</label>
                </div>
                <div class="input-field col s12">
                  <textArea name="address" class="materialize-textarea" required></textarea>
                  <label>Address</label>
                </div>
                <div class="input-field col s12">
                  <input name="password" type="password" required>
                  <label>Password</label>
                </div>
                <div class="input-field col s12">
                  <input name="con_password" type="password" required>
                  <label>Confirm Password</label>
                </div>
                <div class="input-field col s12">
                  <input type="submit" class="waves-effect btn" value="Register" name="register"/>
                </div>
              </div>
        </form>

    </div>
  </div>
</div>



  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5>FoodWeb, Inc.</h5></div>
        <div class="socialbuttons">
          <a class="social" href="#">
            <img src="./public/images/social/facebook.png" />
          </a>
          <a class="social" href="#">
            <img src="./public/images/social/Instagram.png" />
          </a>
          <a class="social" href="#">
            <img src="./public/images/social/twitter.png" />
          </a>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container"> © 2015 FoodWeb.</div>
    </div>
  </footer>


    <script>
      $(document).ready(function() {

      });
    </script>
</body>

</html>
