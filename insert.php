<?php
// Get the form data
$name = $_POST['name'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$email = $_POST['email'];

// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert user details into the database
$sql = "INSERT INTO users (name, age, weight, email) VALUES ('$name', $age, $weight, '$email')";
if ($conn->query($sql) === TRUE) {
  $userId = $conn->insert_id;

  // Move the uploaded file to a desired directory
  $targetDirectory = "uploads/";
  $targetFile = $targetDirectory . basename($_FILES['healthReport']['name']);
  move_uploaded_file($_FILES['healthReport']['tmp_name'], $targetFile);

  // Update the user record with the file path in the database
  $sql = "UPDATE users SET health_report='$targetFile' WHERE id=$userId";
  if ($conn->query($sql) === TRUE) {
    echo "User details and health report uploaded successfully";
  } else {
    echo "Error updating health report: " . $conn->error;
  }
} else {
  echo "Error inserting user details: " . $conn->error;
}

// Close the database connection
$conn->close();
?>