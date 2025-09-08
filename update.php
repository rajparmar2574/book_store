<?php
include 'config.php';

session_start();
$admin_id = $_SESSION['admin_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>admin</title>
</head>
<body>
    <?php 
      if(isset($_GET['update'])){
    $aid=$_GET[$ab];
    $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
    if(mysqli_num_rows($update_query) > 0){
       while($fetch_update = mysqli_fetch_assoc($update_query)){
       
      
    ?>
<section class="add products">
        <div class="container">
            <div class="row products-row mx-auto">

                <form action="" method="post">
                    <div class="sign-in-title">
                        <h5>add products</h5>
                    </div>
                    <div class="form-outline">
                        <input type="name" value="<?php echo $fetch_update['name']?>" class="form-control form-control-lg" name="name" placeholder="name"
                            required />
                    </div>
                    <br>
                    <div class="form-outline">
                        <input type="text" value="<?php echo $fetch_update['price']?>" class="form-control form-control-lg" name="price" placeholder="price"
                            required />
                    </div>
                    <br>
                    <!-- <div class="form-outline">
                        <input type="text" class="form-control form-control-lg" name="quantity" placeholder="quantity"
                            required />
                    </div>
                    <br> -->
                    <div class="mb-3">
                        <input class="form-control" value="<?php echo $fetch_update['image']?>" type="file" name="img" accept="image/jpg, image/jpeg, image/png">
                    </div>
                    <br>
                    <div class=" log-in-btn">
                    <input type="submit" value="add product" name="update" class="btn btn-primary">
                    </div>
                </form>

            </div>
        </div>
    </section>
    <?php
         }
      }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>
</body>
</html>