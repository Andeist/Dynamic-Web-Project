<?php
session_start();
include('../config/dbconn.php');

try {
    // Fetch bars from the database
    $stmt = $conn->query('SELECT * FROM bars');
    $bars = array();
    while ($row = $stmt->fetch_assoc()) {
        $bars[] = $row;
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
        <!--Container-->
        <div class="container">
            <div class="row">
                <?php foreach ($bars as $bar) : ?>
                    <div class="p-4 border-bottom">
                        <div class="row">
                            <img src="<?php echo $bar['image']; ?>" style="width:300px;height:200px;margin-top: 50px; border-radius: 30%;" alt="Bar Image">
                            <div class="col-md-9">
                                <h3 class="text-center border-bottom p-2"><?php echo $bar['name']; ?></h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="<?php echo $bar['gmaps_location']; ?>" target="_blank">
                                            <img src="./images/main/maps.png" class="img-fluid" alt="Location Map">
                                        </a>
                                    </div>
                                    <div class="col-md-6 mt-3 mt-md-0 d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-primary btn-lg" onclick="window.open('<?php echo $bar['web_link']; ?>', '_blank')">Learn more about the place!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
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
