<?php
session_name("admin_session"); // Target the admin session
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("location:index.php");// Adjust path based on your folder structure
exit();
 // Redirect to admin login page
exit();
?>
