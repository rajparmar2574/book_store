<?php

include 'config.php';
error_reporting(0);

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'];
         $sub_total = $cart_item['price'];
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
    ?>
    <script>
        alert(" your cart is empty");
    </script>
    <?php
      
   }else{
      if(mysqli_num_rows($order_query) > 0){
        ?>
    <script>
        alert("order already placed!");
    </script>
    <?php
        
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(id, name, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');  
         ?>
         <script>
             alert("order placed successfully!");
         </script>
         <?php
         mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

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
    
    <?php include 'navbar.php'; ?>

<section class="display-order">

   <?php  
      $grand_total = 0;
      
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$user_id'") ;
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = $fetch_cart['price']*$fetch_cart["quantity"];
            $grand_total += $total_price;
   ?>
   <p class="card-total-label"> <?php echo $fetch_cart['name']; ?> <span>: &#8377;<?php echo  $fetch_cart['price']; ?></span> <span>* <?php echo  $fetch_cart['quantity']; ?></span></p>
   <?php
      }
   }else{
      echo '<p class="empty-checkout">your cart is empty</p>';
   }
   ?>
   <p class="card-total-label">  Total : <span>&#8377;<?php echo $grand_total; ?>/-</span> </p>

</section>

<section class="checkout">
   <div class="container">
   <form action="" method="post">
      <h3 class="title">place your order</h3>
     
      

      <div class="row">
          <div class="col-md-6 form-group mb-3">
          <span>name :</span>
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mb-3">
          <span>mobile number :</span>
          <input type="text" name="number" class="form-control" required placeholder="enter your number" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group mb-3">
          <span>email address:</span>
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
          <div class="col-md-6 form-group mb-3">
          <span>payment method:</span>

          <select name="method" class=" dropdown-payment">
               <option value="cash on delivery">cash on delivery</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group mb-3">
          <span>address line 01 :</span>
            <input type="text" class="form-control" min="0" name="flat" required placeholder="e.g. flat no.">
          </div>
          <div class="col-md-6 form-group mb-3">
          <span>address line 01 :</span>
            <input type="text" class="form-control" name="street" required placeholder="e.g. street name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group mb-3">
          <span>city :</span>
            <input type="text" class="form-control" name="city" required placeholder="e.g. mumbai">
          </div>
          <div class="col-md-6 form-group mb-3">
          <span>state :</span>
            <input type="text" class="form-control" name="state" required placeholder="e.g. maharashtra">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 form-group mb-3">
          <span>country :</span>
            <input type="text" class="form-control"  name="country" required placeholder="e.g. india">
          </div>
          <div class="col-md-6 form-group mb-3">
          <span>pin code :</span>
            <input type="text" class="form-control" min="0" name="pin_code" required placeholder="e.g. 123456">
          </div>
        </div>
        <div class=" log-in-btn">
            <input type="submit" value="order now" class="btn btn-primary order_btn" name="order_btn">
        </div>
   </form>
   </div>
</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>