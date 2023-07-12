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
            <!--About Developer-->
            <div class="p-4 border-bottom">
              <div class="row">
                <img src="./images/main/jason_antony.png" style= "width:300px;height:300px; border-radius: 30%;">
                  <div class="col-9 p-2">
                    <h3 class="text-center border-bottom p-2">About the developer</h3>
                  <div>
                    <div class="col-12 p-4">
                      Name : Jason Antony
                      <br>
                      NIM  : 412021010
                      <br>
                      Address : Jakarta, Kota Tua
                      <br>
                      Email : jason.412021010@civitas.ukrida.ac.id
                      <br>
                      Hello, i'm Jason Antony, the developer of this site.
                      <br> 
                      i made this site during 2022 with the purpose of
                      <br>
                      promoting swedish culinary culture. I hope you enjoyed this site.
                    </div>
                    <div class="col-12 p-4">
                      <button type="button" class="btn btn-primary rounded-pill" onclick="window.location.href='about_dev2.php'">Learn more</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!--About Developer-->
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