<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="file"] {
            margin-top: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Choose File:</label>
                <input type="file" name="file" id="file" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload">
            </div>
        </form>

        <?php
        // Include database connection file
        include "connection.php";

        // Check if form is submitted
        if(isset($_POST["submit"])) {
            // Check if file is selected
            if($_FILES["file"]["error"] == 0) {
                // Get file name and content
                $file_name = $_FILES["file"]["name"];
                $file_content = file_get_contents($_FILES["file"]["tmp_name"]);

                // Prepare insert query
                $query = "INSERT INTO files (file_name, file_content) VALUES (?, ?)";
                
                // Prepare and bind parameters
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $file_name, $file_content);
                
                // Execute the query
                if($stmt->execute()) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error uploading file: " . $conn->error;
                }
                
                // Close statement
                $stmt->close();
            } else {
                echo "Error: " . $_FILES["file"]["error"];
            }
        }
        ?>
    </div>
</body>
</html>
