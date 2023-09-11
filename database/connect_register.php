<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'db_sekolah');
    if ($conn->connect_error) {
        die('Koneksi gagal: ' . $conn->connect_error);
    }

    $sql = "INSERT INTO admin (email, username, password) VALUES ('$email', '$username', '$password')";

    if ($conn->query($sql) === true) {
        echo 'Registrasi berhasil!';
        header('Location: login.php');
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $conn->close();
}
?>
