 <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "config.php";
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    if (isset($_GET["email"])) {
            $email = $_GET["email"];
            $type=$_GET["type"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo json_encode(["status" => "error", "message" => "Invalid email address"]);
                exit();
            }

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Debugging enabled
    $mail->isSMTP();  
    $mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;  
    $mail->Username   = 'techsoftindia321@gmail.com';  
    $mail->Password   = 'lgrd aion klni tqhm';  // Use an App Password
    $mail->Port = 587;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->setFrom('techsoftindia321@gmail.com', 'Mailer');
    $mail->addAddress($email, 'Book Store'); 

    // ✅ Generate 6-digit OTP
    $otp = rand(100000, 999999);
    // ✅ OTP Expiration time (current time + 5 minutes)
    $expirationTime = time() + (5 * 60);

    $mail->isHTML(true);  
    $mail->Subject = 'Your OTP Code';
    $mail->Body    = "Your OTP is: <b>$otp</b>. It is valid for 5 minutes.";



    if($type=="email"){
    $checkQuery = "SELECT * FROM `otp` WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
                // ✅ If email exists, update the OTP and expiration time
            $updateQuery = "UPDATE `otp` SET otp='$otp', exptime='$expirationTime' WHERE email='$email'";
                if (mysqli_query($conn, $updateQuery)) {
                    // ✅ Attempt to send the email
                    $mail->send();
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to update OTP in the database"]);
                }
        } else {
                // ✅ If email does not exist, insert a new OTP record
                $insertQuery = "INSERT INTO `otp` (email, otp, exptime) VALUES ('$email', '$otp', '$expirationTime')";
                if (mysqli_query($conn, $insertQuery)) {
                    $mail->send();
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to store OTP in the database"]);
                }
            }
        }else{
            $checkQuery = "SELECT * FROM `forgetpwd` WHERE email='$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
                // ✅ If email exists, update the OTP and expiration time
            $updateQuery = "UPDATE `forgetpwd` SET otp='$otp', exptime='$expirationTime' WHERE email='$email'";
                if (mysqli_query($conn, $updateQuery)) {
                    // ✅ Attempt to send the email
                    $mail->send();
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to update OTP in the database"]);
                }
        } else {
                // ✅ If email does not exist, insert a new OTP record
                $insertQuery = "INSERT INTO `forgetpwd` (email, otp, exptime) VALUES ('$email', '$otp', '$expirationTime')";
                if (mysqli_query($conn, $insertQuery)) {
                    $mail->send();
                } else {
                    echo json_encode(["status" => "error", "message" => "Failed to store OTP in the database"]);
                }
            }
        }
        } else {
            echo json_encode(["status" => "error", "message" => "Email is required"]);
        }
    $mail->send();
    echo "OTP Sent Successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
