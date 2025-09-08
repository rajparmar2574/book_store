<?php
include ('config.php');
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['password']));
    $user_type = $_POST['user_type'];
    mysqli_query($conn, "INSERT INTO `user`(name,email,password,user_type) VALUES('$name','$email','$pass ','$user_type')") or die('query failed');
    $select_user = mysqli_query($conn,"SELECT * FROM `user` WHERE email = '$email' AND password = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_user) > 0){
        $message[] = 'user already exist!';
    }
    else
    {
        mysqli_query($conn, "INSERT INTO `user`(name,email,password,user_type) VALUES('$name','$email','$pass ','$user_type')") or die('query failed');
        $message[] = 'register successfully!';
    }
}
?>

 $result = mysqli_query("SELECT * FROM `user` WHERE `name`= '$name' AND `email`='$email",$conn);
        
        if(mysqli_num_rows($result) > 0)
         {
              echo '
                 <script>
                 alert("user already exist");
                 </script>
             ';
         }
         elseif($pass != $cpass){
              echo '
                 <script>
                 alert("passwords does not match");
                 </script>
             ';
         }
         else{
               $query = "INSERT INTO `user` (name, email,password,user_type) VALUES ('$name', '$email', '$pass','$user_type' )";
               $result = mysqli_query($conn,$query);
               if($result){
                  echo '
                  <script>
                  alert("User Created Successfully.");
                  </script>
              ';
               }
            }
        

<?php
 if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $user_type = $_POST['user_type'];
        $error=array();
        if (empty($name)OR empty($email) OR empty($password)OR empty('user_type')){
            array_push($error,"allfields are requried");
        }
        } 
?>

<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname-"book_store";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if($conn){
        echo "connection was succesful";
        }
    else{
        echo "sorry we failed to connect:";
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $user_type = $_POST['user_type'];
            $sql = "INSERT INTO user (name,email,password,user_type) VALUES ('$name','$email','$pass','$user_type');";
            $rs=mysqli_query($conn,$sql);
            if($rs)
            {
                echo "entries added";
            }
        }

?>

        <?php
include ('config.php');
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = mysqli_real_escape_string($conn,md5($_POST['password']));
    $user_type = $_POST['user_type'];
    mysqli_query($conn, "INSERT INTO `user`(name,email,password,user_type) VALUES('$name','$email','$pass ','$user_type')") or die('query failed');
}
?>

<!-- connection to the database -->
    <!-- $servername="localhost";
    $username="root";
    $password="";
    $database="book_store";
    $conn=mysqli_connect($servername,$username,$password,$database); -->

    <!-- password check for  hash -->
    <!-- //signin
    // $password=password_hash($pass,PASSWORD_DEFAULT);
    // $cpassword=password_hash($cpass,PASSWORD_DEFAULT);
    //login
    // $email_pass=mysqli_fetch_assoc($query);
        // $db_pass=$email_pass['password'];
        // $pass_decode=password_verify($pass,$db_pass); -->



        <!-- <img src="assets/image/book-icon.png" alt="book" class="banner-book-1-img login-banner-icon">
            <img src="assets/image/book-icon-2.png" alt="book" class="banner-book-2-1-img login-banner-icon">
            <img src="assets/image/book-icon-3.png" alt="book" class="banner-book-3-1-img login-banner-icon">
            <img src="assets/image/book-icon.png" alt="book" class="banner-book-4-1-img login-banner-icon">
            <img src="assets/image/book-icon-2.png" alt="book" class="banner-book-5-1-img login-banner-icon">
            <img src="assets/image/book-icon-3.png" alt="book" class="banner-book-6-img login-banner-icon"> -->

            <!-- /* .login-banner-icon{
    height: 100px;
    width: auto;
    position: absolute;
}
.banner-book-1-img {
    left: 130px;
    top: 45%;
    animation:rotate  5s infinite;
}
.banner-book-2-img {
    left: 15%;
    top: 0%;
    animation: UpDown  5s infinite;
}
.banner-book-2-1-img {
    left: 15%;
    top: -18%;
    animation: UpDown_login  5s infinite;
}
.banner-book-3-img {
    left: 0%;
    top: 95%;
    animation: LeftRight 5s infinite;
}
.banner-book-3-1-img {
    left: 0%;
    top: 110%;
    animation: LeftRight 5s infinite;
}
.banner-book-4-img {
    right: 72px;
    top: 0%;
    animation: RightLeft  5s infinite;
}
.banner-book-4-1-img {
    right: 72px;
    top: -23%;
    animation: RightLeft  5s infinite;
}
.banner-book-5-img {
    right: 15%;
    top: 82%;
    animation: rotate  5s infinite;
}
.banner-book-5-1-img {
    right: 15%;
    top: 102%;
    animation: rotate  5s infinite;
}
.banner-book-6-img {
    right: 5%;
    bottom: 25%;
    animation: UpDown_1 5s infinite;
}
@keyframes rotate {
    0%, 15% {
        transform: rotateZ(0);
      }
      25% {
        transform: rotateZ(-20deg);
      }
      45% {
        transform: rotateZ(15deg);
      }
      65% {
        transform: rotateZ(-10deg);
      }
      75% {
        transform: rotateZ(6deg);
      }
      95% {
        transform: rotateZ(-4deg);
      }
     100% {
        transform: rotateZ(0);
      }
    
}
@keyframes UpDown {
    
    0%  {   
        top: 0%;
    }
    25%  {
        top: 4%;
    }
    75%  {
        top: 10%;
    }
    100% {
        top: 0%;
    }
}
@keyframes UpDown_login {
    0%  {   
        top: -18%;
    }
    25%  {
        top: -22%;
    }
    75%  {
        top: -25%;
    }
    100% {
        top: -18%;
    }
}
@keyframes UpDown_1 {
    0%  {   
        bottom: 25%;
    }
    25%  {
        bottom: 29%;
    }
    75%  {
        bottom: 33%;
    }
    100% {
        bottom: 25%;
    }
}
@keyframes LeftRight {
    0%  {   
        left: 0%;
    }
    25%  {
        left: 5%;
    }
    75%  {
        left: 8%;
    }
    100% {
        left: 0%;
    }
}
@keyframes RightLeft {
    0%  {   
        right: 0%;
    }
    25%  {
        right: 5%;
    }
    75%  {
        right: 8%;
    }
    100% {
        right: 0%;
    }
} */ -->