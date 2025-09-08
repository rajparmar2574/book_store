<?php
require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- custom css filr link -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/navbar.js"></script>
</head>

<body id="nav-togglebar" >

<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpass']));
    $otp = $_POST['otp'];

    // 1. Check if the email exists in the database.
    $emailquery = "SELECT * FROM signin WHERE email='$email'";
    $query = mysqli_query($conn, $emailquery);
    $emailcount = mysqli_num_rows($query);

    if ($emailcount > 0) {
        // 2. If the email exists, show an alert.
        ?>
        <script>
            alert("User already exists!");
        </script>
        <?php
    } else {
        // 3. If the email doesn't exist, validate the OTP first.
        $otpquery = "SELECT * FROM otp WHERE email='$email'";
        $otpResult = mysqli_query($conn, $otpquery);
        $otpCount = mysqli_num_rows($otpResult);

        if ($otpCount > 0) {
            $otpData = mysqli_fetch_assoc($otpResult);
            $storedOtp = $otpData['otp'];
            $expirationTime = $otpData['exptime'];

            // 4. Check if the OTP is correct and not expired.
            if ($otp == $storedOtp) {
                if (time() <= $expirationTime) {
                    // OTP is valid and not expired, proceed with registration.

                    // 5. Check if the passwords match.
                    if ($pass == $cpass) {
                        // Insert the user into the database.
                        $insertquery = "INSERT INTO signin (name, email, password, cpass) VALUES ('$name', '$email', '$pass', '$cpass')";
                        $iquery = mysqli_query($conn, $insertquery);
                        if ($iquery) {
                            ?>
                            <script>
                                alert("Sign-in successful, please login.");
                            </script>
                        
                            <?php
                            header("location:login.php");
                            // header("location: login.php"); // Uncomment if you want to redirect after successful sign-in.
                        } else {
                            ?>
                            <script>
                                alert("Something went wrong during registration!");
                            </script>
                            <?php
                        }
                    } else {
                        ?>
                        <script>
                            alert("Passwords do not match!");
                        </script>
                        <?php
                    }
                } else {
                    // OTP has expired.
                    ?>
                    <script>
                        alert("OTP has expired. Please request a new one.");
                    </script>
                    <?php
                }
            } else {
                // Invalid OTP.
                ?>
                <script>
                    alert("Invalid OTP.");
                </script>
                <?php
            }
        } else {
            // No OTP found in the database for this email.
            ?>
            <script>
                alert("No OTP generated for this email. Please request an OTP first.");
            </script>
            <?php
        }
    }
}
mysqli_close($conn);
?>


<section class="sign-in">
        <div class="container sign-in-lining">
            <div class="row sign-in-lining-content ">          
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="./assets/image/sign-in-img.png" alt="login form" class="img-fluid ms-3">
                            </div>
                            <div class="col-md-6 col-lg-7 col-12 ">
                                <div class="sign-in-card-body">
                                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">

                                        <div class="sign-in-header">
                                            <div class="sign-in-title">
                                            <h5 class="">Sign in</h5>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="name" class="form-control form-control-lg" name="name"
                                                placeholder="name" required />
                                        </div>
                                        <div style="display:flex; gap:10px; " class="form-outline mb-4">
                                      
                                            <input type="text" class="form-control form-control-lg" name="email"
                                                placeholder="email" required />
                                            <button style="padding:10px 20px;background:#f44344;color:white;border-radius:10px;outline:none;border:none;" require onclick="handleOtpSend()">verify</bnutton>                                  
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="number" class="form-control form-control-lg" name="otp" id="" placeholder="Enter otp here">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control form-control-lg" name="password"
                                                placeholder="password" required />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" class="form-control form-control-lg" name="cpass"
                                                placeholder="confirm password" required />
                                        </div>
                                        
                                    
                                        <!-- <div class="form-outline mb-4">
                                            <select name="user_type" class="user_type">
                                                <option value="user">user</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div> -->
                                        <div class="sign-in-footer">
                                            <button type="submit" class="btn btn-primary" name="submit">signin now</button>
                                            <br>
                                            <p>already have an account?
                                                <a href="login.php">login</a>
                                            </p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        
                    </div>
                
            </div>
        </div>
    </section>
    
    </form>
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
    const data=await fetch(`otpgenerate.php?email=${email}&type=email`)
    console.log(await data.json());
};

    </script>
</body>

</html>