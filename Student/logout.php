<?php
session_name("student_session"); // Target the student session
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("location:index.php");// Redirect to student login page
exit();
?>
