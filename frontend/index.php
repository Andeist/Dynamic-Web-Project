<?php
session_start();
?>

<!doctype html>
<html lang="en">
<?php include '../static/head.php';?>

  <body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php';?>
        <!-- Navbar -->
    </header>

    <div class="main">
      <!--Container-->
      <div class="container">
        <div class="row">

          <!-- Carousel -->
          <div class="mt-3 p-4">
            <div class="col-12">
              <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./images/carousel/drinks-carousel.png" class="d-block w-100" alt="Drinks">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Drinks</h3>
                      <p>A refreshing drinks is always a good idea.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./images/carousel/desserts-carousel.png" class="d-block w-100" alt="Desserts">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Desserts</h3>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="./images/carousel/bars-carousel.png" class="d-block w-100" alt="Bars">
                    <div class="carousel-caption d-none d-md-block">
                      <h3>Bars</h3>
                      <p>Places we reccomend to visit when getting some drinks.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
          </div>
          <!-- Carousel -->

          <!--About-->
          <div class="p-4 border-bottom" id="about">
            <div class="row">
              <div class="col-9 p-2">
                <h3 class = "p-4 text-left border-bottom">About Midgardian's Delight.<h3>
              </div>
                <p>Midgardian's Delight is a website that exist solely to share recipes of drinks and desserts that are locally made in sweden.
                  Not only that but we also reccomend some bars of our choosing for you to visit. Please be sure to check 
                  on all kinds drinks and who knows you might just find your favorite drinks along the way!
                </p>
                <div class="container">
                  <button type="button" class="btn btn-primary rounded-pill" onclick="window.location.href='culture.php'">Learn more about swedish culture!</button>
                  <button type="button" class="btn btn-outline-dark rounded-pill" onclick="window.location.href='about_dev.php'">About the developer</button>
                  </div>
                </div>
              </div>
          <!--About-->

          <!--FAQ-->
          <div class ="p-4" id="faq">
            <h3 class = "p-4 text-left border-bottom">FAQ<h3></h3>
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Why should i try swedish drinks/desserts?
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Because there is alot of variety and delicious drinks and desserts to try!</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      How do i make swedish drinks/desserts?
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">You can see the full info on what you need to make them on our website!</div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Are all swedish drinks alcoholic?
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Ofcourse not, there is plenty of non-alcoholic beverages out there!</div>
                  </div>
                </div>
              </div>
          </div>
          <!--FAQ-->
        </div>
      </div>
      <!--Container-->
    </div>

    <footer>
        <!-- Footer -->
        <?php include '../phpinclude/footer.php';?>
        <!-- Footer -->
    </footer>
  </body>
  
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../backend/session.js"></script>
  <script>
      function myFunction() {
      alert("That feature is under development, please wait until further notice");
      }
  </script>

</html>