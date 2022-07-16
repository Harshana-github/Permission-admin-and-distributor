
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style type="text/css">
        body{
            font-family: verdana;
            font-size: 13px;
        }
        header{
            height: 30px;
            padding: 10px;
            background-color: #0b5886;
            color: white;
        }
        header a{
            color: white;
            text-decoration: none;
        }
    </style>
    <header><a href="index.php">Home</a> . <a href="admin.php">Admin</a> . <a href="distributor.php">Distributor</a> . <a href="login.php">Login</a> . <a href="logout.php">Logout</a></header>
    <span>
        <?php

        if(isset($_SESSION['myname']))
        {
            echo "Hi, " . $_SESSION['myname'];
        }
        ?>
        <?php 
  
?>
        
    </span>