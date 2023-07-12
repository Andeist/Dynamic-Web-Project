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

<?php include '../static/head.php'; ?>

<body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php'; ?>
        <!-- Navbar -->
    </header>

    <div class="main">
        <!-- Dashboard -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mt-4">
                        <h1 class="text-center mb-5 bg-primary text-white p-3">Bars List</h1>
                        <div class="d-flex justify-content-start mb-3">
                            <button class="btn btn-success" id="newBar" data-bs-toggle="modal" data-bs-target="#newBarModal">
                                <i class="bi bi-plus-lg"></i> Add new bar
                            </button>
                            <button class="btn btn-primary" id="goBackBtn" onclick="window.location.href='menu_dashboard.php'">Go Back to Menu</button>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bar Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Google Maps Location</th>
                                    <th scope="col">Web Link</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                                <!-- Table content will be dynamically populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Dashboard -->
    </div>

    <!-- Add New Bar Modal -->
    <div class="modal fade" id="newBarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Bar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert" id="addMessage" style="display:none;"></div>
                    <form method="POST" id="addBarForm">
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addBarName">Bar Name</label>
                            <input type="text" name="name" id="addBarName" class="form-control" />
                            <small class="text-danger ml-5" id="addBarNameError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addBarImage">Image</label>
                            <div id="fileContainer">
                                <input type="file" name="image" id="addBarImage" class="form-control" accept="image/*" />
                            </div>
                            <small class="text-danger ml-5" id="addBarImageError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addBarLocation">Google Maps Location</label>
                            <input type="text" name="location" id="addBarLocation" class="form-control" />
                            <small class="text-danger ml-5" id="addBarLocationError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addBarWebLink">Web Link</label>
                            <input type="text" name="webLink" id="addBarWebLink" class="form-control" />
                            <small class="text-danger ml-5" id="addBarWebLinkError"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnAdd" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Bar Modal -->


    <!-- Edit Bar Modal -->
    <div class="modal fade" id="editBarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Bar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert" id="editMessage" style="display:none;"></div>
                    <form method="POST" id="editBarForm" enctype="multipart/form-data">
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editBarName">Bar Name</label>
                            <input type="text" name="name" id="editBarName" class="form-control" />
                            <small class="text-danger ml-5" id="editBarNameError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editBarImage">Image</label>
                            <div id="fileContainer">
                                <input type="file" name="image" id="editBarImage" class="form-control" accept="image/*" />
                            </div>
                            <small class="text-danger ml-5" id="editBarImageError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editBarLocation">Google Maps Location</label>
                            <input type="text" name="gmapsLocation" id="editBarLocation" class="form-control" />
                            <small class="text-danger ml-5" id="editBarLocationError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editBarWebLink">Web Link</label>
                            <input type="text" name="webLink" id="editBarWebLink" class="form-control" />
                            <small class="text-danger ml-5" id="editBarWebLinkError"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnEdit" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Bar Modal -->

    <footer>
        <!-- Footer -->
        <?php include '../phpinclude/footer.php'; ?>
        <!-- Footer -->
    </footer>
</body>

<!-- Bootstrap JavaScript Libraries -->
<script src="../backend/bar_crud.js"></script>
<script src="../backend/session.js"></script>
<script>
    function myFunction() {
        alert("That feature is under development, please wait until further notice");
    }
</script>

</html>
