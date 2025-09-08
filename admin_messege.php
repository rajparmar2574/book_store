<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `messege` WHERE messege_id = '$delete_id'") or die('query failed');
    header('location:admin_messege.php');
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

    <section class="messege">
        <h1 class="title"> User message </h1>
        <div class="container">
            <div class="row">
                <?php
                $select_message = mysqli_query($conn, "SELECT * FROM `messege`") or die('query failed');
                if (mysqli_num_rows($select_message) > 0) {
                    while ($fetch_message = mysqli_fetch_assoc($select_message)) {

                        ?>

                        <div class="col-lg-3 col-md-4 ">
                            <div class="order-border">
                                <p> user id : <span>
                                        <?php echo $fetch_message['id']; ?>
                                    </span> </p>
                                <p> name : <span>
                                        <?php echo $fetch_message['name']; ?>
                                    </span> </p>
                                <p> number : <span>
                                        <?php echo $fetch_message['number']; ?>
                                    </span> </p>
                                <p> email : <span>
                                        <?php echo $fetch_message['email']; ?>
                                    </span> </p>
                                <p> message : <span>
                                        <?php echo $fetch_message['message']; ?>
                                    </span> </p>
                                <a href="admin_messege.php?delete=<?php echo $fetch_message['messege_id']; ?>"
                                    onclick="return confirm('delete this message?');" class="btn btn-primary">delete message</a>
                            </div>
                        </div>
                        <?php
                    }
                    ;
                } else {
                    echo '<p class="empty">you have no messages!</p>';
                }
                ?>
            </div>
        </div>

    </section>


</body>

</html>