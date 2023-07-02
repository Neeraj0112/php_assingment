<?php

// Establish the database connection
$db = mysqli_connect("localhost", "root", "", "phpform");

//Getting the submitted information
if(isset($_POST["name"])){

  $name = $_POST["name"];
  $age = $_POST["age"];
  $weight = $_POST["weight"];
  $email = $_POST["email"];

  $query = "INSERT INTO `users` (`id`, `name`, `age`, `weight`, `email`) VALUES (NULL, '$name', '$age', '$weight', '$email')";
  $result = mysqli_query($db, $query);

  if($result){

    $path = "uploads/";
    $target_file = $path . $email . ".pdf";
    $file=$_FILES['healthReport']['name'];    
    $result = move_uploaded_file($_FILES['healthReport']['tmp_name'],$target_file);
    if ($result) {
        echo "file successfully uploaded";
    }
    else {
        echo "please select your file";
    }

  }

}

?>