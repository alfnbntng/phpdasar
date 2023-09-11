<?php
session_start();
require_once "connect.php";

function check_login() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }
}

check_login();
if (isset($_GET["id"])) {
    $product_id = $_GET["id"];

    $delete_query = "DELETE FROM products WHERE id = $product_id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Terjadi kesalahan saat menghapus produk. Silakan coba lagi.";
    }
} else {
    header("Location: dashboard.php");
    exit();
}
?>
