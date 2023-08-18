
<?php
session_start();
if(!isset($_SESSION["background"])){
  $_SESSION["background"]="";
}
if(isset($_POST["dark"])){
    $_SESSION["background"]="darkgray";
}
else if(isset($_POST["light"])){
    $_SESSION["background"]="#FFFFFF";

}


?>
<section id="header">
<a href="index.html">
    <img src="img/logo.png" alt="homeLogo">
</a>

<div>
    <ul id="navbar">
        <li class="link">
            <a class="active " href="index.html"></a>
        </li>
        <li class="link">
            <a href="shop.php"></a>
        </li>
        <li class="link">
            <a href="blog.html">Blog</a>
        </li>
        <li class="link">
            <a href="about.html">About</a>
        </li>
        <li class="link">
            <a href="contact.html">Contact</a>
        </li>
        <li class="link">
            <a href="signup.php">Signup</a>
        </li>
        <li class="link">
            <a href="lang.php?lang=en">English</a>
        </li>
        <li class="link">
            <a href="arabic.php">Arabic</a>
        </li>
    <?php if(isset($_SESSION['indicate']) && $_SESSION['indicate']==0){?>
    <li class="link">
    <a href="login.php">Login</a>
    </li>
    
    <?php }else if(isset($_SESSION['indicate']) && $_SESSION['indicate']==1){?>
    <li class="link">
    <button class="border-0 bg-transparent" name="logout"><a href="logout.php">Logout</a></button>
    </li>
    <li class="text-danger link font-monospace" >Hello, <?=  $_SESSION['userName'] ?></li>
    <?php } ?>
    <form action="" method="post">
    <li class="link">
    <button class="border-0 bg-transparent" type="submit" name="light"><i class="fas fa-sun"></i></button>
    </li>
    </form>

    <form action="" method="post">

    <li class="link">
    <button class="border-0 bg-transparent" type="submit" name="dark"><i class="fas fa-moon"></i> </button>
    </li>
    </form>

     
        <li class="link">
            <a id="lg-cart" href="cart.html">
                <i class="fas fa-shopping-cart"></i> 
            </a>
        </li>
        <a href="#" id="close"><i class="fas fa-times"></i> </a>
    </ul>

</div>

<div id="mobile">
    <a href="cart.html">
        <i class="fas fa-shopping-cart"></i>
    </a>
    <a href="#" id="bar"> <i class="fas fa-outdent"></i> </a>
</div>
</section>