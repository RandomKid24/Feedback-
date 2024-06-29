<?php
session_start();

// Function to generate the feedback form HTML
function generateFeedbackForm() {
    // Customize this function to generate your specific feedback form HTML
    $formHTML = <<<HTML
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Generate Feedback Form</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
        <style>
            /* Custom styles as per your feedback form */
        </style>
    </head>
    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4">Feedback Form Generator</h2>
            <p class="mb-4">Insert your form HTML generation logic here.</p>
            <!-- Your form HTML goes here -->
        </div>
    </body>
    </html>
    HTML;

    return $formHTML;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate password (for demonstration purposes)
    $expected_password = "your_admin_password"; // Replace with your actual password
    $entered_password = $_POST["password"];

    if ($entered_password === $expected_password) {
        // Password is correct, set session variable
        $_SESSION["admin_logged_in"] = true;
    } else {
        // Password is incorrect
        $error_message = "Invalid password! Please try again.";
    }
}

// Check if admin is logged in
if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
    // Admin is logged in, generate the feedback form
    echo generateFeedbackForm();
    exit; // Exit to prevent showing the login form again
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
        }
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #3b82f6;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-group button:hover {
            background-color: #2563eb;
        }
        .error-message {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center text-2xl font-bold mb-4">Admin Login</h2>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>
    </form>
</div>

</body>
</html>
