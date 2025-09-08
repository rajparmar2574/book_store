<?php
include 'config.php';
error_reporting(0);
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}
if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_image = $_POST['image'];


    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND id = '$user_id'");

    if (mysqli_num_rows($check_cart_numbers) > 0) {
?>
        <script>
            alert(" already added");
        </script>
    <?php
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(id, name, price,quantity,  image) VALUES('$user_id', '$product_name', '$product_price',1,'$product_image')");
    ?>
        <script>
            alert(" added to cart");
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

    <section class="products">
        <h1 class="title">Latest products</h1>
        <div class="container">
            <div class="row">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products` where isDisable=false order by products_id ASC");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                        $id = $fetch_products["products_id"];
                ?>

                        <div class="col-lg-3 col-md-4" >
                            <form action="" method="post" onclick="clickHandle(<?php echo $fetch_products['products_id']; ?>)">
                                <div class="card" style="height: 500px; background-color: #f6f6f6;">
                                    <div class="card-img" style="height: 400px;">
                                        <img src="./assets/upload_img/<?php echo $fetch_products['img']; ?>" class="card-img" alt="image" style="height: 100%;" class="img-fluid">
                                        <input type="hidden" name="image" value="<?php echo $fetch_products['img']; ?>">
                                    </div>

                                    <div style="background-color: #f6f6f6;">
                                        <h4 style="text-align: center;"><?php echo $fetch_products["name"] ?></h4>
                                    </div>
                                    <div style="background-color: #f6f6f6;">

                                        <div class="card-footer-label" style="display: flex; justify-content: space-between;width:100%;padding: 0 10px;">
                                            <h4> &#8377; <?php echo $fetch_products['price']; ?>/-
                                                <input type="hidden" name="price" value="<?php echo $fetch_products['price']; ?>">

                                            </h4>
                                            <div>
                                                <!-- Display average rating using stars -->
                                                <?php
                                                $pid = $fetch_products["products_id"];
                                                $q = "select round(avg(rating),1) from tblrating where products_id=$pid";
                                                $res = mysqli_query($conn, $q);
                                                $arr = mysqli_fetch_array($res);
                                                ?>
                                                <h4 style="display: flex;gap:3px">
                                                    <i class="fas fa-star stars r" data-value="1"></i>
                                                    <p><?php if ($arr[0] != null) echo $arr[0];
                                                        else echo 0.0; ?></p>
                                                </h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </form>
                        </div>
                <?php
                    }
                } else {
                    echo '<p class="empty">no products added yet!</p>';
                }
                ?>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
    <script>
        const clickHandle = (a) => {
            location.href = "/book_store/book.php?id=" + a;
        }
    </script>
</body>

</html>