<?php 
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "a1000000001";
$conn = mysqli_connect($servername,$username,$password,$db);

$sql2 = "CREATE TABLE $db (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    teamname VARCHAR(30),
    palyer1 VARCHAR(30),
    player2 VARCHAR(30),
    player3 VARCHAR(30),
    player4 VARCHAR(30),
    pin BIGINT(20))";
  
if(mysqli_query($conn,$sql2)){
    echo "success";
}else{
    echo "error". mysqli_error($conn);
}


?>