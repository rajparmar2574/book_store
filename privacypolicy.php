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
    <title>privacy policy</title>

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
            display: block;
            margin: 40px auto;
            width: 90%;
            padding: 50px;
            /* margin-left: 300px; */
            /* margin-bottom:40px; */
            font-weight: bold;
        }

        #closelink {

            text-decoration: none;
        }

        #closeBtn {
            display: block;
            width: fit-content;
            margin: auto;
            background: #f44344;
            color: white;
            padding: 7px 15px;
            border-radius: 7px;
        }

        #closeBtn:hover {
            background: red;
        }
    </style>
</head>

<body id="nav-togglebar">



    <section class="placed-orders">

        <h1 class="title">Privacy Policy</h1>
        <div class="term" style="width:70%">

            <p>At book_store, your privacy is of utmost importance to us. This Privacy Policy explains how we collect, use, and protect your personal information when you visit our website and make use of our services. By accessing or using our website, you agree to the terms outlined in this policy.</p>
            <br>
            <h2>1. Information We Collect</h2>
            <p>We may collect the following types of information when you use our website:</p><br>

            <h3>Personal Information:</h3>
            <p>When you create an account, purchase an e-book, or interact with our services, we may collect personal information such as:</p>
            <ul>
                <li>Name</li>
                <li>Email address</li>
                <li>Billing and shipping address</li>
                <li>Payment information (processed by a secure third-party provider)</li><br>
            </ul>

            <h3>Non-Personal Information:</h3>
            <p>We may also collect non-personal information automatically through the use of cookies and similar technologies. This may include:</p>
            <ul>
                <li>IP address</li>
                <li>Browser type</li>
                <li>Device information</li>
                <li>Pages visited and time spent on our site</li><br>
            </ul>

            <h2>2. How We Use Your Information</h2>
            <p>We use your information for the following purposes:</p>
            <ul>
                <li>To process and fulfill your orders, including sending order confirmations and updates</li>
                <li>To communicate with you about your account, products, services, and promotions</li>
                <li>To improve our website, products, and customer service</li>
                <li>To personalize your experience on our site</li>
                <li>To comply with legal obligations or protect our rights</li><br>
            </ul>

            <h2>3. Sharing Your Information</h2>
            <p>We do not sell, trade, or rent your personal information to third parties. However, we may share your data with trusted third-party service providers who assist us in operating our website, processing payments, or delivering e-books. These parties are required to keep your information confidential and use it solely for the purposes of providing their services to us.</p>
            <p>We may also disclose your information when required by law, such as in response to a subpoena or other legal process.</p>
            <br>
            <h2>4. Security of Your Information</h2>
            <p>We take reasonable precautions to protect your personal information, including using encryption for payment processing and implementing secure servers. However, no method of transmission over the internet or electronic storage is completely secure, and we cannot guarantee absolute security.</p>
            <br>
            <h2>5. Cookies and Tracking Technologies</h2>
            <p>We use cookies to enhance your browsing experience and collect usage data. Cookies help us remember your preferences, improve our website functionality, and track site activity. You can adjust your browser settings to refuse cookies, but this may impact your experience on our website.</p>
            <br>
            <h2>6. Your Rights and Choices</h2>
            <p>You have the right to access, correct, or delete your personal information at any time. You may also opt out of receiving promotional emails by following the unsubscribe link provided in the emails.</p>
            <p>To exercise your rights or if you have any questions about your data, please contact us at <strong>contact@bookstore.com</strong>.</p>
            <br>
            <h2>7. Third-Party Links</h2>
            <p>Our website may contain links to third-party websites. We are not responsible for the content or privacy practices of these sites. We encourage you to review their privacy policies before sharing any personal information with them.</p>
            <br>
            <h2>8. Children’s Privacy</h2>
            <p>Our website is not intended for children under the age of 13, and we do not knowingly collect personal information from children. If you believe that a child has provided us with personal information, please contact us immediately, and we will take steps to delete such information.</p>
            <br>
            <h2>9. Changes to This Privacy Policy</h2>
            <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date. Please review this policy periodically for any changes.</p>
            <br>
            <h2>10. Contact Us</h2>
            <p>If you have any questions or concerns about this Privacy Policy or our data practices, please contact us at:</p>
            <p><strong>book_store</strong><br>
                Email: <strong>contact@bookstore.com</strong><br>
                Phone: <strong>+91 56287 35683</strong><br>
                Address: <strong>301,Venus Bussiness Hub,Citylight,Surat.</strong></p>
        </div>
        <div>
            <a id="closelink" href="home.php">
                <button type="submit" id="closeBtn" name="submit">Close</button></a>
        </div>

    </section>
</body>

</html>

<!-- <?php include 'footer.php'; ?> -->