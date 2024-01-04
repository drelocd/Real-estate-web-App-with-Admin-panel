<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    // Get the title of the clicked blog post from the URL
    $clickedTitle = $_GET['title'];

    // Fetch blog post details from the database
    $sql = "SELECT title, blog_image, inbody_image, date_published, author, details, first_paragraph, second_paragraph, third_paragraph FROM blog_posts WHERE title = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $clickedTitle);
    $stmt->execute();
    $stmt->bind_result($title, $blogImage, $inbodyImage, $datePublished, $author, $details, $firstParagraph, $secondParagraph, $thirdParagraph);

    // Fetch the first row of the result
    $stmt->fetch();

    echo '<title>' . $title . ' - RealMark</title>';
    ?>
    <link rel="stylesheet" href="header-nav-styles.css">
    <!-- Include any additional styles or scripts as needed -->
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
            color: black;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        #me {
            text-decoration: underline;
        }

        p {
            color: black;
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
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            background-color: white;
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

        .inbody-image {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
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
            .profile-photo {
                width: 100px;
                height: 100px;
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

            .blog-image {
                max-width: 100px;
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
            <li><a href="blog.php">Blog</a></li>
        </ul>
    </nav>

    <section>
        <div class="blog-post">
            <h1 id="me"><?php echo $title; ?></h1>
            <p style="float: right;"><?php echo $datePublished; ?></p>
            <img class="blog-image" src="<?php echo $blogImage; ?>" alt="<?php echo $title; ?>">
            <p>Author: <?php echo $author; ?></p>
            <p><?php echo $firstParagraph; ?></p>
            <p><?php echo $secondParagraph; ?></p>
            <img class="inbody-image" src="<?php echo $inbodyImage; ?>" alt="Inbody Image">
            <p><?php echo $thirdParagraph; ?></p>
        </div>
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
