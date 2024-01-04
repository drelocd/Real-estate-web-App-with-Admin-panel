<?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_authenticated"]) || !$_SESSION["user_authenticated"]) {
    header("Location: login.php");
    exit;
}
// Assuming you have a database connection, replace these placeholders with your actual database connection details
$servername = "localhost";
$username = "dre";
$password = "";
$dbname = "realmark_properties_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all property listings from the database
$sql = "SELECT id, title FROM properties";
$result = $conn->query($sql);

$properties = [];

if ($result->num_rows > 0) {
    // Output property listings as JSON
    while ($row = $result->fetch_assoc()) {
        $properties[$row['id']] = $row['title'];
    }
    echo json_encode($properties);
} else {
    echo "No properties found";
}

// Close the connection
$conn->close();
?>
