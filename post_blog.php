<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Validate input
    $title = $_POST['title'];
    $details = $_POST['details'];
    $author = $_POST['author'];
    $tags = $_POST['tags'];
    $firstParagraph = $_POST['first_paragraph'];
    $secondParagraph = $_POST['second_paragraph'];
    $thirdParagraph = $_POST['third_paragraph'];

    if (
        empty($title) || empty($details) || empty($author) || empty($tags) ||
        empty($firstParagraph) || empty($secondParagraph) || empty($thirdParagraph) ||
        strlen($firstParagraph) < 150 || strlen($secondParagraph) < 150 || strlen($thirdParagraph) < 150
    ) {
        // Redirect back to the admin page with an error message
        header("Location: blogger.php?error=invalid_input");
        exit();
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO blog_posts (title, details, author, tags, first_paragraph, second_paragraph, third_paragraph, blog_image, inbody_image, date_published) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssssssss", $title, $details, $author, $tags, $firstParagraph, $secondParagraph, $thirdParagraph, $blog_image, $inbody_image);

    // Upload images
    $target_dir_blog = "blog_images/";
    $target_file_blog = $target_dir_blog . basename($_FILES["blog_image"]["name"]);
    move_uploaded_file($_FILES["blog_image"]["tmp_name"], $target_file_blog);

    $blog_image = $target_file_blog;

    $target_dir_inbody = "inbody_images/";
    $target_file_inbody = $target_dir_inbody . basename($_FILES["inbody_image"]["name"]);
    move_uploaded_file($_FILES["inbody_image"]["tmp_name"], $target_file_inbody);

    $inbody_image = $target_file_inbody;

    // Execute the SQL statement
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the admin page after posting
    header("Location: blogger.php?success=post_successful");
    exit();
}
?>
