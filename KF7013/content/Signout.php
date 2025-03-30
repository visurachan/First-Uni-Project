<?php
// Start the session
session_start();


session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the login page or home page after logout. ATTENTION !!! change to last page
header("Location: index.php");
exit;
?>
