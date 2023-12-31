
<?php

include "header.php";
include "navbar.php";
$nameErr=$emailErr=$passErr=$addErr = $numberErr="";
$name = $email= $add = $pass = $number = "";
$errors=array();




// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_REQUEST['submit'])) {
    // title validation

    if(empty($_REQUEST['name'])){
        $nameErr="Name is Required";
        $errors[]=$nameErr;
    }
    else{
    if (!preg_match("/^[a-zA-Z ]*$/", $name)){
    $name="";
    $nameErr="String only allowed";
    $errors[]=$nameErr;


    }
    else {
    $name=test_input($_REQUEST['name']);

    }
  
   }


   if (empty($_REQUEST['email'])) {
    $emailErr = 'Email is required';
    $errors[]=$emailErr;

} else {
    $email = test_input($_REQUEST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'The email is incorrect';
        $errors[]=$emailErr;
    }
    }



if (empty($_REQUEST['pass'])) {
  $passErr = 'Password is required';
  $errors[]=$passErr;
}
else{
  $pass=$_REQUEST['pass'];
}

if (empty($_REQUEST['add'])) {
  $addErr = 'Address is required';
  $errors[]=$addErr;

}
else{
  $add=$_REQUEST['add'];
}



if (empty($_REQUEST['number'])) {
  $numberErr = 'Phone Number is required';
  $errors[]=$numberErr;

} else {
  $number=test_input($_REQUEST['number']);
  if (!is_numeric($number)) {
      $numberErr = 'The Mobile Number must be numeric';
      $errors[]=$numberErr;

  }

}


   
      

      if(empty($errors)){
      if (!isset($_SESSION['category'])) {
          $_SESSION['category'] = array();
      }
        
      $_SESSION['regist'][]=[
      "name" => $name,
      "pass" => $pass,
      "email" => $email
 
      ];
      }
      session_id();
      echo  session_id();

        


    }





    





  



    


    






        
    
    

    
    
























    
    
  



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
<div class="bg-danger mt-2">
            <?php foreach($errors as $error){?>
             <ul>

             <li class="text-warning">
             <?php echo $error ?>
             </li>

             </ul>
             <?php } ?>
            </div>

            <?php if(empty($errors) && isset($_SESSION['regist'])){?>

            <div class="mt-2 bg-info">
            <p>Account created successfully</p>
            </div>
            <?php } ?>


              <div class="card-body px-5 py-5" style="background-color:darkgray;">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="post">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="name" value="<?php $name?>">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email" >
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control p_input" name="pass" >
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control p_input" name="number" >
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control p_input" name="add" >
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit"  class="btn btn-primary btn-block enter-btn" name="submit">Signup</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
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

    <?php include "footer.php" ?>
</body>
</html>

           