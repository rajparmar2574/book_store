<?php
require_once "config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $email_serch = "select * from signin where email='$email'";
        $query = mysqli_query($conn, $email_serch);
        $email_count = mysqli_num_rows($query);

        if ($email_count > 0) {
            $sql = "select * from signin where email='$email' and password ='$pass'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if ($count) {
                
                    if($row['email'] == 'admin@gmail.com')
                    {
                        $_SESSION['admin_name'] = $row['name'];
                        $_SESSION['admin_email'] = $row['email'];
                        $_SESSION['admin_id'] = $row['id'];
                        header('location:admin_page.php');
                    } 
                    elseif ($count) 
                    {
                        $_SESSION['user_name'] = $row['name'];
                        $_SESSION['user_email'] = $row['email'];
                        $_SESSION['user_id'] = $row['id'];
                        header("location:home.php");
                    }
            }
            else
            {
                ?>
                <script>
                    alert(" invalid  password");
                </script>
                <?php
            }
        } 
        else 
        {
            ?>
            <script>
                alert(" invalid email");
            </script>
            <?php
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
                                    <h5>login</h5>
                                </div>
                            </div>
                                <div class="form-outline">
                                    <input type="email" class="form-control form-control-lg" name="email" placeholder="email" required />
                                </div>
                                <div class="form-outline">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="password" required />
                                </div>
                            <div class="sign-in-footer">
                                <button type="submit" class="btn btn-primary" name="submit">login</button>
                                <br>
                                <p>don't have an account?
                                    <a href="register.php">sign in</a>
                                </p>
                               
                                    <a href="forgetpwd.php">forget password ?</a>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>