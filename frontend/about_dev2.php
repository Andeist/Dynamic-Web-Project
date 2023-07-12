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
                        <img src="./images/main/jason_antony.png" style="width:300px;height:300px; border-radius: 30%;">
                        <div class="col-9 p-2">
                            <h3 class="text-center border-bottom p-2">Jason Antony</h3>
                            <div class="col-12 p-4">
                                <p>Perkenalkan nama saya Jason Antony dengan NIM 412021010 yang berkuliah di kampus UKRIDA
                                    <br>jurusan Informatika angkatan 2021. Pada kesempatan kali ini saya membuat sebuah wiki
                                    <br>singkat mengenai Minuman Swedish.</p>
                                <br>
                                <p>Motto : "Work hard, Play hard."</p>
                            </div>
                            <div class="col-12 p-4">
                                <h3 class="text-center border-bottom p-2">Informasi Pribadi</h3>
                                <ul>
                                    <p>Email : Jason Antony.412021010@civitas.ukrida.ac.id</p>
                                    <p>Website : MidDel.com</p>
                                    <p>Address : Jakarta, Indonesia</p>
                                </ul>
                            </div>
                            <div class="col-12 p-4">
                                <h3 class="text-center border-bottom p-2">Admin</h3>
                                <div class="text-center">
                                    <a href="login_admin.php" class="btn btn-primary rounded-pill">Login</a>
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