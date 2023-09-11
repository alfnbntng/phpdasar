<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- nama -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Nama: <input type="text" name="nama">
        Umur: <input type="text" name="umur">
        <input type="submit">
    </form>
    
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $nama = $_POST['nama'];
  
  if (empty($nama)) {
    echo "Nama Kosong";
  } else {
    echo "Nama saya $nama";
  }
}
?>

<br>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $umur = $_POST['umur'];
  
  if (empty($umur)) {
    echo "Umur Kosong";
  } else {
    echo "Saya Berusia $umur tahun";
  }
}
?>

</body>
</html>