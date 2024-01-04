<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="header-nav-styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Listings</title>
    <style>
        /* Reset some default styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh;
            background-color: coral;
        }
        h1 {
            margin: 0;
            color: white;
        }

        /* Container for listings */
        #listings-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Style for each listing */
        .listing {
            box-sizing: border-box;
            width: 100%;
            max-width: 600px;
            padding: 0px;
            border: 1px solid #ccc;
            margin: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav ul {
            padding: 0;
            margin: 0;
            list-style: none;
            display: flex;
            justify-content: space-around;
        }

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        /* Style for profile photo area */
        .profile-photo {
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 50%;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Style for details area */
        .details {
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }

        /* Style for price area */
        .price {
            width: 100%;
            margin-top: 10px;
            text-align: center;
        }
        header {
            background-color: #00ffaa;
            padding: 15px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container img {
            width: 80px;
            height: 80px;
            margin-right: 10px;
        }

        /* Responsive styles */
        @media (max-width: 601px) {
            .profile-photo {
                width: 100px;
                height: 100px;
            }

            .listing {
                max-width: 100%;
            }

            header {
                padding: 7.5px; /* Half of the original padding */
            }

            nav ul {
                flex-direction: column; /* Stack items vertically */
                align-items: center; /* Center items horizontally */
            }

            .logo-container img {
                max-width: 80%; /* Adjust the size of the smaller logo */
            }
        }
    </style>
</head>

<body>
    <header>
        <!-- Include your header content here -->
        <div class="logo-container"> <picture>
                <!-- Large logo for larger screens -->
                <source media="(min-width: 601px)" srcset="logo.png">
                <!-- Small logo for smaller screens -->
                <img src="favicon.ico" alt="Small Logo">
            </picture>
            <h1>REALMARK PROPERTIES</h1>
        </div>
    </header>

    <nav>
        <!-- Include your navigation content here -->
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="privacy.html">Privacy</a></li>
            <li><a href="careers.html">Careers</a></li>
            <li><a href="properties.php">Properties</a></li>
            <li><a href="blog.php">Blog</a></li>
        </ul>
    </nav>

    <div id="listings-container"></div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fetch data from the server
        fetch('fetch.php')
            .then(response => response.json())
            .then(data => displayListings(data))
            .catch(error => console.error('Error fetching data:', error));
    });

    function displayListings(listings) {
        const container = document.getElementById('listings-container');
        listings.forEach(listing => {
            // Create a div for each listing
            const listingDiv = document.createElement('div');
            listingDiv.classList.add('listing');

            // Create a link for each listing
            const listingLink = document.createElement('a');
            // Use encodeURIComponent to handle special characters in titles
            listingLink.href = `single_property.php?title=${encodeURIComponent(listing.title)}`;
            listingLink.style.textDecoration = 'none'; // Remove underline for the link

            // Display profile photo
            const photoDiv = document.createElement('div');
            photoDiv.classList.add('profile-photo');
            const photoImg = document.createElement('img');
            photoImg.src = `${listing.profilePhotoUrl}`;
            photoImg.alt = 'Listing Photo';
            photoDiv.appendChild(photoImg);
            listingLink.appendChild(photoDiv);

            listingDiv.appendChild(listingLink);

            // Display Title
            const titleDiv = document.createElement('div');
            titleDiv.classList.add('title');
            titleDiv.textContent = `Title: ${listing.title}`;
            listingDiv.appendChild(titleDiv);

            // Display details
            const detailsDiv = document.createElement('div');
            detailsDiv.classList.add('details');
            detailsDiv.textContent = `Details: ${listing.details}`;
            listingDiv.appendChild(detailsDiv);

            // Display price
            const priceDiv = document.createElement('div');
            priceDiv.classList.add('price');
            priceDiv.textContent = `Price: $${listing.price}`;
            listingDiv.appendChild(priceDiv);

            // Append the listing div to the container
            container.appendChild(listingDiv);
        });
    }
</script>

</body>
</html>
