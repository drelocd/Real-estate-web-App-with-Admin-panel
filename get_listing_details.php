<?php

// Replace these with your actual database credentials
$servername = "localhost";
$username = "dre";
$password = "";
$dbname = "real_estate_database";

// Function to get listing details by ID
function getListingDetails($id, $conn)
{
    // Escape user inputs to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // SQL query to fetch listing details
    $sql = "SELECT * FROM listings WHERE id = '$id'";
    $result = $conn->query($sql);

    // Check for query success
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null; // Return null if no listing found
    }
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch listing details based on the ID from the URL
$listingId = isset($_GET['id']) ? $_GET['id'] : null;
$listingDetails = $listingId ? getListingDetails($listingId, $conn) : null;

// Close connection
$conn->close();

?>
