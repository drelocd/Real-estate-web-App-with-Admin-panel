<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Property</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        header {
            background-color: #00ffaa;
            padding: 15px;
            text-align: center;
        }

        .property-details {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .property-details img {
            max-width: 100%;
            height: auto;
            margin-top: 15px;
        }

        .slideshow-container {
            max-width: 100%;
            overflow: hidden;
            position: relative;
        }

        .mySlides {
            display: none;
        }

        .mySlides img {
            width: 100%;
            height: auto;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>

    <header>
        <h1>REALMARK PROPERTIES</h1>
    </header>

    <div class="property-details">
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

        // Fetch listing details based on the ID or title from the URL
        $listingId = isset($_GET['id']) ? $_GET['id'] : null;
        $listingTitle = isset($_GET['title']) ? $_GET['title'] : null;

        $listingDetails = null;

        
function getListingDetailsById($listingId, $conn)
{
    $listingId = mysqli_real_escape_string($conn, $listingId);

    $sql = "SELECT * FROM listings WHERE id = '$listingId'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

function getListingDetailsByTitle($listingTitle, $conn)
{
    $listingTitle = mysqli_real_escape_string($conn, $listingTitle);

    $sql = "SELECT * FROM listings WHERE title = '$listingTitle'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

        if ($listingId) {
            $listingDetails = getListingDetailsById($listingId, $conn);
        } elseif ($listingTitle) {
            $listingDetails = getListingDetailsByTitle($listingTitle, $conn);
        }

        // Close connection
        $conn->close();

        if ($listingDetails) {
            echo "<h1>{$listingDetails['title']}</h1>";
            
            echo "<img src='{$listingDetails['profile_photo']}' alt='Profile Photo'>";
            echo "<div class='details'>{$listingDetails['details']}</div>";
            echo "<div class='location'>Location: {$listingDetails['location']}</div>";
            echo "<div class='price'>Price: {$listingDetails['price']}</div>";
            echo "<div class='Availability'>Availabilty: {$listingDetails['availability']}</div>";
        ?>
        <div class="slideshow-container">
            <?php
            $propertyPhotos = json_decode($listingDetails['property_photos']);
            if ($propertyPhotos) {
                foreach ($propertyPhotos as $index => $photo) {
                    echo "<div class='mySlides'><img src='admin/$photo'></div>";
                }
            }
            ?>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <?php
        } else {
            echo "<p>Property not found</p>";
        }
        ?>
    </div>

    <script>
        let slideIndex = 1;

        function showSlides(n) {
            let i;
            const slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        document.addEventListener("DOMContentLoaded", function () {
            showSlides(slideIndex);
        });
    </script>

</body>

</html>
