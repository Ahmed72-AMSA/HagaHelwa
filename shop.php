<?php include 'header.php' ?>
<?php include 'navbar.php' ?>
<?php


if(!isset($_SESSION['indicate']) || $_SESSION['indicate']==0){
  header('HTTP/1.0 403 Forbidden');
  echo 'Access denied please login.';
  exit();


}

?>
   <a href="../"></a>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color: <?= $_SESSION['background']?>;"
>
<section id="product1" class="section-p1">
        <h2>Featured Products</h2>
        <p>Summer Collection New Modren Desgin</p>

        <form method="post">
        
        <div class="pro-container">
           <?php if(isset($_SESSION["products"]) ){?>
           <?php foreach ($_SESSION["products"] as $value) {?>
           <?php if ($value['title']!="") {?>
            <div class="pro row-cols-3">
            <!-- <form> -->
            <img src="<?= $value['image']?>" alt="p1" />
                <div class="des mb-3">
                    <h2><?= $value["title"]?></h2>

                    <div class="star ">
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                        <i class="fas fa-star "></i>
                    </div>
                    <h4>Quantity</h4>
                    <input type="number" name="quantity[]" >
                    <button type="submit" name="submit"><a href="cart.php?index=<?= array_search($value,$_SESSION['products'])?>" class="cart"><i class="fas fa-shopping-cart "></i></a></button>
                     
                </div>
                </div>
                <?php }?>
                <?php }?>
                <?php }?>




</form>
                

                

              
    </section>
    


    <section id="pagenation" class="section-p1">
    <nav aria-label="Page navigation example" >
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="shop.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1 of 2 </a></li>
 
    <li class="page-item">
      <a class="page-link" href="shop.php?" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext ">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail Updates about our latest shop and <span class="text-warning ">Special Offers.</span></p>
        </div>
        <div class="form ">
            <input type="text " placeholder="Enter Your E-mail... ">
            <button class="normal ">Sign Up</button>
        </div>
    </section>


    <?php include 'footer.php' ?>


  
</body>
</html>
    