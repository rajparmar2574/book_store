<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated cart data
    if (isset($_POST['cart_ids']) && isset($_POST['quantities'])) {
        $cart_ids = $_POST['cart_ids'];
        $quantities = $_POST['quantities'];

        // Loop through each cart item and update the quantity in the database
        foreach ($cart_ids as $index => $cart_id) {
            $quantity = $quantities[$index];

            // Ensure the cart_id and quantity are properly sanitized and validated
            $cart_id = mysqli_real_escape_string($conn, $cart_id);
            $quantity = mysqli_real_escape_string($conn, $quantity);

            // Update cart quantity
            $update_query = "UPDATE `cart` SET quantity = '$quantity' WHERE cart_id = '$cart_id' AND id = '$user_id'";
            
            // Debugging: Log the query
            error_log("Update Query: $update_query");

            if (mysqli_query($conn, $update_query)) {
                // Successful update
                // You can log the successful update if needed
                // error_log("Cart ID $cart_id updated successfully with quantity $quantity");
            } else {
                // Log the error if update fails
                error_log("Error updating cart: " . mysqli_error($conn));
                die('Error updating cart: ' . mysqli_error($conn));
            }
        }

        // After updating, redirect to the checkout page
        header('location:checkout.php');
        exit(); // Always call exit after header to prevent further code execution
    }
} else {
    // If the form wasn't submitted, redirect back to cart
    header('location:cart.php');
    exit(); // Always call exit after header to prevent further code execution
}
?>
