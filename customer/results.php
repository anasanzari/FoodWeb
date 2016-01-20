<?php
require_once '../classes/session.php';
$session = new Session();
$session->forceLogin('../index.php');

 ?>
 
<?php include '../includes/header.php'; ?>

  <body>
    <?php include './includes/nav.php'; ?>

      <div class="cus_results">
        <div class="container">
          <div class="row">
            <div class="col s12">
              <h4>Search Results</h3>
              <ul class="collection">
                <li class="collection-item avatar">
                  <img src="../public/images/restaurants/dominos.jpg" class="square">
                  <span class="title">Dominos</span>
                  <p>Italian, Pizza</p>
                  <div class="chip">Min order : Rs. 200</div>
                  <a href="#" class="waves-effect btn menubtn">Menu</a>
                  </li>
                <li class="collection-item avatar">
                  <img src="../public/images/restaurants/dominos.jpg" class="square">
                  <span class="title">Street Delight </span>
                  <p>Biryani, Chinese, North Indian</p>
                  <div class="chip">Min order : Rs. 300</div>
                    <a href="#" class="waves-effect btn menubtn">Menu</a>
                </li>
                <li class="collection-item avatar">
                  <img src="../public/images/restaurants/dominos.jpg" class="square">
                  <span class="title">Park N Eat</span>
                  <p>Chinese, Kebab</p>
                  <div class="chip">Min order : Rs. 200</div>
                    <a href="#" class="waves-effect btn menubtn">Menu</a>
                </li>
                <li class="collection-item avatar">
                  <img src="../public/images/restaurants/dominos.jpg" class="square">
                  <span class="title">Crunch Pizzas</span>
                  <p>Fast Food, Pizza</p>
                  <div class="chip">Min order : Rs. 400</div>
                    <a href="#" class="waves-effect btn menubtn">Menu</a>
                </li>
              </ul>
              <div>
              </div>
            </div>
          </div>
        </div>


          <?php include '../includes/footer.php'; ?>
            <script>
              $(document).ready(function() {
                $('.parallax').parallax();
              });
            </script>
  </body>
