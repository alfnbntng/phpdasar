<?php
session_start();
require_once "connect.php";

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 20px;
        }

        .header {
            text-align: center;
            padding: 20px 0;
        }

        .btn-add {
            margin-bottom: 10px;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .action-buttons {
            display: flex;
        }

        .edit-btn,
        .delete-btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
        </div>
        <a href="create_product.php" class="btn btn-primary btn-add">Add Product</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stok</th>
                    <th>Brand</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                // Loop melalui hasil query dan menampilkan setiap produk dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="text-center">';
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['product_description'] . "</td>";
                    echo "<td>$" . $row['product_price'] . "</td>";
                    echo "<td>" . $row['stok'] . "</td>";
                    echo "<td>" . $row['merk'] . "</td>";
                    echo '<td class="action-buttons">';
                    echo '<a href="edit_product.php?id=' . $row['id'] . '" class="btn btn-success edit-btn">Edit</a>';
                    echo '<a href="delete_product.php?id=' . $row['id'] . '" class="btn btn-danger delete-btn">Delete</a>';
                    echo '</td>';
                    echo "</tr>";
                }
                ?>
                </tr>
            </tbody>
        </table>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
