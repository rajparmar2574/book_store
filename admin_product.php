<?php
include 'config.php';
error_reporting(0);
session_start();
$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php');
}
if (isset($_POST['add_product'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_POST['img'];
    //$image = $_FILES['img']['name'];
    // $image_size = $_FILES['image']['size'];
    // $image_tmp_name = $_FILES['img']['tmp_name'];
    //$image_folder = './assets/uploaded_img/'.$image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'");

    if (mysqli_num_rows($select_product_name) > 0) {

?>
        <script>
            alert(" product name already added");
        </script>
    <?php
    } else {
        $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, img) VALUES('$name', '$price', '$image')");

    ?>
        <script>
            alert(" product added successfully!");
        </script>
<?php
    }
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `products` WHERE products_id = '$delete_id'") or die('query failed');
    header('location:admin_product.php');
}
if (isset($_POST['update_product'])) {

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $state=$_POST["isDisable"];
    // echo $state;
    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price',isDisable=$state WHERE products_id = '$update_p_id'");
    // echo "UPDATE `products` SET name = '$update_name', price = '$update_price',isDisable=$state WHERE products_id = '$update_p_id'";
    header('location:admin_product.php');
    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            mysqli_query($conn, "UPDATE `products` SET img= '$update_image' WHERE products_id = '$update_p_id'") or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('./assets/upload_img/' . $update_old_image);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
    <?php include 'admin_navbar.php'; ?>
    <section class="add products">
        <div class="container">
            <div class="row products-row mx-auto">

                <form action="" method="post">
                    <div class="sign-in-title">
                        <h5>add products</h5>
                    </div>
                    <div class="form-outline">
                        <input type="name" class="form-control form-control-lg" name="name" placeholder="name"
                            required />
                    </div>
                    <br>
                    <div class="form-outline">
                        <input type="text" class="form-control form-control-lg" name="price" placeholder="price"
                            required />
                    </div>
                    <br>
                    <!-- <div class="form-outline">
                        <input type="text" class="form-control form-control-lg" name="quantity" placeholder="quantity"
                            required />
                    </div>
                    <br> -->
                    <div class="mb-3">
                        <input class="form-control" type="file" name="img" accept="image/jpg, image/jpeg, image/png">
                    </div>
                    <br>
                    <div class=" log-in-btn">
                        <input type="submit" value="add product" name="add_product" class="btn btn-primary">
                    </div>
                </form>

            </div>
        </div>
    </section>
    <hr>
    <section class="products admin_product">
        <h1 class="title">Latest products</h1>
        <div class="container">
            <div class="row">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`");

                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                ?>
                        <div class="col-lg-3 col-md-4"  >
                            <div class="card">
                                <div class="card-img" style="height: 400px;" onclick='handleAdminBook(<?php echo $fetch_products["products_id"]?>)'>
                                    <img src="./assets/upload_img/<?php echo $fetch_products['img']; ?>" class="card-img"
                                        alt="image" class="img-fluid" style="height: 100%;" >
                                </div>
                                <div style="background-color: #f6f6f6;">
                                    <h5 class="card-title" style="text-align: center;border-bottom:none;">
                                        <?php echo $fetch_products['name']; ?>
                                    </h5>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer-label" style="display: flex;justify-content: space-around">
                                        <h5> &#8377;
                                            <?php echo $fetch_products['price']; ?>/-
                                        </h5>
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
                                    <div class="card-footer-link">
                                        <a href="admin_product.php?update=<?php echo $fetch_products['products_id']; ?>" class="btn btn-primary">update</a>
                                        <a href="admin_product.php?delete=<?php echo $fetch_products['products_id'] ?>" onclick="return confirm('delete this from cart?');" name="delete" class=" btn btn-primary">delete</a>

                                    </div>

                                </div>
                            </div>
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
    <section class="edit-product-form">

        <?php
        if (isset($_GET['update'])) {
            $update_id = $_GET['update'];
            $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE products_id = '$update_id'") or die('query failed');
            if (mysqli_num_rows($update_query) > 0) {
                while ($fetch_update = mysqli_fetch_assoc($update_query)) {
                
        ?>      
                
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['products_id']; ?>">
                        <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['img']; ?>">
                        <img src="./assets/upload_img/<?php echo $fetch_update['img']; ?>" alt="image">
                        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
                        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
                        
                        <input class="form-control box" type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
                        <div style="display: flex; justify-content: flex-start;gap: 5px;align-items: center;height: 20px;">
                            <select name="isDisable" id="" style="height: 30px;">
                                <option >Choose option</option>
                                <option value=true <?php echo $fetch_update["isDisable"]==1 ? 'selected' : '' ?>>disabled</option>
                                <option value=false <?php echo $fetch_update["isDisable"]==0 ? 'selected' : '' ?>>enabled</option>
                            </select>
                        </div>
                        <input type="submit" value="update" name="update_product" class="btn btn-primary">
                        <input type="reset" value="cancel" id="close-update" class="btn btn-primary">
                    </form>

        <?php
                }
            }
        } else {
            echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
        }
        ?>

    </section>


    <script>
        const handleAdminBook=(id)=>{
            console.log(id)
            window.location.href=`/book_store/admin_book.php?id=${id}`;
        };
    </script>
</body>
<script>
    document.querySelector('#close-update').onclick = () => {
        document.querySelector('.edit-product-form').style.display = 'none';
        window.location.href = 'admin_product.php';
    }
</script>

</html>