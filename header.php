<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <nav class="main-nav">
        <div class="brand-logo">
       
            <h2>Blog</h2>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="discover.php">About us</a></li>
            <li class="nav-item"><a class="nav-link" href="blog.php">Find blogs</a></li>
            <?php

                if(isset($_SESSION['useruid'])){
                    echo " <li class='nav-item'><a class='nav-link' href='profile.php'>Profile page</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='includes/logout.inc.php'>Log out</a></li>";
                }else{
                    echo " <li class='nav-item'><a class='nav-link' href='signup.php'>Sign up</a></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
                }

            ?>
            
        </ul>
    </nav>

    <div class="wrapper">