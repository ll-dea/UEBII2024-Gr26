<?php
session_start();

$errors = [];

// Inicializimi i variablave
$fullName = $email = $phone = $birthdate = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Submit"]) && $_POST["Submit"] === "Sign Up") {
    $fullName = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $rpassword = $_POST["rpassword"];
    $phone = trim($_POST["phone"]);
    $birthdate = trim($_POST["birthdate"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Validimi i fushave të hyrjes
    if (empty($fullName)) {
        $errors['error_fullname'] = "Please fill in the Full Name field.";
    } elseif (!preg_match("/^[A-Za-z-' ]*$/", $fullName)) {
        $errors['error_fullname'] = "Full Name can only contain letters, dashes, and spaces.";
    }

    if (empty($email)) {
        $errors['error_email'] = "Please fill in the Email field.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['error_email'] = "Email is not valid.";
    }

    if (empty($phone)) {
        $errors['error_phone'] = "Please fill in the Phone Number field.";
    } elseif (!preg_match('/^\+?\d{10,15}$/', $phone)) {
        $errors['error_phone'] = "Phone number is not valid.";
    }

    if (empty($birthdate)) {
        $errors['error_birthdate'] = "Please fill in the Birthdate field.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
        $errors['error_birthdate'] = "Birthdate is not valid. Use the format YYYY-MM-DD.";
    }

    if (empty($password)) {
        $errors['error_password'] = "Please fill in the Password field.";
    } elseif (strlen($password) < 8) {
        $errors['error_password'] = "Password must be at least 8 characters.";
    } elseif (!preg_match('/^.*(?=.{8,})(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/', $password)) {
        $errors['error_password'] = "Password must contain at least one special character.";
    }

    if ($password !== $rpassword) {
        $errors['error_rpassword'] = "Passwords do not match.";
    }

    // Nëse nuk ka gabime, shto përdoruesin në bazën e të dhënave
    if (count($errors) === 0) {
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
            $sql = "INSERT INTO users (full_name, email, phone, birthdate, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sssss", $fullName, $email, $phone, $birthdate, $password_hash);
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garden Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/Login.css">
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
        .error {
            color: red;
            font-size: 0.9em;
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="signupForm">
            <div class="form-group">
                <input type="text" class="form-control" id="fullname" name="fullname" required placeholder="Full Name" value="<?php echo htmlspecialchars($fullName); ?>">
                <?php if (isset($errors['error_fullname'])) echo '<div class="error">' . $errors['error_fullname'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" required placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
                <?php if (isset($errors['error_email'])) echo '<div class="error">' . $errors['error_email'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Phone Number" value="<?php echo htmlspecialchars($phone); ?>">
                <?php if (isset($errors['error_phone'])) echo '<div class="error">' . $errors['error_phone'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <input type="date" class="form-control" id="birthdate" name="birthdate" required placeholder="Birthdate" value="<?php echo htmlspecialchars($birthdate); ?>">
                <?php if (isset($errors['error_birthdate'])) echo '<div class="error">' . $errors['error_birthdate'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                <?php if (isset($errors['error_password'])) echo '<div class="error">' . $errors['error_password'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="rpassword" name="rpassword" required placeholder="Repeat Password">
                <?php if (isset($errors['error_rpassword'])) echo '<div class="error">' . $errors['error_rpassword'] . '</div>'; ?>
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
