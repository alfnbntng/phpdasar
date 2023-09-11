<?php
session_start();
require_once "connect.php"; // Import koneksi ke database

// Aktifkan pelaporan kesalahan MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


// Fungsi untuk memeriksa apakah pengguna sudah login
function check_login() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: login.php");
        exit();
    }
}

check_login();

// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    $product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
    $product_description = mysqli_real_escape_string($conn, $_POST["product_description"]);
    $product_price = floatval($_POST["product_price"]);
    $stok = floatval($_POST["stok"]);
    $merk = mysqli_real_escape_string($conn, $_POST["merk"]);

    // Query untuk menambahkan produk ke database menggunakan prepared statement
    $insert_query = "INSERT INTO products (product_name, product_description, product_price, stok, merk) VALUES (?, ?, ?, ?, ?)";

    // Persiapan statement
    $stmt = mysqli_prepare($conn, $insert_query);

    if ($stmt) {
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "ssdss", $product_name, $product_description, $product_price, $stok, $merk);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: dashboard.php"); // Redirect kembali ke halaman dashboard setelah produk berhasil dibuat
            exit();
        } else {
            $error = "Terjadi kesalahan saat menambahkan produk. Silakan coba lagi.";
        }
    } else {
        $error = "Terjadi kesalahan dalam persiapan statement. Silakan coba lagi.";
    }
}

// ...

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Create Product</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="product_price" name="product_price" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" id="merk" name="merk" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
