<!DOCTYPE html>
<html>
<head>
    <title>Read PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
        }
        
        .pdf-container {
            max-width: 100%; /* Ensure PDF fits within container */
            height: 600px; /* Set a fixed height or adjust as needed */
            margin: 0 auto; /* Center the PDF */
            overflow: auto; /* Enable scrolling if necessary */
            border: 1px solid #ccc;
        }
        
        .pdf-container embed {
            width: 100%; /* Ensure PDF fills the container */
            height: 100%; /* Ensure PDF fills the container */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Read PDF</h1>
        
        <div class="pdf-container">
            <?php
            // Include connection file if needed
            include "connection.php";

            // Fetch book ID from URL parameter
            if(isset($_GET['bid'])) {
                $book_id = intval($_GET['bid']); // Sanitize the input

                // Fetch PDF path from database based on book ID
                $query = "SELECT pdf_path FROM `books` WHERE bid = $book_id";
                $result = mysqli_query($db, $query);
                
                if($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $pdf_path = $row['pdf_path'];
                    
                    // Check if PDF path exists
                    if(file_exists($pdf_path)) {
                        // Output PDF file
                        echo "<embed src='$pdf_path' type='application/pdf' width='100%' height='100%' />";
                    } else {
                        echo "PDF file not found for book ID: $book_id";
                    }
                } else {
                    echo "PDF path not found for the given book ID: $book_id";
                }
            } else {
                echo "Invalid request!";
            }
            ?>
        </div>
    </div>
</body>
</html>
