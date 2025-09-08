<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

<body id="nav-togglebar">
    <?php include 'admin_navbar.php'; ?>
<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="container">
      <div class="row dashboard-bg">
      <div class="col-3 border">
         <?php
            $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") ;
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };
         ?>
         <h3>&#8377;<?php echo $total_pendings; ?>/-</h3>
         <a href="admin_order_pending.php" style="text-decoration: none;"><p>total pending</p></a>
      </div>

      <div class="col-3 border">
         <?php
            $total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") ;
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };
         ?>
         <h3>&#8377;<?php echo $total_completed; ?>/-</h3>
         <a href="admin_order_com.php" style="text-decoration: none;"><p>completed payments</p></a>
      </div>

      <div class="col-3 border ">
         <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") ;
            $number_of_orders = mysqli_num_rows($select_orders);
         ?>
         <h3><?php echo $number_of_orders; ?></h3>
         <a href="admin_order.php" style="text-decoration: none;"><p>order placed</p></a>
      </div>

      <div class="col-3 border">
         <?php 
            $select_products = mysqli_query($conn, "SELECT * FROM `products`") ;
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <a href="admin_product.php" style="text-decoration: none;"><p>product added</p></a>
      </div>

      <div class="col-3 border">
         <?php 
            $select_account = mysqli_query($conn, "SELECT * FROM `signin`") ;
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account; ?></h3>
         <a href="admin_user.php" style="text-decoration: none;"><p>total account</p></a>
      </div>

      <div class="col-3 border ">
         <?php 
            $select_messages = mysqli_query($conn, "SELECT * FROM `messege`") ;
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         
         <a href="admin_messege.php" style="text-decoration: none;"><p>new messages</p></a>
         
      </div>
      </div>
   </div>

</section>

</body>
</html>

</body>

</html>