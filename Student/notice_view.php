<?php
  include "connection.php";
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Notices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .notice {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .notice h3 {
            color: #007bff;
        }

        .notice p {
            color: #666;
        }

        .notice small {
            color: #999;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Notices</h1>
        <div id="notice-list">
            <?php

                // Fetch notices from the database
                $query = "SELECT * FROM notices";
                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='notice'>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<p><small>" . $row['created_at'] . "</small></p>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='notice'><p>No notices found.</p></div>";
                }
            ?>
        </div>
        <a href="books.php" class="btn">Go Back</a>
    </div>
</body>
</html>
