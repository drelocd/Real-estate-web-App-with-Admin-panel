<?php
$servername = "localhost";
$username = "dre";
$password = "";
$dbname = "realmrk_properties_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch property data and image file path by ID
function getPropertyWithImage($conn, $propertyId) {
    // Sanitize the input to prevent SQL injection
    $propertyId = $conn->real_escape_string($propertyId);

    if (empty($propertyId)) {
        return null; // Return null if $propertyId is empty
    }

    // Fetch property details
    $propertySql = "SELECT * FROM property_table WHERE id = $propertyId";
    $propertyResult = $conn->query($propertySql);

    if ($propertyResult === FALSE) {
        die("Error executing property query: " . $conn->error);
    }

    $propertyData = $propertyResult->fetch_assoc();

    // Fetch image file path
    $imageSql = "SELECT file_path FROM image_table WHERE property_id = $propertyId";
    $imageResult = $conn->query($imageSql);

    if ($imageResult === FALSE) {
        die("Error executing image query: " . $conn->error);
    }

    $imageData = $imageResult->fetch_assoc();

    // Combine property details and image file path
    if ($propertyData && $imageData) {
        $combinedData = array_merge($propertyData, $imageData);
        return $combinedData;
    } else {
        return null;
    }
}

// Fetch property data and image file path
$propertyId = isset($_GET['propertyId']) ? $_GET['propertyId'] : null;
$data = getPropertyWithImage($conn, $propertyId);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <h1>Properties</h1>

    <div id="property-container"></div>

    <script>
        // Function to create a property card with fetched data
        function createPropertyCard(data) {
            const propertyContainer = document.getElementById("property-container");

            const card = document.createElement("div");
            card.classList.add("property-card");

            const imageContainer = document.createElement("div");
            imageContainer.id = "output-image";
            const image = document.createElement("img");
            image.src = data['file_path']; // Assuming the column name is 'file_path'
            image.alt = "Property Image";
            imageContainer.appendChild(image);

            const title = document.createElement("div");
            title.textContent = data['title']; // Assuming the column name is 'title'

            const description = document.createElement("div");
            description.textContent = data['description']; // Assuming the column name is 'description'

            const price = document.createElement("div");
            price.textContent = data['price']; // Assuming the column name is 'price'

            card.appendChild(imageContainer);
            card.appendChild(title);
            card.appendChild(description);
            card.appendChild(price);

            propertyContainer.appendChild(card);
        }

        // Fetch data and create property cards when the page loads
        document.addEventListener("DOMContentLoaded", async () => {
            // Assuming you have multiple properties in your database
            const propertyId = <?php echo json_encode($propertyId); ?>;
            const data = <?php echo json_encode($data); ?>;
            
            if (propertyId && data) {
                createPropertyCard(data);
            }
        });
    </script>
</body>
</html>
