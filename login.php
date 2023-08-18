<?php
include "header.php";
include "navbar.php";
$titleErr=$priceErr=$quantity=$describtion="";
$title = $quantityErr= $desErr= $price =$image= $imageErr = "";
$successSub=0;
$errMsg="";
$counter=0;

if (!isset($_SESSION['indicate'])) {
  $_SESSION['indicate']=0;

}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit'])){

if(test_input($_REQUEST['mail'])=="admin@gmail.com" && test_input($_REQUEST['pass']=="admin")){
  header("Location:./admin/view/addCategory.php");
}
}




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit']) && isset($_SESSION['regist'])) {


  

  foreach($_SESSION['regist'] as $user) {
    if($user['email'] == $_REQUEST['mail'] && $user['pass'] == $_REQUEST['pass']) {
    $_SESSION['userName']=$user['name'];
    $_SESSION['indicate']=1;

    header("Location:shop.php");
 
    }


    else{
      $errMsg = "Incorrect mail or password";
    
    }
  }
  }


  








  
  echo $errMsg;





    


    






        
    
    

    
    
























    
    
  



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color: <?= $_SESSION['background']?>">
<div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form method="post">
                  <div class="form-group">
                    <label>email *</label>
                    <input type="email" class="form-control p_input" name="mail">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="text" class="form-control p_input" name="pass">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="forgetPassword.php" class="forgot-pass">Forgot password</a>
                  </div>
                 <div class="mx-5 my-4"><p class="text-danger font-weight-bold ms-2"><?= $errMsg ?></p></div>


                  <div class="text-center">
                    <button class="btn btn-primary btn-block enter-btn" name="submit">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook me-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up">Don't have an Account?<a href="signup.php"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  

    <p><?=$_SESSION['indicate']?></p>
    <?php include "footer.php" ?>


    //table user, product, cart ,, review comment , rating  = session
  
</body>
</html>


            
             