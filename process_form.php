<?php
$servername = "localhost";
$username = "dre";
$password = "";
$dbname = "realmark_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$message = $_POST['message'];
$email = $_POST['email'];
$inquiryType = $_POST['inquiryType'];

// Insert data into the database
$sql = "INSERT INTO messages (email, message, inquiry_type) VALUES ('$email', '$message', '$inquiryType')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
