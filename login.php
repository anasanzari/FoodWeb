<?php

require __DIR__.'/./vendor/autoload.php';
require './config.php';
require_once './classes/session.php';
require './classes/boot.php';
require_once './classes/User.php';

$session = new Session();

if($session->getLoggedin()){
  header("Location: ./customer/index.php");
}

if(isset($_POST['email'])&&isset($_POST['password'])){
  $u = User::where('email',$_POST['email'])->where('password',$_POST['password'])->first();
  //var_dump($u);
  if($u){
    $session->logIn($u->id, Session::USER_REGULAR);
    header('Location: ./customer/index.php');
  }
}else{
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

<div class="loginpage">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <p class="error">Incorrect Email/Password. Please try again.</p>
        <h4>Login</h4>
        <form class="col s12" action="login.php" method="POST">
              <div class="row">
                <div class="input-field col s12">
                  <input placeholder="Email" name="email"  type="email">
                </div>
                <div class="input-field col s12">
                  <input placeholder="Password" name="password" type="password">
                </div>
                <div class="input-field col s12">
                  <input type="submit" class="waves-effect btn" value="Login"/>
                </div>
              </div>
        </form>

      </div>
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
