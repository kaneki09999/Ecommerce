<?php
session_start();
include '../components/connect.php';

if (isset($_POST['delete_all_items'])) {
    $user_id = $_SESSION['no'];

    // Delete all items from the cart in the database
    $delete_all_items = $conn->prepare("DELETE FROM `cart` WHERE no = :no");
    $delete_all_items->bindParam(':no', $user_id, PDO::PARAM_INT);
    $delete_all_items->execute();

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
?>
