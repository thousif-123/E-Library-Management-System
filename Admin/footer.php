<!DOCTYPE html>
<html>
<head>
    <title>Admin Footer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        footer {
            background-color: #000000; /* Black color code */
            color: #fff;
            padding: 40px 0;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .social-links {
            margin-bottom: 20px;
        }

        .social-links a {
            color: #fff;
            font-size: 18px;
            margin: 0 10px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #007bff; /* Change to your preferred hover color */
        }

        .contact-info {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .contact-info p {
            margin: 10px 0;
        }

        .copyright {
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<footer>
    <div class="container">
        <div class="contact-info">
            <p><i class="fa fa-envelope"></i> Email: skthousif474@gmial.com</p>
            <p><i class="fa fa-phone"></i> Phone: +91 7997760378</p>
        </div>
        <div class="copyright">
            <p>&copy; <?php echo date("Y"); ?> All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
