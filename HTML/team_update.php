<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$conn = mysqli_connect($servername,$username,$password,"teams_list");

if(!$conn){
    die(mysqli_connect_error());
}

$room_num = $_GET["data"];
$cleaned_string = str_replace("-", "", $room_num);
$room_db =  "a".$cleaned_string;

$sql = "SELECT teamname FROM $room_db ORDER BY id DESC"; // Corrected SQL query
$result = mysqli_query($conn, $sql); 


if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class=\"col-3\">";
        echo "<div class=\"card\" style=\"width: 18rem;\">";
        echo "<div class=\"card-body\">";
        echo "<h5 class=\"card-title\">";
        echo $row["teamname"];
        echo "</h5>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "0 results";
}
?>