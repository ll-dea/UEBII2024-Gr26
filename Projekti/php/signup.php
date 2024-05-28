<?php
session_start();

if (isset($_SESSION["users"])) {
    header("Location: ../index.php");
    exit();
}

$errors = [];

if (isset($_POST["Submit"])) {
    $fullName = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if (empty($fullName) || empty($email) || empty($password) || empty($rpassword)) {
        $errors[] = "Please fill out all the blank spaces!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    if ($password !== $rpassword) {
        $errors[] = "The passwords do not match";
    }

    require_once "database.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);

        if ($rowCount > 0) {
            $errors[] = "Email already exists!";
        }

        mysqli_stmt_close($stmt);
    } else {
        $errors[] = "Database error: Failed to prepare statement. " . mysqli_error($conn);
    }

    if (empty($errors)) {
        $sql = "INSERT INTO users (emri, email, password) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $password_hash);
            if (mysqli_stmt_execute($stmt)) {
                $success = "You are registered successfully";
            } else {
                $errors[] = "Database error: Failed to execute statement. " . mysqli_stmt_error($stmt);
            }
            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Database error: Failed to prepare statement. " . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            padding-top: 100px; /* Adjust this value as needed */
        }
        .sticky-header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
    </style>
</head>
<body class="truculenta">
    <header class="sticky-header" style="background-color: #ff7f49;">
        <h1 style="padding-right: 5px;">Gardening Shop</h1>
        <nav style="padding-right: 5px;">
            <a href="../HTML/About.html">About Us</a>
        </nav>
    </header>
    <div class="container">
        <?php if (!empty($errors)): ?>
            <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        <?php elseif (isset($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form action="signup.php" method="post" id="signupForm">
            <div class="form-group">
                <input type="text" class="form-control" id="fullname" name="fullname" required placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="rpassword" name="rpassword" required placeholder="Repeat Password">
            </div>
            <button type="submit" name="Submit" class="btn form-control" style="background-color: #ff7f49; color: white;">Sign Up</button>
            <br>
            <a href="../index.php">Do you have an account? Log in!</a>
        </form>
    </div>
    <footer style="background-color: #ff7f49;">
        &copy; 2024 Signup Form. All rights reserved.
    </footer>
</body>
</html>
