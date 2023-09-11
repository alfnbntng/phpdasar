<?php
session_start();
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query database untuk mendapatkan data pengguna berdasarkan username
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Verifikasi password
            if (password_verify($password, $row["password"])) {
                // Password cocok, set session dan redirect ke dashboard
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                header("Location: dashboard.php");
                exit(); // Pastikan untuk keluar dari skrip setelah pengalihan
            } else {
                $error = "Password salah";
            }
        } else {
            $error = "Username tidak ditemukan";
        }
    } else {
        $error = "Terjadi kesalahan saat mencari pengguna";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
   


</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form id="login-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <div class="error-message" id="error-message"></div>
        </form>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
