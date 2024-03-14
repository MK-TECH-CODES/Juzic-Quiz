<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";



$pin = $_REQUEST['pin'];
$teamname = $_REQUEST['teamname'];
$player1 = $_REQUEST["player1"];
$player2 = $_REQUEST["player2"];
$player3 = $_REQUEST["player3"];
$player4 = $_REQUEST["player4"];

$v1 = "a".$pin;


$conn = mysqli_connect($servername,$username,$password, "teams_list");
$sql = "INSERT INTO $v1 (teamname, palyer1, player2, player3, player4, pin) 
VALUES ('$teamname', '$player1', '$player2', '$player3', '$player4', '$pin');";
if(mysqli_query($conn, $sql)){
    echo "<script>window.location.href = \"../HTML/waitingwindow.html?data=$pin\";</script>";
}else{
    echo mysqli_error($conn);
}



?>