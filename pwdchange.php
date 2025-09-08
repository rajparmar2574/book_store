<?php
require_once "config.php";
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- custom css filr link -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/navbar.js"></script>
</head>

<body id="nav-togglebar">
   
    <?php

    include('config.php');

    if (isset($_POST['chpwd'])) {
        $email = $_POST['mail'];
        $newPwd=mysqli_real_escape_string($conn, md5($_POST['password']));
        $cnewPwd=mysqli_real_escape_string($conn,md5($_POST["cpassword"]));
        
        echo $email;
       if($newPwd!=$cnewPwd){
        
        header("location:pwdchange.php?email=$email&error=confirm password not match");

       }else{ 

        

          $q="update signin set password='$newPwd',cpass='$cnewPwd' where email='$email'";
          if(mysqli_query($conn,$q)){
            header("location:login.php");
          }
       }
        }
    
    ?>

    <section class="sign-in login">
        <div class="container sign-in-lining">
            <div class="row sign-in-lining-content">
                <div class="col-md-6 col-lg-5 d-none d-md-block ">
                    <img src="./assets/image/sign-in-img.png" alt="login form" class="img-fluid login-logo ms-lg-5">
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body ">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                            <div class="sign-in-header ">
                                <!-- <img src="./assets/image/a1.png" alt="" class="img-fluid sign-in-logo "> -->
                                <div class="sign-in-title">
                                    <h5>Change password</h5>
                                </div>
                            </div>
                                <div class="form-outline">
                                    <input readonly type="email" value="<?php if($_GET["email"]){echo $_GET["email"];}else { echo "";} ?>" class="form-control form-control-lg" name="mail" required />
                                </div>
                                <div class="form-outline">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Enter password" required />
                                </div>
                                <div class="form-outline">
                                    <input type="password" class="form-control form-control-lg" name="cpassword" placeholder="confirm password" required />
                                </div>
                                <p style="color:red"><?php if($_GET["error"]){echo $_GET["error"];} ?></p>
                                <input type="submit" style="padding:10px 20px;background:#f44344;text-wrap:nowrap;color:white;border-radius:10px;outline:none;border:none" value="change password" name="chpwd">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>