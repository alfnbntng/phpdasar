<!DOCTYPE html>
<html>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name:
  <input type="text" name="name">
  <br>
  <br>
  Umur:
  <input type="text" name="umur">
  <br>
  <br>
  Gender: 
  <input type="radio" name="gender[]" value="Laki-Laki">Laki-Laki
  <input type="radio" name="gender[]" value="Perempuan">Perempuan
  <br>
  <br>
  Makanan Kesukaan:
  <input type="checkbox" name="makanan[]" value="Rames">Rames
  <input type="checkbox" name="makanan[]" value="Soto">Soto
  <input type="checkbox" name="makanan[]" value="Rendang">Rendang
  <br>
  <br>
  <input type="submit">
</form>

<!-- post nama -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['name'];
  $umur = $_POST['umur'];
  $gender = $_POST["gender"];
  $makanan = $_POST["makanan"];

//   nama
  if (empty($name)) {
    echo "Nama Kosong <br>";
  } else {
    echo "nama saya $name <br> ";
  }

//   umur
  if (empty($umur)) {
    echo "Umur Kosong <br>";
  } else {
    echo "saya berusia $umur tahun <br>";
  }

//   gender
  if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];
    echo "Saya Seorang ";
    foreach ($gender as $nilai) {
        echo $nilai . "<br>";
    }
} else {
    echo "Jenis Kelamin Tidak Di Ketahui <br>";
}

// makanan
if (isset($_POST["makanan"])) {
    $makanan = $_POST["makanan"];
    echo "Makanan Favorite Saya Adalah ";
    foreach ($makanan as $nilai) {
        echo " $nilai";
    }
} else {
    echo "Tidak suka makan <br>";
}
}
?>


</body>
</html>