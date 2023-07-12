<?php
session_start();
include('../config/dbconn.php');
try {
    // Fetch drinks from the database
    $stmt = $conn->query('SELECT * FROM drinks');
    $drinks = array();
    while ($row = $stmt->fetch_assoc()) {
        $drinks[] = $row;
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
                <?php foreach ($drinks as $drink) : ?>
                    <div class="p-4 border-bottom">
                        <div class="row">
                            <img src="<?php echo $drink['image']; ?>" style="width:300px;height:200px;margin-top: 50px; border-radius: 30%;">
                            <div class="col-9 p-2">
                                <h3 class="text-center border-bottom p-2"><?php echo $drink['name']; ?></h3>
                                <div>
                                    <p><?php echo $drink['description']; ?></p>
                                    <div class="container" style="margin-left: 15px;">
                                        <a href="drink_view.php?id=<?php echo $drink['id']; ?>" class="btn btn-primary rounded-pill">Learn the recipe!</a>
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
