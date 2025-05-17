<?php
include "connection.php";
include "navbar.php";

if(isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    
    // Delete the book from the database
    $deleteQuery = "DELETE FROM books WHERE bid='$bid'";
    $deleteResult = mysqli_query($db, $deleteQuery);
    
    if($deleteResult) {
        // Redirect to books.php after successful deletion
        header("Location: books.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
} else {
    echo "Book ID not provided!";
}
?>
