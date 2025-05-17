<?php
include "connection.php"; // Assuming this file contains your database connection code
include "navbar.php"; // Assuming this file contains your navigation bar code

// Initialize message variables
$message = "";

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve data from form
    $name = $_POST['name'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $status = $_POST['status'];
    $department = $_POST['department'];
    $pdf_path = ''; // Initialize pdf_path variable

    // Check if a file is uploaded
    if(isset($_FILES['pdf_file'])) {
        $pdf_name = $_FILES['pdf_file']['name'];
        $pdf_tmp = $_FILES['pdf_file']['tmp_name'];
        $pdf_path = "uploads/" . $pdf_name; // Adjusted path to match your directory structure

        // Move uploaded file to the 'uploads' directory
        move_uploaded_file($pdf_tmp, $pdf_path);
    }

    // Insert data into the database
    $query = "INSERT INTO `books` (name, authors, edition, status, department, pdf_path) 
              VALUES ('$name', '$authors', '$edition', '$status', '$department', '$pdf_path')";

    $result = mysqli_query($db, $query);

    // Check if the query was successful
    if($result) {
        $message = "Book added successfully";
        echo "<script>alert('$message');</script>";
    } else {
        $message = "Error adding book: " . mysqli_error($db);
        echo "<script>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Books</title>
</head>
<body>
    <!-- Your navigation bar code here -->

    <div id="main">
        <h2>Add Book</h2>
        <form method="post" enctype="multipart/form-data">
            <label>Book Name:</label><br>
            <input type="text" name="name" required><br><br>

            <label>Authors:</label><br>
            <input type="text" name="authors" required><br><br>

            <label>Edition:</label><br>
            <input type="text" name="edition" required><br><br>

            <label>Status:</label><br>
            <select name="status" required>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select><br><br>

            <label>Department:</label><br>
            <input type="text" name="department" required><br><br>

            <label>Upload PDF:</label><br>
            <input type="file" name="pdf_file"><br><br>

            <input type="submit" name="submit" value="Add Book">
        </form>
    </div>
</body>
</html>
