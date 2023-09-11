<?php
include 'connect.php';
$id = $_GET['id'];
$get_data = "select * from sekolah where id=$id";
$result_data = mysqli_query($conn,$get_data);
$row = mysqli_fetch_assoc($result_data);
$nama_sekolah = $row['nama_sekolah'];
$alamat_sekolah = $row['alamat_sekolah'];
if(isset($_POST['submit'])){
    $nama_sekolah = $_POST['nama'];
    $alamat_sekolah = $_POST['alamat'];
    $sql = "update sekolah set id=$id, nama_sekolah='$nama_sekolah', alamat_sekolah='$alamat_sekolah' where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:read.php');
    }else{
        die($conn->connect_error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center">Update</h3>
        <form method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Sekolah</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_sekolah ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Sekolah</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat_sekolah ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>