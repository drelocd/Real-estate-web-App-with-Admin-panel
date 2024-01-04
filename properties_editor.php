<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties Editor</title>
    <style>
        /* Add your custom styles for properties_editor.html here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 5px;
            box-sizing: border-box;
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
            border-radius: 5px;
            overflow: hidden;
            text-decoration-color: cyan;
            margin-bottom: 20px;
        }

        #console {
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f44336;
            /* Red background color */
            color: white;
            padding: 5px 10px;
            display: none;
            z-index: 1000;
            /* Ensure it's on top of other elements */
        }

        .column {
            float: left;
            width: 50%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        iframe {
            width: 100%;
            /* Adjust the width as needed */
            height: 50vh;
            /* Adjust the height as needed */
            padding: 20px;
            /* Remove iframe border */
            border-radius: 14px;
            transform: scale(0.8);
            /* Set the scale for 2x smaller */
            transform-origin: 0 0;
            /* Set the origin to the top-left corner */
            margin: 25px;
            margin-left: 55px;
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

        label {
            display: block;
            margin-bottom: 5px;
            margin-left: 5px;
        }

        input,
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            resize: none;
            margin-left: 5px;
        }

        .fix-this {
            color: red;
            font-size: 14px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        @media only screen and (max-width: 600px) {
            nav {
                flex-direction: column;
            }

            nav a {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1 id="greeting"></h1>
    </header>

    <nav>
        <a href="index.php">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
    </nav>
    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <h2>PROPERTY CONSOLE</h2>
            <form id="propertiesEditorForm" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>

                <label for="details">Details:</label>
                <textarea id="details" name="details" rows="4" required></textarea>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>

                <label for="profilePhoto">Profile Photo (200x200):</label>
                <input type="file" id="profilePhoto" name="profilePhoto" accept="image/*" required>
                <label for="propertyPhoto1">Property Photo 1 (.jpg, .jpeg, .jfif, .pjpeg, .png, .raw, .pdf, .tiff):</label>
<input type="file" id="propertyPhoto1" name="propertyPhoto1" accept=".jpg, .jpeg, .jfif, .pjpeg, .png, .raw, .pdf, .tiff" required>

<label for="propertyPhoto2">Property Photo 2 (.jpg, .jpeg, .jfif, .pjpeg, .png, .raw, .pdf, .tiff):</label>
  <input type="file" id="propertyPhoto2" name="propertyPhoto2" accept=".jpg, .jpeg, .jfif, .pjpeg, .png, .raw, .pdf, .tiff" required>

<label for="propertyPhoto3">Property Photo 3 (.jpg, .jpeg, .jfif, .pjpeg, .png, .raw, .pdf, .tiff):</label>
  <input type="file" id="propertyPhoto3" name="propertyPhoto3" accept=".jpg, .jpeg, .jfif, .pjpeg, .png, .raw, .pdf, .tiff" required>

                <label for="availability">Availability:</label>
                <select id="availability" name="availability" required>
                    <option value="Available">Available</option>
                    <option value="Sold">Sold</option>
                </select>
                <button type="button" onclick="submitForm()">Submit</button>
            </form>
        </div>
        <div class="column" style="background-color:#3C565B;">
            <h2 style="text-align:center;color:white;">ADMIN CO-PILOT</h2>
            <iframe src="Property_layout.html" title="Blog Page Layout"></iframe>
        </div>
    </div>
    <div id="console"></div>

    <script>
        function submitForm() {
            // Reset and hide the console
            document.getElementById('console').style.display = 'none';
            document.getElementById('console').textContent = '';

            // Validate form data
            const title = document.getElementById('title').value.trim();
            const price = document.getElementById('price').value.trim();
            const details = document.getElementById('details').value.trim();
            const location = document.getElementById('location').value.trim();
            const profilePhoto = document.getElementById('profilePhoto').files[0];
const propertyPhoto = document.getElementById('propertyPhoto1').files[0];
const Photo2 = document.getElementById('propertyPhoto2').files[0];
const Photo3 = document.getElementById('propertyPhoto3').files[0];

      
            

            // Basic validation
            if (!title || !price || !details || !location || !profilePhoto) {
                // Display error in the console
                document.getElementById('console').textContent = 'All fields are required, and property photos should be more than one.';
                document.getElementById('console').style.display = 'block';
                return;
            }

            // Additional validations
            if (title.length > 20 || !/^[a-zA-Z ]+$/.test(title)) {
                document.getElementById('console').textContent = 'Title should be text only and not exceed 20 characters.';
                document.getElementById('console').style.display = 'block';
                return;
            }

            if (isNaN(price) || parseFloat(price) <= 0) {
                document.getElementById('console').textContent = 'Price should be a positive numerical value.';
                document.getElementById('console').style.display = 'block';
                return;
            }

            if (details.length < 150) {
                document.getElementById('console').textContent = 'Details should be a minimum of 150 characters.';
                document.getElementById('console').style.display = 'block';
                return;
            }

            // Validate profile photo size
            const maxProfilePhotoSize = 250; // Maximum size in pixels
            const profilePhotoImage = new Image();
            profilePhotoImage.src = URL.createObjectURL(profilePhoto);
            profilePhotoImage.onload = function () {
                if (profilePhotoImage.width > maxProfilePhotoSize || profilePhotoImage.height > maxProfilePhotoSize) {
                    document.getElementById('console').textContent = `Profile photo should not exceed ${maxProfilePhotoSize}x${maxProfilePhotoSize} pixels.`;
                    document.getElementById('console').style.display = 'block';
                } else {
                    // Create FormData and submit the form
                    const form = document.getElementById('propertiesEditorForm');
                    const formData = new FormData(form);

                    // Send data to the server using AJAX
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', 'insert.php', true);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            // Handle the server response
                            if (xhr.status === 200) {
                                // If successful, reset and hide the console
                                document.getElementById('console').style.display = 'none';
                                document.getElementById('console').textContent = '';
                                // Optionally, reset the form after successful submission
                                form.reset();
                            } else {
                                // If there's an error, display it in the console
                                document.getElementById('console').textContent = xhr.responseText;
                                document.getElementById('console').style.display = 'block';
                            }
                        }
                    };

                    xhr.send(formData);
                }
            };
        }
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
    </script>

</body>

</html>
