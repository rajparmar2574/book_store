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
  <section class="home-intro">
    <div class="container ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h5 class="intro-label">
              Bostorek Bookstore
            </h5>
            <h1 class="intro-title">
              <span style="color:#f44344">book is window to</span> the world
            </h1>
            <p class="intro-description">
              bookstore is the fastest way to compare book prices and buy books from online book sellers in India.
            </p>
            <a href="about.php" class="intro-link">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="./assets/image/slider-img.png" alt="image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="facility">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="feature mb-40">
            <div class="feature-icon"><img
                src="./assets/image/icon-1.webp" alt=""></div>
            <div class="feature-content">
              <h4 class="banner-title" >Free Shipping</h4>
              <p class="banner-bottom">Order over &#8377;2000</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="feature mb-40">
            <div class="feature-icon"><img
                src="./assets/image/icon-2.png" alt=""></div>
            <div class="feature-content">
              <h4 class="banner-title" >Secure Payment</h4>
              <p class="banner-bottom">100% Secure Payment</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12 justify-content-center">
          <div class="feature mb-40">
            <div class="feature-icon"><img src="./assets/image/icon-3.png" alt=""></div>
            <div class="feature-content">
              <h4 class="banner-title" >Best Price</h4>
              <p class="banner-bottom">Guaranteed Low Cost</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="feature mb-40">
            <div class="feature-icon"><img
                src="./assets/image/icon-4.png" alt=""></div>
            <div class="feature-content">
              <h4 class="banner-title" >Easy Return</h4>
              <p class="banner-bottom">Within 30 Days returns</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="home-contact">
    <div class="content">
      <h3>have any questions?</h3>
      <p>Curious about Bookstore's in the GCC?Ask us anything about our brand and products and get factual responses.
      </p>
      <a href="contact.php" class="white-btn">contact us</a>
    </div>
  </section>
  <section class="about_section">
    <div class="container ">
      <div class="row ">
        <div class="col-md-6">
          <div class="img-box">
            <img src="./assets/image/about-img.png" alt="image" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6 about_bg">
          <div class="detail-box">
            <h2 class="intro-title">
              About Our Bookstore
            </h2>
            <p class="intro-description">
            Welcome to book store, a haven for book lovers and storytellers alike. Our journey
             began with a simple passion – a love for books and the desire to share them with the world.
              Whether you’re searching for a timeless classic, an inspiring memoir, or the latest bestseller,
               we are here to bring the magic of reading into your life.
            </p>
            <a href="about.php" class="intro-link">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php include 'footer.php'; ?>
</body>

</html>