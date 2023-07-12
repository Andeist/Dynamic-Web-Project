<?php
session_start();
session_unset();
session_destroy();

// Redirect to the login page
header('Location: ../../frontend/index.php');
exit();
?>
