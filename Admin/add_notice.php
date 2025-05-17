<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Insert notice into the database
    $query = "INSERT INTO notices (title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($db, $query);

    if ($result) {
        // Notice added successfully
        echo "<script>alert('Notice added successfully');</script>";
        echo "<script>window.location = 'noticeboard.php';</script>";
    } else {
        // Error adding notice
        echo "<script>alert('Error adding notice');</script>";
        echo "<script>window.location = 'noticeboard.php';</script>";
    }
} else {
    // Redirect to noticeboard.php if accessed directly
    header("Location: noticeboard.php");
    exit();
}
?>
