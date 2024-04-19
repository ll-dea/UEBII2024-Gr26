<?php
session_start();

$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = trim($_POST['emri'] ?? '');
    $mbiemri = trim($_POST['mbiemri'] ?? '');
    $email = $_POST['email'] ?? '';
    $telefoni = $_POST['telefoni'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($emri)) {
        $errors['error_emri'] = "Ju lutemi shkruani emrin.";
    } elseif (!preg_match("/^[A-Za-z-' ]*$/", $emri)) {
        $errors['error_emri'] = "Emri i përdoruesit mund të përmbajë vetëm shkronja, viza, dhe hapësira.";
    }

    if (empty($mbiemri)) {
        $errors['error_mbiemri'] = "Ju lutemi shkruani mbiemrin.";
    } elseif (!preg_match('/^[A-Za-z\s]+$/', $mbiemri)) {
        $errors['error_mbiemri'] = "Mbiemri duhet të përmbajë vetëm shkronja dhe hapsira.";
    }

    if (empty($email)) {
        $errors['error_email'] = "Ju lutemi vendosni adresën e emailit.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['error_email'] = "Adresa e emailit nuk është e vlefshme.";
    }

    if (empty($password)) {
        $errors['error_password'] = "Ju lutemi vendosni fjalëkalimin.";
    } elseif (!preg_match('/^.*(?=.{8,})(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/', $password)) {
        $errors['error_password'] = "Fjalëkalimi duhet të jetë të paktën 8 karaktere dhe të përmbajë së paku një karakter special.";
    }

    if (empty($errors)) {
        $_SESSION['emri'] = $emri;
        $_SESSION['mbiemri'] = $mbiemri;
        $_SESSION['email'] = $email;
        $_SESSION['telefoni'] = $telefoni;
        $_SESSION['password'] = $password; // Consider hashing the password before storing it for security reasons

        session_write_close();
        header('Location: konfirmimi.php');
        exit();
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
 <link rel="stylesheet" href="../CSS/signup.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">


    
</head>
<body>
<body class="truculenta">
<header class="sticky-header" style="background-color: ff7f49;">
    <h1 style="padding-right: 5px;" >Gardening Shop</h1>
    <nav style="padding-right: 5px;">
      <a href="index.html">Home</a>
      <a href="Login.html">Login</a>
      <a href="About.html">About</a>
     

    </nav>
  </header>
  <br><br><br><br><br><br>
<div class="row">
  <div class="col-4"></div>

    <div class="container">
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="signupForm">
            <div class="form-group">
                <label for="emri">Name:</label>
                <input type="text" class="form-control" id="emri" name="emri" required placeholder="Shkruaj emrin tënd këtu">
                <?php if (isset($errors['error_emri'])) echo '<div class="error">' . $errors['error_emri'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <label for="mbiemri">Surname:</label>
                <input type="text" class="form-control" id="mbiemri" name="mbiemri" required  placeholder="Shkruaj mbiemrin tënd këtu">
                <?php if (isset($errors['error_mbiemri'])) echo '<div class="error">' . $errors['error_mbiemri'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="example@example.com">
                <?php if (isset($errors['error_email'])) echo '<div class="error">' . $errors['error_email'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <label for="telefoni">Phone Number:</label>
                <input type="tel" class="form-control" id="telefoni" name="telefoni" pattern="[0-9]{9,15}" required placeholder="04xxxxxxx">
                <?php if (isset($errors['error_telefoni'])) echo '<div class="error">' . $errors['error_telefoni'] . '</div>'; ?>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Shkruaj një fjalëkalim të sigurt">
                <?php if (isset($errors['error_password'])) echo '<div class="error">' . $errors['error_password'] . '</div>'; ?>
            </div>
            <button type="submit" name="signup"  class="btn btn-primary">Register</button>
        </form>
    </div>

    <footer style="background-color: ff7f49;">
        &copy; 2024 Signup Form. All rights reserved.
    </footer>

</body>
</html>