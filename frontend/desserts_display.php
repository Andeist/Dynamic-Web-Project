<?php
session_start();
include('../config/dbconn.php');

try {
    // Fetch desserts from the database
    $stmt = $conn->query('SELECT * FROM desserts');
    $desserts = array();
    while ($row = $stmt->fetch_assoc()) {
        $desserts[] = $row;
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>


<!doctype html>
<html lang="en">

<head>
    <?php include '../static/head.php'; ?>
</head>

<body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php';?>
        <!-- Navbar -->
    </header>

    <div class="main">
        <div class="container">
            <div class="row">
                <?php foreach ($desserts as $dessert) : ?>
                    <div class="p-4 border-bottom">
                        <div class="row">
                            <img src="<?php echo $dessert['image']; ?>" style="width:300px;height:200px;margin-top: 50px; border-radius: 30%;">
                            <div class="col-9 p-2">
                                <h3 class="text-center border-bottom p-2"><?php echo $dessert['name']; ?></h3>
                                <div>
                                    <p><?php echo $dessert['description']; ?></p>
                                    <div class="container" style="margin-left: 15px;">
                                        <a href="dessert_view.php?id=<?php echo $dessert['id']; ?>" class="btn btn-primary rounded-pill">Learn the recipe!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
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
