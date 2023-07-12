<?php
session_start();
include('../config/dbconn.php');

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($id === false) {
        die("Invalid drink ID");
    }

    try {
        // Fetch drink from the database based on the ID
        $stmt = $conn->prepare('SELECT * FROM drinks WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if drink exists
        if ($result->num_rows === 0) {
            die("Drink not found");
        }

        $drink = $result->fetch_assoc();
    } catch (mysqli_sql_exception $e) {
        die("Error: " . $e->getMessage());
    }

    // Fetch comments for the drink
    $commentStmt = $conn->prepare('SELECT * FROM comments WHERE drink_id = ?');
    $commentStmt->bind_param('i', $id);
    $commentStmt->execute();
    $commentResult = $commentStmt->get_result();
    $comments = $commentResult->fetch_all(MYSQLI_ASSOC);
} else {
    die("Invalid drink ID");
}
?>



<!doctype html>
<html lang="en">

<?php include '../static/head.php'; ?>

<body>
    <header>
        <!-- Navbar -->
        <?php include '../phpinclude/navbar.php';?>
        <!-- Navbar -->
    </header>

    <div class="main">
        <!-- Container -->
        <div class="container">
            <div class="row">

                <!-- Image -->
                <div class="mt-3 p-4">
                    <div class="col-12">
                        <img src="<?php echo $drink['image']; ?>" class="d-block w-75" alt="<?php echo $drink['name']; ?>">
                    </div>
                </div>
                <!-- Image -->

                <!-- Ingredients -->
                <div class="p-4 border-bottom">
                    <div class="row">
                        <div class="col-9 p-2">
                            <h3 class="p-4 text-left border-bottom">Ingredients</h3>
                        </div>
                        <div class="col-9 p-4">
                            <p>
                                <?php echo $drink['ingredients']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Ingredients -->

                <!-- Directions -->
                <div class="p-4 border-bottom">
                    <div class="row">
                        <div class="col-9 p-2">
                            <h3 class="p-4 text-left border-bottom">Directions</h3>
                        </div>
                        <div class="col-9 p-4">
                            <p>
                                <?php echo $drink['directions']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Directions -->

                <!-- Video -->
                <div class="p-4 border-bottom">
                    <div class="row">
                        <div class="col-9 p-2">
                            <h3 class="p-4 text-left border-bottom">Video directions</h3>
                        </div>
                        <div>
                            <a href="<?php echo $drink['video_embed']; ?>" target="_blank" class="btn btn-primary">Watch Video</a>
                        </div>
                    </div>
                </div>
                <!-- Video -->

                <!-- Comment Form -->
                <?php if (isset($_SESSION['user_username'])) : ?>
                    <div class="p-4 border-bottom">
                        <h3 class="p-4 text-left border-bottom">Leave a Comment</h3>
                        <form id="drinkscommentForm" data-username="<?php echo $_SESSION['user_username']; ?>">
                            <input type="hidden" id="drinkId" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <textarea class="form-control" name="comment_text" rows="4" placeholder="Write your comment..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>
                <?php else : ?>
                    <div class="p-4 border-bottom">
                        <h3 class="p-4 text-left border-bottom">Leave a Comment</h3>
                        <p>Please <a href="../frontend/login.php">login</a> to leave a comment.</p>
                    </div>
                <?php endif; ?>
                <!-- Comment Form -->

                <!-- Comment List -->
                <div class="p-4 border-bottom">
                    <h3 class="p-4 text-left border-bottom">Comments</h3>
                    <div class="comment-list">
                        <?php foreach ($comments as $comment) : ?>
                            <div class="comment">
                                <p><?php echo $comment['comment_text']; ?></p>
                                <?php
                                // Fetch the username based on the user ID
                                $userStmt = $conn->prepare('SELECT username FROM users WHERE id = ?');
                                $userStmt->bind_param('i', $comment['user_id']);
                                $userStmt->execute();
                                $userResult = $userStmt->get_result();
                                $user = $userResult->fetch_assoc();
                                ?>
                                <p>Posted by: <?php echo $user['username']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Comment List -->

            </div>
        </div>
        <!-- Container -->
    </div>

    <footer>
        <!-- Footer -->
        <?php include '../phpinclude/footer.php'; ?>
        <!-- Footer -->
    </footer>
</body>

<!-- Bootstrap JavaScript Libraries -->
<script src="../backend/session.js"></script>
<script src="../backend/comments.js"></script>
<script>
    function myFunction() {
        alert("That feature is under development. Please wait for further updates.");
    }
</script>

</html>
