<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Perform user authentication here, validate email and password
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Example: Check credentials (Replace this with your authentication logic)
    if ($email == "Xploit1017@dre.com" && $password == "Password123") {
        // Set a session variable to mark the user as authenticated
        $_SESSION["user_authenticated"] = true;

        // Redirect to the dashboard or another secure page
        header("Location: dash.php");
        exit;
    } else {
        // Authentication failed, show an error message
        $error_message = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body>

    <form class="login-form" action="login.php" method="post">
        <p class="login-text">
            <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-lock fa-stack-1x"></i>
            </span>
        </p>
        <input type="email" class="login-username" autofocus="true" required="true" placeholder="Email" name="email" />
        <input type="password" class="login-password" required="true" placeholder="Password" name="password" />
        <input type="submit" name="Login" value="Login" class="login-submit" />
    </form>

    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <div class="underlay-photo"></div>
    <div class="underlay-black"></div>

</body>
</html>
