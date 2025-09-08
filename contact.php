<?php
include 'config.php';

session_start();
   $user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['send'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $number = $_POST['number'];
  $msg = mysqli_real_escape_string($conn, $_POST['message']);

  $select_message = mysqli_query($conn, "SELECT * FROM `messege` WHERE name = '$name' AND email = '$email'") or die('query failed');

  if(mysqli_num_rows($select_message) > 0){
     ?>
   <script>
       alert("message sent already!");
   </script>
   <?php
  }else{
     mysqli_query($conn, "INSERT INTO `messege`(id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
     ?>
     <script>
         alert("message sent successfully!");
     </script>
     <?php
  }

}
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
<body id="nav-togglebar">
  <?php include 'navbar.php'; ?>

 
  <section id="contact" class="contact">
      <div class="section-title">
        <h1 class="title">Contact Us</h1>
        <p>Your contact information is used to contact you, and can include information such as your name, phone number
          and email. </p>
      </div>
  <div class="connect mt-5">
      <div class="info-wrap">
        <div class="row">
          <div class="col-lg-3 col-md-6 info">
            <i class="fa fa-map-marker"></i>
            <h4>Location:</h4>
            <p>410,Platinum Plaza,<br>Palanpur, 360009.</p>
          </div>

          <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
            <i class="fa fa-clock-o"></i>
            <h4>Open Hours:</h4>
            <p>Monday-Saturday:<br>08:30 AM - 9:00 PM</p>
          </div>

          <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
            <i class="fa fa-envelope-o"></i>
            <h4>Email:</h4>
            <p>info@successinfotech.co.in<br></p>
          </div>

          <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
            <i class="fa fa-mobile-phone"></i>
            <h4>Call:</h4>
            <p>+91 56287 35683<br>+91 57547 56477</p>
          </div>
        </div>
      </div>
<!-- form -->
      <form class="form1" method="post">
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="number" id="subject" placeholder="Your Number" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>

        <div class="text-center"><button name="send" type="submit" class="btn">Send Message</button></div>
      </form>
    </div>
  </section>
  <?php include 'footer.php'; ?>

</body>
</html>