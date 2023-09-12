<?php include 'connect.php';?>
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
        <h3 class="text-center">Read</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nisn</th>
                    <th>Gender</th>
                    <th>Jurusan</th>
                    <th>Sekolah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                $sql = "select * from siswa 
                INNER JOIN kelas ON siswa.id_kelas = kelas.id
                INNER JOIN sekolah ON kelas.id_sekolah = sekolah.id";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                foreach ($result as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['nama_siswa'] ?></td>
                        <td><?= $row['nisn'] ?></td>
                        <td><?= $row['gender'] ?></td>
                        <td><?= $row['tingkat_kelas'] .
                            ' ' .
                            $row['jurusan_kelas'] ?></td>
                        <td><?= $row['nama_sekolah'] ?></td>
                        <td class="text-center">
                            <a href="<?= 'detail.php?id=' .
                                $row[
                                    'id_siswa'
                                ] ?>" class="btn btn-primary btn-sm">Detail</a>
                            <button onclick="<?= 'hapus(' .
                                $row['id_siswa'] .
                                ')' ?>" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                <?php endforeach;
                ?>
            </tbody>

            </table>
            <a href="create.php" class="btn btn-primary">Tambah</a>
        </div>
    </body>
</html>