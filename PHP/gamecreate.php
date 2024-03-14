<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$conn = mysqli_connect($servername,$username,$password,"test");

$qeasy = $_REQUEST['qeasy'];
$qnormal = $_REQUEST['qnormal'];
$qhard = $_REQUEST['qhard'];
$prolanguage = $_REQUEST['prolanguage'];
$qeasycount = $_REQUEST['qeasycount'];
$qnormalcount = $_REQUEST['qnormalcount'];
$qhardcount = $_REQUEST['qhardcount'];
$qeasypoint = $_REQUEST['qeasypoint'];
$qnormalpoint = $_REQUEST['qnormalpoint'];
$qhardpoint = $_REQUEST['qhardpoint'];

if(!$conn){
    die(mysqli_connect_error());
}

$sql = "select gamepin from gameboard";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $lastid = $row['gamepin'];
  }
}
$value = strval($lastid+1);

$newstr = "";
for ($i = 0; $i < strlen($value); $i++) {
    if ($i == 3 || $i == 6) {
        $newstr .= "-" . $value[$i];
    } else {
        $newstr .= $value[$i];
    }
}

$sql = "INSERT INTO gameboard (`qeasy`, `qnormal`, `qhard`, `prolanguage`, `qeasycount`, `qnormalcount`, `qhardcount`, `qeasypoint`, `qnormalpoint`, `qhardpoint`, `gamepin`) VALUES ('$qeasy', '$qnormal', '$qhard', '$prolanguage', '$qeasycount', '$qnormalcount', '$qhardcount', '$qeasypoint', '$qnormalpoint', '$qhardpoint', '$value')";
$v1 = "a".$value;



$conn2 = mysqli_connect($servername,$username,$password,"teams_list");

$sql2 = "CREATE TABLE $v1 (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  teamname VARCHAR(30),
  palyer1 VARCHAR(30),
  player2 VARCHAR(30),
  player3 VARCHAR(30),
  player4 VARCHAR(30),
  pin BIGINT(20))";




if(mysqli_query($conn, $sql) && mysqli_query($conn2,$sql2)){
  echo "<script>window.location.href = \"../HTML/dashbord.html?data=$newstr\";</script>";
}else{
  echo "NOt Stored";
}




$conn->close();

?>