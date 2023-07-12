<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php include '../static/head.php';?>

<body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php';?>
        <!-- Navbar -->
    </header>

    <div class="main">
        <div class="container">
            <!-- Admin Login -->
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5 mt-5 mb-5">
                    <div class="card bg-white text-dark" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login Admin</h2>
                                <form method="POST">
                                    <div class="form-outline form-dark mb-4">
                                        <label for="adminUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="adminUsername" id="adminUsername">
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label for="adminPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="adminPassword" id="adminPassword">
                                    </div>
                                    <button type="button" id="loginadminBtn" class="btn btn-outline-dark btn-lg px-5">LOG-IN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admin Login -->
        </div>
    </div>

    <footer>
        <!-- Footer -->
        <?php include '../phpinclude/footer.php';?>
        <!-- Footer -->
    </footer>
</body>

<!-- Modal -->
<div class="modal fade" id="modalPop" tabindex="-1" aria-labelledby="modalPopLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalPopLabel">Terdapat Kesalahan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

    <script src="../backend/session.js"></script>
    <script>
        function myFunction() {
        alert("That feature is under development, please wait until further notice");
        }
    </script>

</html>