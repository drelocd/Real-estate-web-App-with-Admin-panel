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
    <title>Add New Blog</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            min-width: 100%;
        }

        header {
            background-color: #18caf7;
            color: #fff;
            padding: 3px;
            text-align: center;
            
        }
        h2 {
  font-weight: bold;
  color:#000000;
  font-size: 24px;
  padding: 0px;
  margin: 0;
  min-width: 100%;
}

        nav {
            display: flex;
            justify-content: space-around;
            background-color: #f77e1b;
            border-radius: 0px;
            overflow: hidden;
            text-decoration-color: cyan;
            min-width: 100%;
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
        form {
    max-width: 600px;
    margin: 0px auto;
    background-color: #01F9C6;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}
#done {
    text-align: center;
    background-color: black;
}
#ipLocationWidget {
    float: left;
    width: 50%;
    background-color: #ccc;
    padding: 20px;
    border-radius: 10px;
    margin-top: 20px;
    box-sizing: border-box;
}
#ipLocationaWidget {
    float: left;
    width: 50%;
    background-color: #000000;
    padding: 10px;
    border-radius: 10px;
    margin-top: 20px;
    box-sizing: border-box;
}


/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}


input,
textarea {
    width: 100%;
    padding: 2px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize:none;
    background-color: #6D7B8D;
    font: 1.01em sans-serif;
    color: white;
}

input[type="file"] {
    padding-top: 5px;
}

button {
    background-color: #2B1B17;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #1284b7;
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
::placeholder {
  color: white;
  opacity: 1; /* Firefox */
}

::-ms-input-placeholder { /* Edge 12 -18 */
  color: red;
}
iframe {
            width: 100%; /* Adjust the width as needed */
            height: 50vh; /* Adjust the height as needed */
            padding: 20px; /* Remove iframe border */
            border-radius: 14px;
            transform: scale(0.8); /* Set the scale for 2x smaller */
            transform-origin: 0 0; /* Set the origin to the top-left corner */
            margin: 25px;
            margin-left: 55px;
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
    <h2 style="text-align:center;color:black;">EDITOR CONSOLE</h2>
        <!-- Add your content here -->
        <form action="post_blog.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="Title of Blog"required>

        <label for="details">Details:</label>
        <textarea name="details" rows="4" placeholder="A Brief Description Of the Blog" required></textarea>

        <label for="author">Author:</label>
        <input type="text" name="author" required>

        <label for="tags">Tags:</label>
        <input type="text" name="tags" placeholder="Keyword Tags">

        <label for="blog_image">Blog Image:</label>
        <input type="file" name="blog_image" accept="image/*" required>
        <label for="first_paragraph">First Paragraph:</label>
        <textarea name="first_paragraph" rows="4" maxlength="250" placeholder="This is Demo first Paragraph. You cannot design a site that looks the same in every browser & resolution. It is impossible for you to design a website to look the same in every browser, platform, and screen resolution, so avoid t You cannot design a site that looks the same in every browser & resolution. It is impossible for you to design a website to look the same in every browser, platform, and screen resolution, so avoid t"></textarea>

        <label for="second_paragraph">Second Paragraph:</label>
        <textarea name="second_paragraph" rows="4" maxlength="250" placeholder="This is Demo first Paragraph. You cannot design a site that looks the same in every browser & resolution. It is impossible for you to design a website to look the same in every browser, platform, and screen resolution, so avoid t You cannot design a site that looks the same in every browser & resolution. It is impossible for you to design a website to look the same in every browser, platform, and screen resolution, so avoid t"></textarea>

        <label for="third_paragraph">Third Paragraph:</label>
        <textarea name="third_paragraph" rows="4" maxlength="200" placeholder="This is Demo first Paragraph. You cannot design a site that looks the same in every browser & resolution. It is impossible for you to design a website to look the same in every browser, platform, and screen resolution, so avoid t You cannot design a site that looks the same in every browser & resolution. It is impossible for you to design a website to look the same in every browser, platform, and screen resolution, so avoid t"></textarea>

        <label for="inbody_image">Inbody Image:</label>
        <input type="file" name="inbody_image" accept="image/*">

        <button type="submit">Post Blog</button>
    </form>
  </div>
  <div class="column" style="background-color:#3C565B;">
    <h2 style="text-align:center;color:white;">ADMIN CO-PILOT</h2>
    <iframe src="layout.html" title="Blog Page Layout"></iframe>
  </div>
  <div id="ipLocationWidget" class="column" style="background-color:#3C565B;">
    <h2>User Information</h2>
    <p id="ipAddress">Loading...</p>
    <p id="location">Loading...</p>
</div>
<div id="ipLocationaWidget" class="column">
    <form id="done" method="post" action="logout.php">
        <button type="submit" name="logout" style="text-align:center">Logout</button>
    </form>
</div>

       
    </div>
    <script>
        function validateForm() {
            var title = document.forms["blogForm"]["title"].value;
            var details = document.forms["blogForm"]["details"].value;
            var tags = document.forms["blogForm"]["tags"].value;
            var blogImage = document.forms["blogForm"]["blog_image"].value;
            var inbodyImage = document.forms["blogForm"]["inbody_image"].value;
            var firstParagraph = document.forms["blogForm"]["first_paragraph"].value;
            var secondParagraph = document.forms["blogForm"]["second_paragraph"].value;
            var thirdParagraph = document.forms["blogForm"]["third_paragraph"].value;

            if (title == "" || details == "" || tags == "" || blogImage == "" || inbodyImage == "" || firstParagraph.length < 150 || secondParagraph.length < 150 || thirdParagraph.length < 150) {
                alert("Please fill in all required fields and ensure paragraphs have at least 150 characters.");
                return false;
            }
            return true;
        }
        //Display Login Info
        fetch('https://api64.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            // Check if the expected properties exist in the response
            const ipAddress = data.ip || 'N/A';
            const locationCity = data.location?.city || 'N/A';
            const locationRegion = data.location?.region || 'N/A';

            // Update the widget content
            document.getElementById('ipAddress').textContent = 'Your IP: ' + ipAddress;
            document.getElementById('location').textContent = 'Location: ' + locationCity + ', ' + locationRegion;
        })
        .catch(error => {
            console.error('Error fetching IP address and location:', error);
        });
        //Set Greeting
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
