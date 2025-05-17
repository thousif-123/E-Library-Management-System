<?php
include "connection.php";
include "navbar.php";

if(isset($_GET['username'])) {
    $username = $_GET['username'];
    
    // Delete student from the database
    $query = "DELETE FROM student WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if($result) {
        ?>
        <script type="text/javascript">
            alert("Student removed successfully.");
            window.location = "student.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Failed to remove student. Please try again.");
            window.location = "student.php";
        </script>
        <?php
    }
}
?>
