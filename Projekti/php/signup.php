<?php
session_start();
if(isset($_SESSION["users"])){
    header("Location: ../index.php");
    exit();
}

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../CSS/login.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
</head>
<body>
<body class="truculenta">
<header class="sticky-header" style="background-color: ff7f49;">
    <h1 style="padding-right: 5px;" >Gardening Shop</h1>
    <nav style="padding-right: 5px;">
     
      
      <a href="../HTML/About.html">About Us</a>

     

    </nav>
  </header>
    <div class="container">
        <?php 
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div class='error error-danger'>$error</div>";
            }
        }

        if (isset($success)) {
            echo "<div class='error error-success'>$success</div>";
        }
        ?>
        <form method="post" action="">
            <div class="form-group">
                <input type="text" placeholder="Enter Full Name" name="fullname" class="form-control" value="<?php echo htmlspecialchars($fullName); ?>" required>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Enter Email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <input type="tel" placeholder="Enter Phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
            </div>
            <div class="form-group">
                <input type="date" placeholder="Enter Birthdate" name="birthdate" class="form-control" value="<?php echo htmlspecialchars($birthdate); ?>" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Repeat Password" name="rpassword" class="form-control" required>
            </div>
            <div class="form-btn">
                <input type="submit" name="Submit" value="Sign Up" class="btn btn-primary">
            </div>
            
            <a href="../index.php">Do you have an account? Login in!</a>
        </form>
    </div>
    <footer style="background-color: ff7f49;">
        &copy; 2024 Signup Form. All rights reserved.
    </footer>
</body>
</html>