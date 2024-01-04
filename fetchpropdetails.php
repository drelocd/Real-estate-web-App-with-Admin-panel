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

// Fetch property details based on the selected property ID
if (isset($_GET['id'])) {
    $propertyId = $_GET['id'];

    $sql = "SELECT id, title, price, details FROM properties WHERE id = $propertyId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output property details as JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Property not found";
    }
} else {
    echo "Property ID not provided";
}

// Close the connection
$conn->close();
?>
