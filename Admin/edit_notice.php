<?php
include 'connection.php';

// Check if notice id is provided in the URL
if(isset($_GET['id'])) {
    $notice_id = $_GET['id'];

    // Fetch the notice details from the database
    $query = "SELECT * FROM notices WHERE id = '$notice_id'";
    $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
    } else {
        // Redirect if notice id is invalid
        header("Location: noticeboard.php");
        exit();
    }
} else {
    // Redirect if notice id is not provided
    header("Location: noticeboard.php");
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_title = $_POST['title'];
    $new_description = $_POST['description'];

    // Update notice in the database
    $update_query = "UPDATE notices SET title = '$new_title', description = '$new_description' WHERE id = '$notice_id'";
    $update_result = mysqli_query($db, $update_query);

    if ($update_result) {
        // Notice updated successfully
        header("Location: noticeboard.php");
        exit();
    } else {
        // Error updating notice
        echo "Error updating notice.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-container {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Notice</h1>
        <div class="form-container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=" . $notice_id; ?>" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>

                <input type="submit" value="Update">
            </form>
        </div>
    </div>
</body>
</html>
