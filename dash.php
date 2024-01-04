<?php
session_start();

// Check if the user is not authenticated, redirect to the login page
if (!isset($_SESSION["user_authenticated"]) || !$_SESSION["user_authenticated"]) {
    header("Location: dash.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Dashboard</title>
    
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
            border-radius: 5px;
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

        .Ulement {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .AdminElements {
            width: 40%;
            background-color: #fff;
            border: 3px solid #cc9020;
            padding: 20px;
            margin: 10px;
            text-align: center;
            height: fit-content;
        }

        @media only screen and (max-width: 600px) {
            nav {
                flex-direction: column;
            }

            nav a {
                width: 100%;
            }

            .AdminElements {
                width: 80%;
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
    <section class="Ulement">
        <div class="AdminElements">
            <h2>Properties</h2>
            <a href="properties_editor.php">Create New Listing</a>
            <a href="modify_listing.php">Modify Listing</a>
            <a href="delete_listing.php">Delete Listing</a>
        </div>

        <div class="AdminElements">
            <h2>Blog</h2>
            <a href="add_new_blog.php">Add New Blog</a>
            <a href="modify_blog.php">Modify Blog</a>
            <a href="delete_blog.php">Delete Blog</a>
        </div>
    </section>
    <form method="post" action="logout.php">
        <button type="submit" name="logout">Logout</button>
    </form>
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
    </script>

</body>
</html>
