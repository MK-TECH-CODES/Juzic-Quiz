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
  $uploadOk = 1;
  
  
  // Check if image file is a actual image or fake image
  $question = getimagesize($_FILES["question"]["tmp_name"]);
  $option1 = getimagesize($_FILES["option1"]["tmp_name"]);
  $option2 = getimagesize($_FILES["option2"]["tmp_name"]);
  $option3 = getimagesize($_FILES["option3"]["tmp_name"]);
  $option4 = getimagesize($_FILES["option4"]["tmp_name"]);

  if($question === false ){
    echo "File is not an image.";
    $uploadOk = 0;
  }
  $question_type = $_POST["qtype"];
  $correct = $_POST["correctoption"];
  
  $sql1 = "SELECT question_number FROM question_image ORDER BY id DESC LIMIT 1";
  
  // Execute the query
  $result = $conn->query($sql1);

  // Check if any rows were returned
  if ($result->num_rows > 0) {
    // Fetch the last number
    $row = $result->fetch_assoc();
    $last_number = $row["question_number"];
    
    // Output the last number
    echo "Last Number: " . $last_number;
  } else {
    echo "No rows found";
  }
  $question_no = $last_number + 1;




  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  } else {
      // Read the file content
      $image_content = addslashes(file_get_contents($_FILES["question"]["tmp_name"]));
      $image_content1 = addslashes(file_get_contents($_FILES["option1"]["tmp_name"]));
      $image_content2 = addslashes(file_get_contents($_FILES["option2"]["tmp_name"]));
      $image_content3 = addslashes(file_get_contents($_FILES["option3"]["tmp_name"]));
      $image_content4 = addslashes(file_get_contents($_FILES["option4"]["tmp_name"]));


      // Prepare SQL statement to insert into database
      $sql = "INSERT INTO question_image (question,option1,option2,option3,option4,correct,question_type,question_number) VALUES ('$image_content', '$image_content1', '$image_content2', '$image_content3', '$image_content4', '$correct', '$question_type','$question_no')";

      if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Question data submitted successfully.";

        // Redirect back to the form page
        header("Location: ../../HTML/question_upload_image.php");
          
      } else {
          echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
      }
  }
  
  $conn->close();
  
}else{
  echo "Not connected";
}
?>