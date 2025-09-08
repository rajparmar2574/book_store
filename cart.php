<?php
include 'config.php';
error_reporting(0);

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['update_cart'])) {
    $cart_ids = $_POST['cart_ids'];
    $quantities = $_POST['quantities'];

    foreach ($cart_ids as $index => $cart_id) {
        $cart_quantity = $quantities[$index];
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE cart_id = '$cart_id'") or die('query failed');
    }
    $message[] = 'cart quantity updated!';
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$delete_id'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$user_id'") or die('query failed');
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/navbar.js"></script>

</head>

<body id="nav-togglebar">
    <?php include 'navbar.php'; ?>

    <section class="products">
        <h1 class="title">Products added</h1>
        <div class="container">
            <div class="row">
                <?php
                $grand_total = 0;

                $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE id = '$user_id'");
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $cart_id = $fetch_cart['cart_id'];
                        $cart_name = $fetch_cart['name'];
                        $cart_price = $fetch_cart['price'];
                        $cart_image = $fetch_cart['image'];
                        $cart_quantity = $fetch_cart['quantity'];
                        ?>
                        <div class="col-lg-3 col-sm-3">
                            <div class="card cart-delete">

                                <div class="card-img">
                                    <img src="./assets/upload_img/<?php echo $cart_image; ?>" class="card-img" alt="image" class="img-fluid">
                                </div>
                                <div class="card-body" style="height: fit-content;display:grid;">
                                    <h5 class="card-title"><?php echo $cart_name; ?></h5>
                                </div>
                                <div class="card-footer" style="display:flex;justify-content:space-between;align-items: center;">
                                    <div class="card-footer-label">
                                        <h5>&#8377; <?php echo $cart_price; ?>/-</h5>
                                    </div>

                                    <div class="">quantity:
                                        <input type="number" name="qty" value="<?php echo $cart_quantity; ?>" style="width:50px;padding:5px 0" id="qty<?php echo $cart_id ?>" min="1" onchange="handleQtyChnage(event,<?php echo $cart_id ?>,<?php echo $cart_price ?>)">
                                        <input type="hidden" value="<?php echo $cart_quantity; ?>" name="prevQty" id="prevQty<?php echo $cart_id ?>" min="0">
                                    </div>

                                    <div class="card-footer-link">
                                        <a href="cart.php?delete=<?php echo $cart_id; ?>" data-id=<?php echo $cart_id ?> class="btn btn-primary" onclick="return confirm('delete this from cart?');">delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        $sub_total = $cart_price * $cart_quantity;
                        $grand_total += $sub_total;
                    }
                } else {
                    echo '<p class="empty">your cart is empty!</p>';
                }
                ?>
            </div>
            <div class="delete-all">
                <a href="cart.php?delete_all" class="btn btn-primary <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
            </div>

            <form id="updateCartForm" method="POST" action="update_cart.php" style="display: none;">
                <div id="cartData"></div>
            </form>

            <div class="cart-total" id="grandTotal">
                <p class="card-total-label"> Total:
                    <span>&#8377;</span>
                    <span id="total"><?php echo $grand_total; ?></span>
                    <span>/-</span>
                </p>
                <div class="cart-total-buttons">
                    <div>
                        <a href="shop.php" class="btn btn-primary">continue shopping</a>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" id="checkoutBtn" <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>>
                            proceed to checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
    <script>
        const handleQtyChnage = (event, cartId, price) => {
            const prevQtyObj = document.getElementById("prevQty" + cartId);
            const curreOtyObject = document.getElementById("qty" + cartId);
            const totalObj = document.getElementById("total");

            const currQty = parseInt(event.target.value);
            const prevQty = parseInt(prevQtyObj.value);

            let qtyChange = currQty - prevQty;

            if (qtyChange === 0) return;

            const currTotal = parseFloat(totalObj.innerText);
            let newTotal = currTotal + (price * qtyChange);

            totalObj.innerText = newTotal.toFixed(2);
            prevQtyObj.value = currQty;
            curreOtyObject.value = currQty;
        }

        document.getElementById("checkoutBtn").addEventListener("click", function() {
            const updatedCartData = [];

           
            // Loop through each cart item and collect updated quantity and cart ID
            document.querySelectorAll(".cart-delete").forEach(function(cartItem) {
                const cartId = cartItem.querySelector(".card-footer-link a").getAttribute("data-id");
                const quantity = cartItem.querySelector('input[name="qty"]').value;

                updatedCartData.push({ cart_id: cartId, quantity: quantity });
            });

            // Log the data to make sure it's collected
            console.log(updatedCartData);

            // Prepare data for submission
            const cartDataDiv = document.getElementById("cartData");
            cartDataDiv.innerHTML = ""; // Clear previous data

            updatedCartData.forEach(function(data) {
                const cartIdInput = document.createElement("input");
                cartIdInput.type = "hidden";
                cartIdInput.name = "cart_ids[]";
                cartIdInput.value = data.cart_id;

                const quantityInput = document.createElement("input");
                quantityInput.type = "hidden";
                quantityInput.name = "quantities[]";
                quantityInput.value = data.quantity;

                cartDataDiv.appendChild(cartIdInput);
                cartDataDiv.appendChild(quantityInput);
            });

            // Submit the form to update the cart table
            document.getElementById("updateCartForm").submit();
        });
    </script>
</body>

</html>
