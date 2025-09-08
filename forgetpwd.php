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

    if (isset($_POST['Verify'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $otp=$_POST["otp"];

     
       $res= mysqli_query($conn,"SELECT * FROM forgetpwd where email='$email' and otp='$otp'");
       $r=mysqli_fetch_array($res);
       $e=$r['email'];
       $o=$r['otp'];
       
        if($e!=null && $o!=null){
            header("location:pwdchange.php?email=$email");
        }else{
            header("location:forgetpwd.php?error=somthing went wrong");
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
                                    <h5>Reset password</h5>
                                    
                                </div>
                            </div>
                            <div style="display:flex; gap:10px; " class="form-outline mb-4">
                                      
                                      <input type="text" class="form-control form-control-lg" name="email"
                                          placeholder="email" required />
                                      <button type="button" style="padding:10px 20px;background:#f44344;text-wrap:nowrap;color:white;border-radius:10px;outline:none;border:none" require onclick="handleOtpSend()">Send OTP</bnutton>                                  
                                  </div>
                                  <div class="form-outline mb-4" >
                                      <input type="text" class="form-control form-control-lg" name="otp" id="" placeholder="Enter otp here">
                                      <p style="color:red"><?php if($_GET["error"]){echo $_GET["error"];}else{ echo "";} ?></p>
                                    </div>
                                    <input type="submit" name="Verify" style="padding:10px 20px;background:#f44344;color:white;border-radius:10px;outline:none;border:none" require></input> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
      const handleOtpSend = async () => {
    let email = document.querySelector("input[name='email']").value;

    if (!email) {
        alert("Please enter an email");
        return;
    }
    console.log(email)
    const data=await fetch(`otpgenerate.php?email=${email}&type=forgetpwd`)
    console.log(await data.json());
};

    </script>
</body>

</html>