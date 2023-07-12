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
  <!-- Dashboard -->
  <div class="container">
    <div class="row">
      <div class="col-12">
       <div class="mt-4"> 
      <h1 class="text-center mb-5 bg-primary text-white p-3">Drinks List</h1>
        <div class="d-flex justify-content-start mb-3">
          <button class="btn btn-success" id="newDrink" data-bs-toggle="modal" data-bs-target="#newDrinkModal">
            <i class="bi bi-plus-lg"></i> Add new drink
          </button>
          <button class="btn btn-primary" id="goBackBtn" onclick="window.location.href='menu_dashboard.php'">Go Back to Menu</button>
        </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Drink</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Directions</th>
                <th scope="col">Video Embed</th>
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
  <!--Dashboard-->
</div>


    <!-- Add New Drink Modal -->
    <div class="modal fade" id="newDrinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Drink</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert" id="addMessage" style="display:none;"></div>
                    <form method="POST" id="addDrinkForm" enctype="multipart/form-data">
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addDrinkName">Drink Name</label>
                            <input type="text" name="name" id="addDrinkName" class="form-control" />
                            <small class="text-danger ml-5" id="addDrinkNameError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addDescription">Description</label>
                            <textarea class="form-control" name="description" id="addDescription" rows="3"></textarea>
                            <small class="text-danger ml-5" id="addDescriptionError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addImage">Image</label>
                            <div id="fileContainer">
                                <input type="file" name="image" id="addImage" class="form-control" accept="image/*" />
                            </div>
                            <small class="text-danger ml-5" id="addImageError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addIngredients">Ingredients</label>
                            <textarea class="form-control" name="ingredients" id="addIngredients" rows="3"></textarea>
                            <small class="text-danger ml-5" id="addIngredientsError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addDirections">Directions</label>
                            <textarea class="form-control" name="directions" id="addDirections" rows="3"></textarea>
                            <small class="text-danger ml-5" id="addDirectionsError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="addVideoEmbed">Video Embed</label>
                            <input type="text" name="videoEmbed" id="addVideoEmbed" class="form-control" />
                            <small class="text-danger ml-5" id="addVideoEmbedError"></small>
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
    <!-- Add New Drink Modal -->

    <!-- Edit Drink Modal -->
    <div class="modal fade" id="editDrinkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Drink</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-primary" role="alert" id="editMessage" style="display:none;"></div>
                    <form method="POST" id="editDrinkForm" enctype="multipart/form-data">
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editDrinkName">Drink Name</label>
                            <input type="text" name="name" id="editDrinkName" class="form-control form-control" />
                            <small class="text-danger ml-5" id="editDrinkNameError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editDescription">Description</label>
                            <textarea class="form-control" name="description" id="editDescription" rows="3"></textarea>
                            <small class="text-danger ml-5" id="editDescriptionError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editImage">Image</label>
                            <div id="fileContainer">
                                <input type="file" name="image" id="editImage" class="form-control form-control" accept="image/*" />
                            </div>
                            <small class="text-danger ml-5" id="editImageError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editIngredients">Ingredients</label>
                            <textarea class="form-control" name="ingredients" id="editIngredients" rows="3"></textarea>
                            <small class="text-danger ml-5" id="editIngredientsError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editDirections">Directions</label>
                            <textarea class="form-control" name="directions" id="editDirections" rows="3"></textarea>
                            <small class="text-danger ml-5" id="editDirectionsError"></small>
                        </div>
                        <div class="form-outline form-dark mb-4">
                            <label class="form-label" for="editVideoEmbed">Video Embed</label>
                            <input type="text" name="videoEmbed" id="editVideoEmbed" class="form-control form-control" />
                            <small class="text-danger ml-5" id="editVideoEmbedError"></small>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="btnEdit" type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Drink Modal -->


    <footer>
        <!-- Footer -->
        <?php include '../phpinclude/footer.php';?>
        <!-- Footer -->
    </footer>
</body>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../backend/drink_crud.js"></script>
    <script src="../backend/session.js"></script>
    <script>
      function myFunction() {
        alert("That feature is under development, please wait until further notice");
      }
    </script>

</html>
