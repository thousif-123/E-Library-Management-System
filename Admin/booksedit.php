<?php
include "connection.php";
include "navbar.php";

if(isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    
    // Fetch book details based on the bid
    $query = "SELECT * FROM books WHERE bid='$bid'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Display form for editing book details
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Book</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <h2>Edit Book Details</h2>
            <form method="post">
                <div class="form-group">
                    <label for="name">Book Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="authors">Authors:</label>
                    <input type="text" class="form-control" id="authors" name="authors" value="<?php echo $row['authors']; ?>">
                </div>
                <div class="form-group">
                    <label for="edition">Edition:</label>
                    <input type="text" class="form-control" id="edition" name="edition" value="<?php echo $row['edition']; ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['department']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
        </div>
    </body>
    </html>
    <?php
    
    // Handle form submission
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $authors = $_POST['authors'];
        $edition = $_POST['edition'];
        $status = $_POST['status'];
        $quantity = $_POST['quantity'];
        $department = $_POST['department'];
        
        // Update book details in the database
        $updateQuery = "UPDATE books SET name='$name', authors='$authors', edition='$edition', status='$status', quantity='$quantity', department='$department' WHERE bid='$bid'";
        $updateResult = mysqli_query($db, $updateQuery);
        
        if($updateResult) {
            // Redirect to books.php after successful update
            header("Location: books.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    }
} else {
    echo "Book ID not provided!";
}
?>
