<?php
define('BASE_URL', 'home.php');

// Start or resume session
session_start();

// Check if a cookie exists for the visit count
if(isset($_COOKIE['visit_count'])) {
    $visit_count = $_COOKIE['visit_count'] + 1; // Increment the visit count
    setcookie('visit_count', $visit_count, time() + (86400 * 30), "/"); // Refresh the cookie with the new value
} else {
    $visit_count = 1; // If cookie doesn't exist, set the visit count to 1
    setcookie('visit_count', $visit_count, time() + (86400 * 30), "/"); // Create a new cookie
}

// Use session to store the visit count value
$_SESSION['visit_count'] = $visit_count;

// Database configuration
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = ""; // Inicializimi i variablës $name
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username from the form
    $name = $_POST["emri"];
    
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username from the form
    $name = $_POST["emri"];

    // Prepare a SQL statement with a parameter placeholder
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    
    // Bind the parameter to the statement
    $stmt->bind_param("s", $name);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there is at least one row returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<h1>Welcome to our website " . strtoupper($row["username"]) . "!</h1>";
        }
    } else {
        echo "<h1>Welcome to our website Guest!</h1>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/loginphp.css">
    <style>
        body {
            font-family: 'Truculenta', sans-serif; /* Use the custom font */
            background-color: #f8f9fa; /* Set background color */
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
        .container {
            background-color: #ffffff; /* White background */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Add shadow */
            padding: 20px;
            text-align: center; /* Center content */
        }
        h1 {
            color: #8efc8c; /* Set heading color */
            margin-bottom: 20px; /* Add space below heading */
        }
        p {
            color: #6c757d; /* Set paragraph color */
        }
    </style>
    <title>Garden Shop</title>
</head>

        
<body  style="<?php if($visit_count % 2 == 0) { echo 'background-color: #8efc8c;'; } else { echo 'background-color:rgb(251, 242, 111) ;'; } ?>">
    <div class="container">
      
        
        <h1>Welcome to our website <?php echo strtoupper($name); ?>!</h1>
        <p>This is your visit number <?php echo $_SESSION['visit_count']; ?>.</p>
        <a href="<?php echo BASE_URL; ?>" style="color: #8efc8c;">Go Home</a>
    </div>
</body>
</html>
