<?php
// Start the session (if not already started)
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect the user to the homepage
header("Location: http://localhost/pet_shop/index/index.php"); // Correct URL for the homepage
exit(); // Ensure no further code is executed after redirection
?>