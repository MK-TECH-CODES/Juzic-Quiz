<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "two_wheeler_data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    

    // Allow certain file formats
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_types)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Read the file content
        $image_content = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

        // Prepare SQL statement to insert into database
        $sql = "INSERT INTO sample (image) VALUES ('$image_content')";

        if ($conn->query($sql) === TRUE) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded and the information has been stored in the database.";
        } else {
            echo "Sorry, there was an error uploading your file and storing information in the database: " . $conn->error;
        }

        
    }

    // Close connection
    $conn->close();
}
?>