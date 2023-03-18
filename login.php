<?php include("header.php"); ?>
       
    <section class="signup-form">
        <h2>Login</h2>
        <form class="form-class" action="includes/login.inc.php" method="post">
            <input type="text" name="name" placeholder="Username/Email...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="submit">Log In</button>
        </form>

        <?php 
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        else if($_GET["error"] == "wronglogin"){
            echo "<p>Incorrect Info!</p>";
        }
        
    }

?>

    </section>
       
<?php include("footer.php"); ?>