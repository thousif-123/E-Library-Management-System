<?php
include "navbar.php";
include "connection.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
        body
        {
            background-image: url("images/66.jpg");
            background-repeat: no-repeat;
        }
        .wrapper
        {
            padding: 10px;
            margin: -20px auto;
            width:900px;
            height: 600px;
            background-color: black;
            opacity: .8;
            color: white;
        }
        .form-control
        {
            height: 70px;
            width: 60%;
        }
        .scroll
        {
            width: 100%;
            height: 300px;
            overflow: auto;
        }

    </style>
</head>
<body>

    <div class="wrapper">
        <h4>If you have any suggestions or questions, please comment below.</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <input class="form-control" type="text" name="comments" placeholder="Write something..."><br>   
            <input class="btn btn-default" type="submit" name="submit" value="Submit" style="width: 100px; height: 35px;">      
        </form>
    
    <br><br>
    <div class="scroll">
        
        <?php
            if(isset($_POST['submit']))
            {
                if(isset($_SESSION['login_user'])) {
                    // Sanitize user input
                    $comments = mysqli_real_escape_string($db, $_POST['comments']);
                    $login_user = mysqli_real_escape_string($db, $_SESSION['login_user']);
                    
                    $sql="INSERT INTO `comments` (`username`, `comment`) VALUES ('$login_user', '$comments')";
                    if(mysqli_query($db, $sql))
                    {
                        $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
                        $res=mysqli_query($db, $q);

                        echo "<table class='table table-bordered'>";
                        while ($row=mysqli_fetch_assoc($res)) 
                        {

                            echo "<tr>";
                                echo "<td>"; echo $row['username']; echo "</td>";
                                echo "<td>"; echo $row['comment']; echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                } else {
                    echo "Please log in to leave a comment.";
                }
            }
            else
            {
                $q="SELECT * FROM `comments` ORDER BY `comments`.`id` DESC"; 
                $res=mysqli_query($db, $q);

                echo "<table class='table table-bordered'>";
                while ($row=mysqli_fetch_assoc($res)) 
                {
                    echo "<tr>";
                        echo "<td>"; echo $row['username']; echo "</td>";
                        echo "<td>"; echo $row['comment']; echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </div>
    </div>
    
</body>
</html>
