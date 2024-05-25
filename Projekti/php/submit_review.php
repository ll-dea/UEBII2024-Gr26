<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Basic validation
    if (empty($user_name) || empty($email) || empty($rating) || empty($comment)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        die();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
        die();
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
        echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]);
        die();
    }

    // Insert data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO page_reviews (user_name, email, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $user_name, $email, $rating, $comment);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
