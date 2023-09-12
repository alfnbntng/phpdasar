<?php
include 'connect.php';
// Code for get id from param
$id = $_GET['id'];
// Code for get siswa by id siswa
$get_data = "SELECT * FROM siswa where id_siswa=$id";
$result_data = mysqli_query($conn, $get_data);
$siswa = mysqli_fetch_assoc($result_data);
$nama_siswa = $siswa['nama_siswa'];
$nisn = $siswa['nisn'];
$gender = $siswa['gender'];
$id_kelas = $siswa['id_kelas'];

// Code for get kelas by id kelas
$get_data_kelas = "SELECT * FROM kelas where id=$id_kelas";
$result_data_kelas = mysqli_query($conn, $get_data_kelas);
$kelas = mysqli_fetch_assoc($result_data_kelas);
$tingkat_kelas = $kelas['tingkat_kelas'];
$jurusan_kelas = $kelas['jurusan_kelas'];
?>

<?php include 'connect.php' ?> 
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
    <div class="xard w-75 m-auto p-3">
        <h3 class="text-center">Detail Siswa</h3>
        <div class="row mt-3">
            <div class="col-4">
                <span class="fw-bold">Nama Siswa</span>
            </div>
            <div class="col-8">
                <?php echo $nama_siswa ?>
            </div>
            <hr class="mt-3">

            <div class="col-4">
                <span class="fw-bold">NISN</span>
            </div>
            <div class="col-8">
                <?php echo $nisn ?>
            </div>
            <hr class="mt-3">

            <div class="col-4">
                <span class="fw-bold">Gender</span>
            </div>
            <div class="col-8">
                <?php echo $gender ?>
            </div>
            <hr class="mt-3">

            <div class="col-4">
                <span class="fw-bold">Kelas</span>
            </div>
            <div class="col-8">
                <?php echo $tingkat_kelas.' '.$jurusan_kelas ?>
            </div>
            <div class="col-12 mt-3 text-end">
                <a href="<?= 'update.php?id='.$id;?>" class="btn btn-primary">Update</a>
            </div>
        </div>
    </div>
</body> 
</html>