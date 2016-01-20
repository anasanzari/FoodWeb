<?php
require_once '../classes/session.php';
$session = new Session();
$session->forceLogin('../index.php');

 ?>
<?php include '../includes/header.php'; ?>
<body>
<?php include './includes/nav.php'; ?>

  <div class="parallax-container">
    <div class="cus_sh">
      <div class="container">
        <div class="row">
          <div class="col s12 m6 offset-m3">
            <h3>Search Restaurants</h3>
            <form action="results.php" method="POST">
                  <div class="row">
                    <div class="input-field col s12">
                      <input placeholder="Location" name="restaurant"  type="text">
                    </div>
                    <div class="input-field col s12">
                      <input type="submit" class="waves-effect btn pbtn" value="Search"/>
                    </div>
                  </div>
            </form>
          </div>
        </div>
      </div>

    </div>

    <div class="parallax front">
      <div class="overlay"></div>
      <img src="../public/images/rest.jpg" />
    </div>
  </div>

  <div class="cuisine">
    <div class="container">
      <div class="row">
        <div class="col m12">
          <h2>Cuisines</h3>
            <div class="row">
              <div class="col m3 s12">
                <div class="collection">
                 <a href="#!" class="collection-item">American</a>
                 <a href="#!" class="collection-item">Andhra</a>
                 <a href="#!" class="collection-item">Bengali</a>
                 <a href="#!" class="collection-item">Biriani</a>
               </div>
              </div>
               <div class="col m3 s12">
                 <div class="collection">
                  <a href="#!" class="collection-item">Burgers</a>
                  <a href="#!" class="collection-item">Cakes-Bakery</a>
                  <a href="#!" class="collection-item">Chinese</a>
                  <a href="#!" class="collection-item">Continental</a>
                </div>
               </div>
                <div class="col m3 s12">
                  <div class="collection">
                   <a href="#!" class="collection-item">European</a>
                   <a href="#!" class="collection-item">Fast Food</a>
                   <a href="#!" class="collection-item">Italian</a>
                   <a href="#!" class="collection-item">Kebab</a>
                 </div>
                </div>
              </div>
            </div>
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
