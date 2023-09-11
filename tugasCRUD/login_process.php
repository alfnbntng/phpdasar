<?php
require_once "connect.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Password salah";
                include("login.php"); 
            }
        } else {
            $error = "Username tidak ditemukan";
            include("login.php"); 
        }
    } else {
        $error = "Terjadi kesalahan saat mencari pengguna";
        include("login.php"); 
    }
}
?>
