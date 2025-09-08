<?php
include 'config.php';

session_start();
   $user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
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

  <!-- <section class="about_header">
        <p class="intro-title">About Us</p>
        <p> <a href="home.php">home</a> / contact </p>
  </section> -->
  <section class="introduction">
    <div class="container">
      <div class="row introduction-lining">
        <div class="col-md-6 col-sm-12">
          <img src="./assets/image/about.png" alt="image" class="img-fluid">
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="introduction-content">
              <h2 class="title">
                What We Are
              </h2>
              <p class="intro-description ">
              Welcome to book socket_recv, a haven for book lovers and storytellers alike. Our journey
               began with a simple passion – a love for books and the desire to share them with the world.
                Whether you’re searching for a timeless classic, an inspiring memoir, or the latest bestseller
                , we are here to bring the magic of reading into your life.
           </p>
           <p class="intro-description ">
           At book store, we believe that books have the power to transport, educate, and transform.
            Our goal is to create a space where readers of all ages can discover new stories, explore 
            different perspectives, and find their next great read.

           </p>
            </div>
        </div>
      </div>
    </div>

  </section>

  <section class=" team">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="title">Our Team</h5>
            <h2 class="display-20 display-md-18 display-lg-16">Meet our master individuals</h2>
        </div>

  <div class="row row-cols-1 row-cols-md-2 g-4" style="margin:auto;width:80%;" >
  <div class="col">
    <div class="card" >
      <img src="assets/image/nirmal.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Nirmal Jadav</h5>
        <p class="card-text">Administrator</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="assets\image\r.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Raj Parmar</h5>
        <p class="card-text">Product Manager</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="assets/image/dhruv.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Dhruv Vaviya</h5>
        <p class="card-text">Product Distributor</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="assets/image/harsh.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Harsh Maniya</h5>
        <p class="card-text">Product Distributor</p>
      </div>
    </div>
  </div>
</div>

        </div>
    </div>
</section>
  <section class="client">
    <div class="container ">
      <div class="client-header">
        <h2 class="title">
          What <span style="color:black">Client </span>Says
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="client_container">
            <div class="review-box">
              <p>
              "Ordering books online from this store is so easy! Fast delivery and great customer service. Will definitely be back for more!"

              </p>
              <span>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </span>
            </div>
            <div class="client_id">
              <div class="imge-box">
                <img src="./assets/image/c1.jpg" alt="">
              </div>
              <div class="client_name">
                <h5>
                  Jone Mark
                </h5>
                <h6>
                  Student
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mx-auto">
          <div class="client_container ">
            <div class="review-box">
              <p>
              "A hidden gem for book lovers! The atmosphere is cozy, and their collection includes both bestsellers and unique finds. Highly recommend!"
              </p>
              <span>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </span>
            </div>
            <div class="client_id">
              <div class="imge-box">
                <img src="./assets/image/c2.jpg" alt="">
              </div>
              <div class="client_name">
                <h5>
                  Anna Crowe
                </h5>
                <h6>
                  Student
                </h6>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
</body>
</html>