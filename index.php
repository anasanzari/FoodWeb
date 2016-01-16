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
    <div class="parallax front">
      <div class="top">
        <h1>FoodWeb</h1>
        <h4>The easiest way to get Food!!</h4>
      </div>
      <div class="overlay"></div>
      <img src="./public/images/pizza.jpg">
    </div>
  </div>
  <div class="services">
    <div class="container">
      <div class="col s8 offset-s2">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li>
            <div class="collapsible-header"><i class="icon icon-email"></i>Food Delivery</div>
            <div class="collapsible-body">
              <p>Some text here.</p>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="icon icon-contact"></i>Exclusive something</div>
            <div class="collapsible-body">
              <p>Some other text here.</p>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="icon icon-info"></i>Something else here..</div>
            <div class="collapsible-body">
              <p>Blah blah</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="container food">
      <div class="col s6 offset-3">
        <img src="./public/images/svg/chicken4.svg" />
        <img src="./public/images/svg/dining.svg" />
        <img src="./public/images/svg/french3.svg" />
        <img src="./public/images/svg/hamburger2.svg" />
      </div>
    </div>
  </div>

  <div class="parallax-container">
    <div class="parallax front">
      <div class="top">
        <h3>Restaurants</h3>
      </div>
      <div class="overlay"></div>
      <img src="./public/images/noodles.jpg">
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
      $('.parallax').parallax();
    });
  </script>
</body>

</html>
