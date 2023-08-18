<?php include 'header.php';?>
<?php include 'navbar.php';?>

<?php
$_SESSION["total"]=0;
if(!isset($_SESSION['indicate']) || $_SESSION['indicate']==0){
    header('HTTP/1.0 403 Forbidden');
    echo 'Access denied please login.';
    exit();


}
  $index="";
  if(isset($_GET["index"])){
   $index=$_GET["index"];
  }
  if(!isset($_SESSION["cart"])) {echo "error";
    $_SESSION["cart"]=array();
  }

  if(!in_array($index,$_SESSION["cart"])){
  $_SESSION["cart"][]= $index;
//   print_r($_SESSION["cart"]);

  }

  if (isset($_POST['remove'])) {
    $removedId = $_POST["remover"];
    unset($_SESSION["cart"][$removedId]);
    $_SESSION["cart"]=array_values($_SESSION["cart"]);
    print_r($_SESSION["cart"]);

  }
  if(isset($_POST["confirm"])){
    header("Location:confirmOrder.php");
  }
//   print_r($_SESSION["qty"]); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: <?= $_SESSION['background']?>">
<section id="page-header" class="about-header"> 
        <h2>#Cart</h2>
        <p>Let's see what you have.</p>
    </section>
 
    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Desc</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Subtotal</td>
                    <td>Remove</td>
                    <td>Edit</td>
                </tr>
            </thead>
   
            <tbody>
                <?php if(isset($_SESSION["cart"]) && isset($_SESSION["products"]) && isset($_SESSION["total"]) ){?>
                <?php foreach($_SESSION["cart"] as $cart){?>
                <tr>
                    <?php if(isset($_SESSION['products'][$cart]['image'])){?>
                    <td><img src="<?= $_SESSION['products'][$cart]['image']?>" alt="images"></td>
                    <?php } ?>

                    <?php if(isset($_SESSION['products'][$cart]['title'])){?>
                    <td><?= $_SESSION['products'][$cart]['title']?></td>
                    <?php } ?>

                    <td></td>
                    <?php if(isset($_SESSION['products'][$cart]['quantity'])){?>

                    <td><?=$_SESSION['products'][$cart]['quantity']?></td>
                    <?php } ?>
                    
                  

                    <?php if(isset($_SESSION['products'][$cart]['price'])){?>
                    <td><?= $_SESSION['products'][$cart]['price']?></td>
                    
                    <td><?=$_SESSION['products'][$cart]['quantity'] *  $_SESSION['products'][$cart]['price']?></td>

                     <?php $_SESSION['total'] += $_SESSION['products'][$cart]['quantity'] *  $_SESSION['products'][$cart]['price'] ?>

                    <form action="" method="post">
                    <input type="hidden" name="remover" value="<?= array_search($cart,$_SESSION['cart'])?>" >
                    <td><button type="submit" name="remove" value="<?php echo $cart;?>"  class="btn btn-danger">Remove</button></td>
                    </form>
                    <?php }?>

                    <!-- Remove any cart item  -->
                    <td></td>
                    
                    
                
                </tr>
                <?php } ?>
                <?php } ?>

            </tbody>
            <!-- confirm order  -->
            <form action="" method="post">
            <td><button type="submit" name="confirm" class="btn btn-success">Confirm</button></td>
            </form>

            
        </table>
    </section>

    <section id="cart-add" class="section-p1">
        <div id="coupon">
            <h3>Coupon</h3>
            <input type="text" placeholder="Enter coupon code">
            <button class="normal">Apply</button>
        </div>
        <div id="subTotal">
            <h3>Cart totals</h3>
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>$<?=$_SESSION["total"]?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>$<?=$_SESSION["total"]?></strong></td>
                </tr>
            </table>
            <button class="normal">proceed to checkout</button>
        </div>
    </section>

    <?php include "footer.php" ?>

    
</body>
</html>

