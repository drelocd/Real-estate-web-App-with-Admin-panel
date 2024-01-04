<?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_authenticated"]) || !$_SESSION["user_authenticated"]) {
    header("Location: login.php");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Establish a connection to the MySQL database (modify these details based on your setup)
    $host = "localhost";
    $username = "dre";
    $password = "";
    $database = "real_estate_database";

    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $title = $_POST["title"];
    $price = $_POST["price"];
    $details = $_POST["details"];
    $location = $_POST["location"];
    $availability = $_POST["availability"];

    // Upload profile photo
    $profilePhotoPath = "uploads/profile_photos/" . basename($_FILES["profilePhoto"]["name"]);

    // Check if the file was uploaded successfully
    if ($_FILES["profilePhoto"]["error"] == UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES["profilePhoto"]["tmp_name"], $profilePhotoPath);
    } else {
        // Handle file upload error (optional)
        $profilePhotoPath = ""; // Set to an empty string if upload failed
    }

    // Upload property photo 1
    $propertyPhoto1Path = "uploads/property_photos/" . basename($_FILES["propertyPhoto1"]["name"]);

    // Check if the file was uploaded successfully
    if ($_FILES["propertyPhoto1"]["error"] == UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES["propertyPhoto1"]["tmp_name"], $propertyPhoto1Path);
    } else {
        // Handle file upload error (optional)
        $propertyPhoto1Path = ""; // Set to an empty string if upload failed
    }
 // Upload property photo 2
    $propertyPhoto2Path = "uploads/property_photos/" . basename($_FILES["propertyPhoto2"]["name"]);
// Check if the file was uploaded successfully
    if ($_FILES["propertyPhoto1"]["error"] == UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES["propertyPhoto2"]["tmp_name"], $propertyPhoto2Path);
    } else {
        // Handle file upload error (optional)
        $propertyPhoto2Path = ""; // Set to an empty string if upload failed
    }
// Upload property photo 3
    $propertyPhoto3Path = "uploads/property_photos/" . basename($_FILES["propertyPhoto3"]["name"]);
// Check if the file was uploaded successfully
    if ($_FILES["propertyPhoto3"]["error"] == UPLOAD_ERR_OK) {
        move_uploaded_file($_FILES["propertyPhoto3"]["tmp_name"], $propertyPhoto3Path);
    } else {
        // Handle file upload error (optional)
        $propertyPhoto3Path = ""; // Set to an empty string if upload failed
    }

    // Use prepared statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO listings (title, price, details, location, profile_photo, property_photo_1,property_photo_2, property_photo_3, availability) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssssss", $title, $price, $details, $location, $profilePhotoPath, $propertyPhoto1Path, $propertyPhoto2Path, $propertyPhoto3Path, $availability);

    // Execute the statement
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Property listing added successfully!";
    } else {
        // Error in inserting data
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>
