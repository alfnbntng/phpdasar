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


    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) != 1) {
        header("Location: dashboard.php");
        exit();
    }

    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
        $product_price = $_POST["product_price"];
        $stok = $_POST["stok"];
        $merk = $_POST["merk"];


        $update_query = "UPDATE products SET product_name = '$product_name', product_description = '$product_description', product_price = '$product_price',  stok = '$stok',  merk = '$merk' WHERE id = $product_id";

        if (mysqli_query($conn, $update_query)) {
            header("Location: dashboard.php"); 
            exit();
        } else {
            $error = "Terjadi kesalahan saat mengupdate produk. Silakan coba lagi.";
        }
    }
} else {
    header("Location: dashboard.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $product_id; ?>" method="post">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row["product_name"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="product_description" class="form-label">Product Description</label>
                <textarea class="form-control" id="product_description" name="product_description" rows="4" required><?php echo $row["product_description"]; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="product_price" name="product_price" step="0.01" value="<?php echo $row["product_price"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" step="0.01" value="<?php echo $row["stok"]; ?>" required>
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Product Price</label>
                <input type="text" class="form-control" id="merk" name="merk" value="<?php echo $row["merk"]; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-2">Back to Products</a>
    </div>
</body>
</html>
