<?php
// Database connection parameters
$servername = "localhost";
$username = "dre";
$password = "";
$dbname = "daraja_application_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$cv = $_POST['cv'];
$resume = $_POST['resume'];
$age = $_POST['age'];
$location = $_POST['location'];
$kraPin = $_POST['kraPin'];
$idNumber = $_POST['idNumber'];
$position = $_POST['position'];
$telephone = $_POST['telephone'];

// SQL query to insert data into the database
$sql = "INSERT INTO job_applications (name, email, cv, resume, age, location, kra_pin, id_number, position, telephone)
        VALUES ('$name', '$email', '$cv', '$resume', $age, '$location', '$kraPin', '$idNumber', '$position', '$telephone')";   
if ($conn->query($sql) === TRUE) {
    echo "Application Has been Submitted Successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
