<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";


$gamepin = $_REQUEST['pin'];

$conn = mysqli_connect($servername,$username,$password);

if(!$conn){
    die(mysqli_connect_error());
}
$db = "a".$gamepin;

//echo $gamepin;

echo "<script>window.location.href = \"../HTML/playercreate.html?data=$gamepin\";</script>";
    


?>