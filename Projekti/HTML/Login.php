<?php 
session_start(); // Fillon ose vazhdon një sesion

$email = $password = "";
$errors = []; // Inicializimi i array-it për gabime

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validimi i Email-it
    if (empty(trim($_POST["email"]))) {
        $errors['error_email'] = "Ju lutem vendosni një email.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['error_email'] = "Formati i email-it nuk është i vlefshëm.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validimi i Fjalëkalimit
    if (empty(trim($_POST["password"]))) {
        $errors['error_password'] = "Ju lutem vendosni një fjalëkalim.";
    } else {
      $password = trim($_POST["password"]);
      if (strlen($password) < 8 || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
          $errors['error_password'] = "Fjalëkalimi duhet të ketë të paktën 8 karaktere dhe të përmbajë të paktën një karakter special.";
      }
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
 <link rel="stylesheet" href="../CSS/Login.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
<style>
    .error1 {
      color: #D8000C;
      background-color: #FFD2D2;
      padding: 10px 20px;
      margin: 20px 0;
      border: 1px solid #D8000C;
      border-radius: 5px;
      font-family: Arial, sans-serif;
      text-align: center;
    }
  </style>

</head>
<body class="truculenta">

  <header class="sticky-header">
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

  <div class="container col-4">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="example@example.com" required>
            <?php if (isset($errors['error_email'])) echo '<div class="error1">' . $errors['error_email'] . '</div>'; ?>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Shkruaj një fjalëkalim të sigurt">
            <?php if (isset($errors['error_password'])) echo '<div class="error1">' . $errors['error_password'] . '</div>'; ?>
        </div>

        <input type="submit" value="Login">
        <a href="../php/signup.php" style="font-size: small;">Don't have an account? Sign Up!</a>
    </form>
</div>

  <div class="col-4"></div>
</div>

  <footer>
    &copy; 2024 Login Page. All rights reserved.
  </footer>

</body>
</html>