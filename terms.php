<?php
include 'config.php';
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>terms</title>

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
  <style>
    .term {
      border: 2px solid black;
      display:block;
      margin:40px auto;
      width: 60%;
      padding: 25px;
      /* margin-left: 300px; */
      /* margin-bottom:40px; */
      font-weight: bold;
    }
    #closelink{

      text-decoration:none;
    }
    #closeBtn{
      display:block;
      width:fit-content;
      margin:auto;
      background:#f44344;
      color:white;
      padding:7px 15px;
      border-radius:7px;
    }
    #closeBtn:hover{
      background:red;
    }
  </style>
</head>

<body id="nav-togglebar">



  <section class="placed-orders">

    <h1 class="title">Terms and condtition</h1>
    <div class="term">
      <p>
        Introduction Welcome to book_store. By accessing and using our website,
        you agree to comply with and be bound by these Terms and Conditions. If you do not agree, please do not use our website.
      </p>
      <p>
        Use of the Website You must be at least 18 years old or have parental/guardian consent to use this website. You agree to
        use the website for lawful purposes only and in a manner that does not infringe on the rights of others. We reserve the
        right to terminate access to users who violate these terms.

      </p>
      <p>
        Account Registration To purchase products, you may need to create an account. You are responsible for maintaining the
        confidentiality of your account credentials. We are not liable for any unauthorized access to your account.
      </p>
      <p>
        Orders and Payments All orders are subject to availability and confirmation. We accept payments via cash on delivery.
        Prices are listed in rupee and are subject to change without notice. We reserve the right to cancel or refuse any
        order at our discretion.

      </p>
      <p>
        Shipping and Delivery Shipping times and costs vary based on location and selected shipping method. We are not responsible
        for delays caused by third-party carriers. Risk of loss transfers to you upon delivery.

      </p>
      <p>
        Returns and Refunds We accept returns within 7 days of purchase if the item is in its original condition. Refunds will
        be issued in the original payment method. Shipping costs for returns may be the customer’s responsibility unless the product
        is defective or incorrect.

      </p>
      <p>
        Intellectual Property All content on this website, including text, images, logos, and designs, is the property of
        book_store and protected by copyright laws. You may not reproduce, distribute, or use our content without
        prior written consent.

      </p>
      <p>
        Limitation of Liability We are not liable for any indirect, incidental, or consequential damages arising from the use of
        our website. We do not guarantee uninterrupted or error-free service.

      </p>
      <p>
        Privacy Policy Your use of our website is also governed by our Privacy Policy, which outlines how we collect, use, and
        protect your personal information.

      </p>
      <p>
        Changes to Terms We may update these terms at any time. Changes will be posted on this page with an updated effective date.
        Your continued use of the website after changes constitutes acceptance of the revised terms.

      </p>
      <p>
        Contact Information If you have any questions regarding these Terms and Conditions, please contact us at +91 56287 35683.

      </p>
    </div>
    <div>
      <a id="closelink" href="home.php">
        <button type="submit" id="closeBtn"  name="submit">Close</button></a>
    </div>

  </section>
</body>

</html>

<!-- <?php include 'footer.php'; ?> -->