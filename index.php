<?php include("header.php"); ?>
        <?php 
        if(isset($_SESSION['useruid'])){
            echo "<p>Hello " .$_SESSION['useruid'] .  "</p>";
        }
         ?>
        <h1 class="banner-title">This is an Introduction</h1>
        <p class="banner-text">Here is an important paragraph that explains the purpose of the  website and why you here!</p>

        <section class="categories">
            <h2>Some Basic Categories</h2>
            <div class="row">
                <div class="col">
                    <h2>Fun Stuff</h2>
                </div>
                <div class="col">
                    <h2>Serious Stuff</h2>
                </div>
                <div class="col">
                    <h2>Exciting Stuff</h2>
                </div>
                <div class="col">
                    <h2>Boring Stuff</h2>
                </div>
            </div>
        </section>
<?php include("footer.php"); ?>