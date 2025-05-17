<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Notice Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .notice {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            position: relative;
        }

        .notice-actions {
            position: absolute;
            top: 5px;
            right: 5px;
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

        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Online Notice Board</h1>
        <div id="notice-list">
            <?php
                include 'connection.php';

                // Fetch notices from the database
                $query = "SELECT * FROM notices";
                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='notice'>";
                        echo "<div class='notice-actions'>";
                        echo "<a href='edit_notice.php?id=" . $row['id'] . "' class='btn'>Edit</a>";
                        echo "<a href='delete_notice.php?id=" . $row['id'] . "' class='btn' onclick='return confirm(\"Are you sure you want to delete this notice?\")'>Delete</a>";
                        echo "</div>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<p><small>" . $row['created_at'] . "</small></p>";
                        echo "</div>";
                    }
                } else {
                    echo "No notices found.";
                }
            ?>
        </div>

        <!-- Add Notice Form -->
        <div class="form-container">
            <h2>Add Notice</h2>
            <form action="add_notice.php" method="POST">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <input type="submit" value="Submit">
            </form>
        </div>
        </div>
        <a href="books.php" class="btn">Go Back</a>
    </div>
    </div>
</body>
</html>
