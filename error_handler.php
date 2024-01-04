<!-- error_handler.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Handler</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh;
            background-color: #f0f0f0;
        }

        .error-container {
            background-color: #ffcccc;
            border: 1px solid #ff0000;
            padding: 10px;
            margin-bottom: 20px;
            color: #ff0000;
        }
    </style>
</head>
<body>

    <div class="error-container">
        <?php
        if (isset($_GET['error_message'])) {
            echo htmlspecialchars($_GET['error_message']);
        }
        ?>
    </div>

</body>
</html>
