<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `signin` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_user.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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

<body>

    <?php include 'admin_navbar.php'; ?>

    <section class="users">
        <h1 class="title"> User accounts </h1>
            <div class="container">
                <div class="row">
                    <?php
                    $select_users = mysqli_query($conn, "SELECT * FROM `signin`") or die('query failed');
                    while ($fetch_users = mysqli_fetch_assoc($select_users)) {
                        ?>

                        <div class="col-lg-3 col-md-4 ">
                        <div class="order-border">
                            <p> user id : <span>
                                    <?php echo $fetch_users['id']; ?>
                                </span> </p>
                            <p> username : <span>
                                    <?php echo $fetch_users['name']; ?>
                                </span> </p>
                            <p> email : <span>
                                    <?php echo $fetch_users['email']; ?>
                                </span> </p>
                            <p> user type : <span
                                    style="color:<?php if ($fetch_users['email'] == 'admin01@gmail.com') {
                                        echo 'var(--red)';
                                    } ?>"><?php echo $fetch_users['name']; ?></span> </p>
                            <a href="admin_user.php?delete=<?php echo $fetch_users['id']; ?>"
                                onclick="return confirm('delete this user?');" class=" btn btn-primary">delete
                                user</a>
                        </div>
                                </div>
                    <?php
                        }
                        ;
                        ?>
                </div>                   
            </div>

    </section>









    <!-- custom admin js file link  -->
    <script src="js/admin_script.js"></script>

</body>

</html>