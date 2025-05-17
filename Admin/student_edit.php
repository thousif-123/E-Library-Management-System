<?php
include "connection.php";
include "navbar.php";

if(isset($_GET['username'])){
    $username = $_GET['username'];
    
    // Fetch student details based on username
    $query = "SELECT * FROM student WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $first = $row['first'];
        $last = $row['last'];
        $roll = $row['roll'];
        $email = $row['email'];
        $contact = $row['contact'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">
    <h2>Edit Student Details</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="first">First Name:</label>
            <input type="text" class="form-control" id="first" name="first" value="<?php echo $first; ?>" required>
        </div>
        <div class="form-group">
            <label for="last">Last Name:</label>
            <input type="text" class="form-control" id="last" name="last" value="<?php echo $last; ?>" required>
        </div>
        <div class="form-group">
            <label for="roll">Roll:</label>
            <input type="text" class="form-control" id="roll" name="roll" value="<?php echo $roll; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact:</label>
            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php
if(isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $roll = $_POST['roll'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];

    // Update student details in the database
    $query = "UPDATE student SET first='$first', last='$last', roll='$roll', email='$email', contact='$contact' WHERE username='$username'";
    $result = mysqli_query($db, $query);

    if($result) {
        ?>
        <script type="text/javascript">
            alert("Student details updated successfully.");
            window.location = "student.php";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Failed to update student details. Please try again.");
        </script>
        <?php
    }
}
?>
</body>
</html>
