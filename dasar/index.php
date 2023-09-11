<!DOCTYPE html>
<html>
<body>

<!-- Variable -->
<?php
    $txt = "Hello world! <br>";
    $x = 5;
    $y = 10.5;
?>

<!-- if else -->
<?php
    $t = date("22");

    if ($t < "20") {
    echo "Have a good day! <br>";
    } else {
    echo "Have a good night! <br>";
    }
?>

<!-- switch -->
<?php
    $favcolor = "red<br>";

        switch ($favcolor) {
        case "red":
            echo "Your favorite color is red! <br>";
            break;
        case "blue":
            echo "Your favorite color is blue! <br>";
            break;
        case "green":
            echo "Your favorite color is green! <br>";
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green! <br>";
        }
?>

<!-- for each -->
<?php  
    $mobil = array("alya", "xenia", "bmw", "yellow"); 

    foreach ($mobil as $kendaraan) {
    echo "$kendaraan <br>";
    }
?>  

<!-- Function -->
<?php
    function dataDiri($nama, $umur) {
    echo "Nama Saya Adalah $nama, umur saya $umur";
    }

    dataDiri("Bintang","16"); // call the function
?>

<br>

<!-- Date And Time -->
<?php
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.m.d") . "<br>";
    echo "Today is " . date("Y-m-d") . "<br>";
    echo "Today is " . date("l");
?>

<br>

<!-- php OOP -->
<?php
    class Fruit {
    // Properties
    public $name;
    public $color;

    // Methods
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    }

    $apple = new Fruit();
    $banana = new Fruit();
    $apple->set_name('Apple');
    $banana->set_name('Banana');

    echo $apple->get_name();
    echo "<br>";
    echo $banana->get_name();
?>

<br>

<!-- Constructor -->

<?php
    class komputer
    {
        public $prosesor;
        public $memory;
        public $ram;
        public function __construct($prosesor = "prosesor",$memory = "memory",$ram = "RAM" ){
            $this -> prosesor = $prosesor;
            $this -> memory = $memory;
            $this -> ram = $ram;
        }
        public function getData()
        {
            return "$this->prosesor | $this->memory | $this->ram";
        }
    }
    $komputer1 = new komputer ("core i7","225GB","8GB");
    $komputer2 = new komputer ("core i9","500GB");
    echo "Spek Komputer Sekolah : " .$komputer1->getData();
    echo "<br/>";
    echo "Spek Komputer Rumah : " .$komputer2->getData();

?>

<br>

<!-- Destructor -->
<?php
    class product {
        public $ram;
        public function __construct($ram = "RAM"){
            $this->ram=$ram;
        }
        function __destruct(){
            echo "RAM Komputer {$this->ram}";
        }
    }
        $komputer1 = new product('255 GB');
    ?>

<br>

<!-- Session -->

<?php
    session_start();
    echo 'Id user saya adalah ' .$_SESSION['logged_in_user_id'];
    echo '<br>';
    echo 'Username saya adalah ' .$_SESSION['logged_in_user_name'];
?>
</body>
</html>
