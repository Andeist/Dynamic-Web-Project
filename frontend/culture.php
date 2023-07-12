<?php
session_start();
?>

<!doctype html>
<html lang="en">
<?php include '../static/head.php'; ?>

  <body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php'; ?>
        <!-- Navbar -->
    </header>

    <div class="main">
        <!--Container-->
        <div class="container">
            <div class="row">
              
            <!-- Carousel -->
            <div class="mt-3 p-4">
              <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="./images/culture/culture1.png" class="d-block w-100" alt="culture1">
                    </div>
                    <div class="carousel-item">
                      <img src="./images/culture/culture2.png" class="d-block w-100" alt="culture2">
                    </div>
                    <div class="carousel-item">
                      <img src="./images/culture/culture3.png" class="d-block w-100" alt="culture3">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
            <!-- Carousel -->

            <!--Culture-->
            <div class="p-4 border-bottom">
              <div class="row">
                <div class="col-9 p-2">
                  <h3 class = "p-4 text-left border-bottom">Exploring Swedish Culture.<h3>
                </div>
                  <p>Sweden is one of the most egalitarian societies in the world. One of the most notable aspects of Swedish culture is their respect 
                  for the environment and commitment to sustainability. They are a global leader in organic agriculture, recycling, and renewable energy.
                  Most of the population lives in small rural towns, and while the major cities are populous and modern, many still have some medieval architecture 
                  and cobblestone streets, where you'll see Swedes hanging out and shopping for groceries at local markets. Swedish society is based on equality and 
                  individualism. Swedes are proud of their nation and its accomplishments. Lagom, which means “not too much, not too little…just right” is a word often 
                  used and heard in Sweden. Swedes also have a profound respect for integrity. Although they may appear to be reserved and shy at first, they have a great 
                  sense of humor and caring.
                  </p>
              </div>
            </div>
            <!--Culture-->

            <!--People-->
            <div class="p-4 border-bottom">
              <div class="row">
                <div class="col-9 p-2">
                  <h3 class = "p-4 text-left border-bottom">Swedish People and Community.<h3>
                </div>
                  <p>In Swedish culture, family life is important, but family structure is diverse and offers differing lifestyles and beliefs from one family to another. 
                    In an average Swedish family, both parents work. Housework tasks are usually divided amongst the family members without considering age or gender. 
                    It is very unusual to have a “stay-at-home-mom”, unless the mother is on parental leave. It is common to split the leave between the parents.
                    It's also common to have “Fredagsmys” or, Cozy Fridays. This is when people hang out with their family and friends and watch movies and have snacks. 
                    On Saturdays the younger children usually get “Lördagsgodis,” which means Saturday Candy. During their free time, many Swedish families like to spend 
                    time outdoors in forest, by the lake or sea, or in the mountains. Camping, picking berries and mushrooms, hiking, sailing, skiing, skating or just taking 
                    a nice walk is a part of many Swedes lives.
                  </p>
              </div>
            </div>
            <!--People-->

            <!--Food-->
            <div class="p-4 border-bottom">
              <div class="row">
                <div class="col-9 p-2">
                  <h3 class = "p-4 text-left border-bottom">Food in Sweden.<h3>
                </div>
                  <p>The most common meal in Swedish families consists of fish or meat and potatoes, rice or pasta. You will also quickly learn the concept of “fika.” 
                    That is coffee/drinks with cookies or often “kanelbulle”, a bun with cinnamon. Typical traditional Swedish food include for meatballs, herring and Smörgåsbord 
                    (buffét). Vegetarianism is becoming more popular in Sweden and you can get vegetarian food in almost every restaurants. School food is often influenced by other cultures, 
                    although changed to suit a Swedish context.
                  </p>
              </div>
            </div>
            <!--Food-->

            </div>
        </div>
        <!--Container-->
    </div>

    <footer>
        <!-- Footer -->
        <?php include '../phpinclude/footer.php'; ?>
        <!-- Footer -->
    </footer>
  </body>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script>
      <script src="../backend/session.js"></script>
      function myFunction() {
        alert("That feature is under development, please wait until further notices");
      }
    </script>
  
  </html>