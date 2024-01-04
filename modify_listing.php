<?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_authenticated"]) || !$_SESSION["user_authenticated"]) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Listing</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #18caf7;
            color: #fff;
            padding: 3px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #f77e1b;
            border-radius: 0px;
            overflow: hidden;
            text-decoration-color: cyan;
        }

        nav a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        nav a:hover {
            background-color: #18caf7;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        @media only screen and (max-width: 600px) {
            nav {
                flex-direction: column;
            }

            nav a {
                width: 100%;
            }
        }


        .property-photo-container {
            width: 250px;
            height: 250px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto; /* Center the container */
            margin-bottom: 20px; /* Adjust spacing */
        }

        .property-photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
 

/* Create two equal columns that floats next to each other */
.row {
  display: flex;
}

.column {
    float: left;
  padding: 10px;
  min-height: 850px;

}
.left {
  width: 25%;
}
.right {
  width: 75%;
}
/* Responsive layout - when the screen is less than 850px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
.property-photo-container {
                margin-bottom: 10px; /* Adjust spacing for smaller screens */
            }
        
    </style>
</head>
<body onload="populateDropdown()">

    <header>
        <h1 id="greeting"></h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </nav>
   
    <script>
        // Get the current hour
        var currentHour = new Date().getHours();

        // Set the greeting based on the time of day
        var greeting;
        if (currentHour >= 5 && currentHour < 12) {
            greeting = "Good morning";
        } else if (currentHour >= 12 && currentHour < 18) {
            greeting = "Good afternoon";
        } else {
            greeting = "Good evening";
        }

        // Update the greeting in the HTML
        document.getElementById("greeting").textContent = greeting + ", Admin!";

         // Function to fetch property details based on the selected property ID
         function fetchPropertyDetails() {
            // Get the selected property ID from the dropdown
            var propertyId = document.getElementById("propertyDropdown").value;

            // Make an AJAX request to fetch property details
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetchpropdetails.php?id=" + propertyId, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response, e.g., update output areas with property details
                    var propertyDetails = JSON.parse(xhr.responseText);
                    updateOutputAreas(propertyDetails);
                    updatePropertyPhoto(propertyDetails.photoPath);
                }
            };
            xhr.send();
        }
        //function to update property photo
        function updatePropertyPhoto(photoPath) {
    var propertyPhoto = document.getElementById("propertyPhoto");
    if (photoPath) {
        // If photo path is available, set the src attribute
        propertyPhoto.src = photoPath;
    } else {
        // If no photo path is available, display a placeholder or default image
        propertyPhoto.src = "placeholder.jpg"; // Replace with your placeholder image
    }
}

        // Function to update output areas with property details
        function updateOutputAreas(propertyDetails) {
            // Update the output areas with the fetched property details
            document.getElementById("outputTitle").innerText = propertyDetails.title;
            document.getElementById("outputPrice").innerText = propertyDetails.price;
            document.getElementById("outputDetails").innerText = propertyDetails.details;
        }

        // Function to populate the dropdown with property listings
        function populateDropdown() {
            // Make an AJAX request to fetch all property listings
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "fetchallprop.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response, e.g., populate the dropdown
                    var properties = JSON.parse(xhr.responseText);
                    populateDropdownOptions(properties);
                }
            };
            xhr.send();
        }

        // Function to populate dropdown options
        function populateDropdownOptions(properties) {
            var dropdown = document.getElementById("propertyDropdown");

            // Clear existing options
            dropdown.innerHTML = "";

            // Add a default option
            var defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.text = "Select a property";
            dropdown.appendChild(defaultOption);

            // Add options for each property
            for (var propertyId in properties) {
                var option = document.createElement("option");
                option.value = propertyId;
                option.text = properties[propertyId];
                dropdown.appendChild(option);
            }
        }
        function kis(){
            var x=document.getElementById("we");
          x= document.setAttribute("hidden")=false;
        }


        
    </script>
     <div class="row">
  <div class="column left" style="background-color:#aaa;">
    <h2>SELECT LISTING TO MODIFY</h2>
    <label for="propertyDropdown">Select Property:</label>
    <select id="propertyDropdown" onchange="fetchPropertyDetails()"></select>
    <div class="property-photo-container">
                <img id="propertyPhoto" src="" alt="Property Photo">
            </div>
            <button onclick="kis()">show</button>
    <h2>Property Details:</h2>
    <p>Title: <span id="outputTitle"></span></p>
    <p>Price: <span id="outputPrice"></span></p>
    <p>Details: <span id="outputDetails"></span></p>
    </div>
    <div class="column right" style="background-color:#bbb;">
    <h2>LISTING EDITOR</h2>
    <iframe id="we" src="img-01.jpg" width="50%" height="50%" frameborder="0" hidden="true"></iframe>
  
  </div>
</div>
<form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>
