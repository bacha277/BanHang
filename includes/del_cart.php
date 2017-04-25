<?php
session_start();
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    unset($_SESSION['cart'][$id]);
} else {
    unset($_SESSION['cart']);
}
header('location:index.php?page=cart');
?>