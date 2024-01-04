<?php

// Replace these with your actual database credentials
$servername = "localhost";
$username = "dre";
$password = "";
$dbname = "real_estate_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch real estate listings data
$sql = "SELECT title, price, details, profile_photo FROM listings";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch data and encode as JSON
    $listings = array();
    while ($row = $result->fetch_assoc()) {
        $listing = array(
            'title' => $row['title'],
            'price' => $row['price'],
            'details' => $row['details'],
            'profilePhotoUrl'=>$row['profile_photo'], // Directly append the value without a key
        );

        $listings[] = $listing;
    }

    // Output JSON data
    header('Content-Type: application/json');
    echo json_encode($listings);
} else {
    // No listings found
    echo "No listings found.";
}

// Close connection
$conn->close();

?>
