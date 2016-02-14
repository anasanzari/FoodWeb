<?php
require_once './classes/session.php';
$session = new Session();
$session->redirectIfLogged('./customer/index.php','./admin/index.php');

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

  <div class="parallax-container">
    <div class="top">
      <img src="./public/images/logo.png" style="width:150px;" />
      <h1>FoodWeb</h1>
      <h4>The easiest way to get Food!!</h4>
      <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Login</a>
    </div>

    <div class="parallax front">
      <div class="overlay"></div>
      <img src="./public/images/pizza.jpg">
    </div>
  </div>
  <div class="services">
    <div class="container">
      <div class="col s8 offset-s2">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="icon icon-email"></i>Fast and Easy.</div>
            <div class="collapsible-body">
              <p>Our primary objective is to make online food ordering fast and easy.
                Our service provides the opportunity to find all of the restaurants
                available in your area that can deliver to your house.</p>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="icon icon-contact"></i>Freedom of Choice</div>
            <div class="collapsible-body">
              <p>When you order through our website you can see a big selection of restaurants
                which offer a broad variety of food.
                You can compare prices and reviews in order to choose your favorite restaurant.</p>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="icon icon-info"></i>Food for the Soul</div>
            <div class="collapsible-body">
              <p>Food is essential to life. And we bring you the best food in the town.</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="container food">
      <div class="row">
      <div class="col m6 offset-m3">
        <img src="./public/images/svg/chicken4.svg" />
        <img src="./public/images/svg/dining.svg" />
        <img src="./public/images/svg/french3.svg" />
        <img src="./public/images/svg/hamburger2.svg" />
      </div>
     </div>
    </div>
  </div>

  <div class="parallax-container rest">
    <div class="top">
      <h3>Restaurants</h3>
      <div class="row">
        <div class="col m2 s6 offset-m2"><img class="circle responsive-img" src="./public/images/restaurants/pizzahut.jpg"></div>
        <div class="col m2 s6"><img class="circle responsive-img" src="./public/images/restaurants/box.jpg"></div>
        <div class="col m2 s6"><img class="circle responsive-img" src="./public/images/restaurants/br.jpg"></div>
        <div class="col m2 s6"><img  class="circle responsive-img"src="./public/images/restaurants/roll.jpg"></div>
      </div>
      <div class="row">
        <div class="col m2 s6 offset-m2"><img class="circle responsive-img" src="./public/images/restaurants/subway.jpg"></div>
        <div class="col m2 s6"><img class="circle responsive-img" src="./public/images/restaurants/yochina.jpg"></div>
        <div class="col m2 s6"><img class="circle responsive-img" src="./public/images/restaurants/papajohns.jpg"></div>
        <div class="col m2 s6"><img  class="circle responsive-img"src="./public/images/restaurants/dominos.jpg"></div>
      </div>
    </div>
    <div class="parallax front">
      <div class="overlay"></div>
      <img src="./public/images/noodles.jpg">
    </div>
  </div>

  <div class="props">
    <div class="container">
      <div class="row">
        <div class="col s5 offset-s1">
          <img src="./public/images/svg/french3.svg" />
          <h2>Discover</h2>
          <p>Find out what's being cooked in your neighbourhood</p>
        </div>
        <div class="col s5">
          <img src="./public/images/svg/noodle1.svg" />
          <h2>Choose</h2>
          <p>Select your favourite from wide range of items</p>
        </div>
      </div>
      <div class="row">
        <div class="col s5 offset-s1">
          <img src="./public/images/svg/hot30.svg" />
          <h2>Deliver</h2>
          <p>Experience faster delivery free of cost</p>
        </div>
        <div class="col s5">
          <img src="./public/images/svg/fire9.svg" />
          <h2>Something</h2>
          <p>Yet to figure out what this is about</p>
        </div>
      </div>
    </div>
  </div>

  <div class="feedback">
    <div class="bg"></div>
    <div class="overlay"></div>
    <div class="container">
      <h1>Drop us a line!</h1>
      <form class="col s12" action="#" id="feedform">
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Name" name="name"  type="text" class="validate">
              </div>
              <div class="input-field col s12">
                <input placeholder="Email" name="email" type="text" class="validate">
              </div>
              <div class="input-field col s12">
                <textarea placeholder="FeedBack" name="feedback" class="materialize-textarea"></textarea>
              </div>
              <div class="input-field col s12">
                <input type="submit" class="waves-effect waves-light btn" value="Send"/>
              </div>
            </div>
      </form>
      <div class="col s12" id="resp">
        <h4>Thank you!!.</h4>
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


  <!--- Login Modal --->
  <div id="modal1" class="modal loginmodal">
    <div class="modal-content">
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
                <a class="waves-effect btn" href="./signup.php">SignUp</a>
              </div>
            </div>
      </form>

    </div>
  </div>


    <script>
      $(document).ready(function() {
        $('.modal-trigger').leanModal();
        $('.parallax').parallax();
        $('#feedform').submit(function (){
          Materialize.toast('Sending feed..',1000);
          var data =  $(this).serialize();
          $.post("./api/post.php",data,function(res){
              var val = JSON.parse(res);
              if(val.status == "success"){
                   Materialize.toast('Your feed is recieved.', 3000);
                   $('#feedform').slideUp(1000);
                   $('#resp').delay("1000").slideDown(1000);
              }else{
                   Materialize.toast('Sorry.Something went wrong!', 1000);
              }
          })
          return false;
        });
      });
    </script>
</body>

</html>
