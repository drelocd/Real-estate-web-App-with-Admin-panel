<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="100">
    <title>Blog - RealMark</title>
    <link rel="stylesheet" href="header-nav-styles.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh;
            background-color: coral;
        }

        header {
            background-color: #00ffaa;
            padding: 15px;
            text-align: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
            margin-right: 10px;
        }

        h1 {
            margin: 0;
            color: white;
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

        section {
            padding: 20px;
        }

        .blog-post {
            margin-bottom: 40px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: white;
            box-sizing: border-box;
            min-height: 250px;
        }

        .blog-image-container {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }

        .blog-image {
            max-width: 200px;
            max-height: 200px;
            width: auto;
            height: auto;
            margin-bottom: 10px;
            float: left;
            margin: 0 15px 0 0;
            
            
        }

        footer {
            background-color: rgb(12, 12, 11);
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: -1; /* Initially hidden */
            transition: z-index 0.5s ease; /* Smooth transition */
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            nav ul {
                flex-direction: column; /* Stack items vertically */
                align-items: center; /* Center items horizontally */
            }

            .logo-container img {
                max-width: 80%; /* Adjust the size of the smaller logo */
            }

            .blog-image {
                width: 100px; /* Adjust width for smaller screens */
                max-height: 100px;
            }
        }
    </style>
</head>

<body>

    <header>
        <!-- Include your header content here -->
        <div class="logo-container">
            <img src="logo.png" alt="Logo">
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
            <li class="active"><a href="blog.html">Blog</a></li>
        </ul>
    </nav>

    <section>
        <h2>Latest Blog Posts</h2>

        <?php
        // Replace these details with your actual database connection details
        $servername = "localhost";
        $username = "dre";
        $password = "";
        $dbname = "blogs_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch blog posts from the database
        $sql = "SELECT title, blog_image, date_published, details FROM blog_posts";
        $result = $conn->query($sql);

        // Display each blog post
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="blog-post">';
                echo '<div class="blog-image-container">';
                echo '<img class="blog-image" src="' . $row['blog_image'] . '" alt="' . $row['title'] . '">';
                echo '</div>';
                echo '<h3><a href="single_blog.php?title=' . urlencode($row['title']) . '">';  // Link to a single page
                echo $row['title'] . '</a></h3>';  // Display title as a link
                echo '<p>Published on: <span class="post-date">' . $row['date_published'] . '</span></p>';
                echo '<p>' . $row['details'] . '</p>';
                echo '<a href="single_blog.php?title=' . urlencode($row['title']) . '">Read more</a>';  // Link to a single page
                echo '</div>';
            }
        } else {
            echo "No blog posts available.";
        }

        // Close connection
        $conn->close();
        ?>

    </section>

    <footer>
        <p>&copy; 2023 RealMark. All rights reserved.</p>
    </footer>

    <script>
        // Show footer when scrolling to the end of the page
        window.addEventListener("scroll", function () {
            var scrollHeight = document.documentElement.scrollHeight;
            var scrollTop = window.scrollY + window.innerHeight;
            if (scrollHeight - scrollTop < 10) {
                document.querySelector("footer").style.zIndex = "1";
            } else {
                document.querySelector("footer").style.zIndex = "-1";
            }
        });
    </script>

</body>

</html>
