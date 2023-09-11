<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $check_query = "SELECT * FROM admin WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $error = "Username sudah digunakan. Silakan pilih username lain.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";
        $insert_result = mysqli_query($conn, $insert_query);

        if ($insert_result) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
        }
    }
}
header("Location: register.php");
exit();
?>
