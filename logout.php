<?php
session_start();

function logout() {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: login.php");
    exit;
}

// Check if the logout button is clicked
if (isset($_POST['logout'])) {
    logout();
}
?>
