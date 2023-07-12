<?php
session_start();

// Check if admin session is set
if (!isset($_SESSION['admin_username'])) {
    // Admin session not set, redirect to login page
    header("Location: login_admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php 
include '../static/head.php';
?>

<body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php';?>
        <!-- Navbar -->
    </header>

    <div class="main">
        <!-- Dashboard selection -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mt-4 text-center"> 
                        <h1 class="text-center mb-5 bg-primary text-white p-3">Dashboard Selection</h1>
                        <img src="./images/main/pixel.gif" alt="pixel" class="img-fluid">
                        <div class="d-flex justify-content-center mt-4">
                            <div class="btn-group" role="group">
                                <button class="btn btn-danger btn-lg mx-2" onclick="window.location.href='desserts_dashboard.php'">Desserts</button>
                                <button class="btn btn-success btn-lg mx-2" onclick="window.location.href='drinks_dashboard.php'">Drinks</button>
                                <button class="btn btn-warning btn-lg mx-2" onclick="window.location.href='bars_dashboard.php'">Bars</button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p>Choose one of the dashboards above to manage your desserts, drinks, or bars.</p>
                        </div>
                        <div class="mt-5"></div> <!-- Padding for space below buttons -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard selection -->
        
        <!-- Footer -->
        <footer>
            <?php include '../phpinclude/footer.php';?>
        </footer>
        <!-- Footer -->
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../backend/drink_crud.js"></script>
    <script src="../backend/session.js"></script>
    <script>
        function myFunction() {
            alert("That feature is under development, please wait until further notice");
        }
    </script>
</body>
</html>
