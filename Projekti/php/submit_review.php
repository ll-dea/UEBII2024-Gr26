<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Basic validation
    if (empty($user_name) || empty($email) || empty($rating) || empty($comment)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

   

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_register";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO page_reviews (user_name, email, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $user_name, $email, $rating, $comment);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Review submitted successfully.";
    } else {
        echo "Error: " . $stmt->errno . " - " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
