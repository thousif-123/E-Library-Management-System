<?php
include 'connection.php';

// Check if notice id is provided in the URL
if(isset($_GET['id'])) {
    $notice_id = $_GET['id'];

    // Delete the notice from the database
    $delete_query = "DELETE FROM notices WHERE id = '$notice_id'";
    $delete_result = mysqli_query($db, $delete_query);

    if ($delete_result) {
        // Notice deleted successfully
        header("Location: noticeboard.php");
        exit();
    } else {
        // Error deleting notice
        echo "Error deleting notice.";
    }
} else {
    // Redirect if notice id is not provided
    header("Location: noticeboard.php");
    exit();
}
?>
