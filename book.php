<?php
include 'config.php';
error_reporting(0);
session_start();
$user_id = $_SESSION['user_id'];



$rateStar=0;
if($_GET["id"]){
    $id=$_GET["id"];
    $q="select * from products where products_id=$id";
    $arr=mysqli_query($conn,$q);
    $obj=mysqli_fetch_array($arr);
    
    $imgURl=$obj["img"];
   
    $name=$obj["name"];
    $price=$obj["price"];

    $rq="select avg(rating) from tblrating where products_id=$id";

    $res=mysqli_query($conn,$rq);
    $arr=mysqli_fetch_array($res);
   
    $rating=$arr[0];
}

if(!isset($user_id)){
   header('location:login.php');
}
if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['image'];
   
 
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND id = '$user_id'");

    if(mysqli_num_rows($check_cart_numbers) > 0){
        ?>
                <script>
                    alert(" already added");
                </script>
                <?php
    }else{
        if (!mysqli_query($conn, "INSERT INTO `cart` (id, name, price, quantity, image) VALUES ('$user_id', '$product_name', '$product_price', 1, '$product_image')")) {
            echo "Error: " . mysqli_error($conn);
        }
        
       ?>
       <script>
           alert(" added to cart");
       </script>
       <?php
    }
 
 }

 if($_POST["rating"]){
    $msg=$_POST["rating_msg"];
    $ratingStar=$_POST["rating_star"];
    $rq="insert into tblrating values(0,'$_GET[id]',$ratingStar,$user_id,'$msg')";

    mysqli_query($conn,$rq);
    ?>
    <?php
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
    <style>
        .stars { 
            cursor: pointer; 
            font-size: 30px; 
            color: gray; 
        }
        .stars:hover, .stars.active { 
            color: gold; 
        }
        .rating-display {
            margin-top: 10px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>

</head>

<body id="nav-togglebar">
    <?php include 'navbar.php'; ?>

    <section class="products">
        <h1 class="title">Product</h1>
        <div style="display: flex; justify-content: center;flex-direction: column; align-items: center; ">
            <form action="" method="post">
            <div style="width:700px;display:flex;justify-content: center; align-items: center;flex-direction: column; padding: 50px 20px;background-color: #f6f6f6;">
            <div>
                <img src="./assets/upload_img/<?php echo $imgURl; ?>"/>
                <div style="display:flex;justify-content: flex-start; width:100%;padding: 15px 0;">
                <h4><?php echo $name ?></h4>
            </div>
            <div>
    <!-- Display average rating using stars -->
    
    <?php
    $fullStars = floor($rating); // Number of full stars
    $halfStar = ($rating - $fullStars) >= 0.5; // Check if there should be a half star
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $fullStars) {
            echo '<i class="fas fa-star stars active"></i>'; // Full star
        } elseif ($halfStar && $i == $fullStars + 1) {
            echo '<i class="fas fa-star-half-alt stars active"></i>'; // Half star
        } else {
            echo '<i class="far fa-star stars"></i>'; // Empty star
        }
    }
    ?>
    
</div>
           
            <div style="display:flex;justify-content:space-between;align-items: center; width:100%; padding: 10px 0;">
                <h4 >&#8377;<?php echo $price ?></h4>
                <input type="text" name="name" hidden value="<?php echo $name; ?>" id="">
                <input type="number" name="price" hidden value="<?php echo $price; ?>" id="">
                <input type="text" name="image" hidden value="<?php echo $imgURl; ?>" id="">
                <input style="background-color:rgb(44, 138, 197);border: none; border-radius: 10px; color:#f6f6f6;padding: 10px 10px;" type="submit" value="Add to Cart" name="add_to_cart">
            </div>
            </form>
            <div>
            <div id="star-container">
    <i class="fas fa-star stars r" data-value="1"></i>
    <i class="fas fa-star stars r" data-value="2"></i>
    <i class="fas fa-star stars r" data-value="3"></i>
    <i class="fas fa-star stars r" data-value="4"></i>
    <i class="fas fa-star stars r" data-value="5"></i>
</div>



        
        <form method="post">    
        <input id="rs" type="number" hidden name="rating_star"></input>
        <div style="padding: 10px 0;">
            <textarea cols="38" rows="5" name="rating_msg" id=""></textarea>
            </div>
            <input type="submit" style="background-color:#ef5656;border: none; border-radius: 10px; color:#f6f6f6;padding: 10px 10px;margin-bottom:40px;" value="Rate Now" name="rating">
        </form>
            </div>
        </div>
        <div style="width:100%">
        <?php 
$q = "SELECT * FROM tblrating WHERE products_id=" . $_GET['id'];
$obj = mysqli_query($conn, $q);

while ($arr = mysqli_fetch_array($obj)) {
    $fetchUser = "SELECT * FROM signin WHERE id=" . $arr["user_id"];
    $userObj = mysqli_query($conn, $fetchUser);
    $userArr = mysqli_fetch_array($userObj);

    $fullStars = floor($arr["rating"]); // Number of full stars
    $halfStar = ($arr["rating"] - $fullStars) >= 0.5; // Check if there should be a half star

    echo '<div style="border: 1px solid #ddd; padding: 15px;width:100%; margin: 15px 0; border-radius: 10px; background: #f9f9f9; box-shadow: 2px 2px 10px rgba(0,0,0,0.1);">';
    echo '<h4 style="margin: 0; color: #333;">' . $userArr["name"] . '</h4>';
    echo '<div style="color: #FFD700;margin: 5px 0 0px; font-size: 18px;">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $fullStars) {
            echo '<i class="fas fa-star"></i>'; // Full star
        } elseif ($halfStar && $i == $fullStars + 1) {
            echo '<i class="fas fa-star-half-alt"></i>'; // Half star
        } else {
            echo '<i class="far fa-star" style="color: #ccc;"></i>'; // Empty star
        }
    }
    echo '</div>';
    echo '<p style="color: #666; font-size: 14px;">' . $arr["msg"] . '</p>';
    
    
    
    echo '</div>';
}
?>

</div>
        

    </section>
    <?php include 'footer.php'; ?>
<script>
    let stars = document.querySelectorAll('.r');
    let ratingText = document.getElementById('rating-text');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            let value = this.getAttribute('data-value');
            let rating=document.getElementById("rs");
            // ratingText.textContent = value; // Display selected rating
            rating.value = value; // Display selected rating
            // Highlight selected stars
            stars.forEach(s => s.classList.remove('active'));
            for (let i = 0; i < value; i++) {
                stars[i].classList.add('active');
            }
        });
    });
</script>

</body>

</html>