<?php
session_start();
include '../components/connect.php'; 

if (isset($_POST['delete_item'])) {
    $pid = $_POST['pid'];
    $user_id = $_SESSION['no'];

    // Delete the item from the cart in the database
    $delete_item = $conn->prepare("DELETE FROM `cart` WHERE no = :no AND pid = :pid");
    $delete_item->bindParam(':no', $user_id, PDO::PARAM_INT);
    $delete_item->bindParam(':pid', $pid, PDO::PARAM_INT);
    $delete_item->execute();

    // Redirect back to the cart page
    header("Location: cart.php");
    exit();
}
?>
