<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
  $servername = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "question";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $question = $_POST["question"];
  $option1 = $_POST["option1"];
  $option2 = $_POST["option2"];
  $option3 = $_POST["option3"];
  $option4 = $_POST["option4"];
  $question_type = $_POST["qtype"];
  $correct = $_POST["correctoption"];
  
  $sql1 = "SELECT question_number FROM question_text ORDER BY id DESC LIMIT 1";
  
  // Execute the query
  $result = $conn->query($sql1);

  // Check if any rows were returned
  if ($result->num_rows > 0) {
    // Fetch the last number
    $row = $result->fetch_assoc();
    $last_number = $row["question_number"];
  }
  $question_no = $last_number + 1;

  $sql = "INSERT INTO question_text (question,option1,option2,option3,option4,correct,question_type,question_number) VALUES ('$question', '$option1', '$option2','$option3','$option4','$correct','$question_type','$question_no')";
  if ($conn->query($sql) === TRUE) {
    $_SESSION['message'] = "Question data submitted successfully.";

    // Redirect back to the form page
    header("Location: ../../HTML/question_upload_image.php");
    
    } else {
        echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
    }
}else{
    echo "Not Connected";
}
?>