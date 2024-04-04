<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kontrolloni nëse të gjitha fushat janë plotësuar
    if (!empty($_POST['emri']) && !empty($_POST['mbiemri']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        // Kontrolloni validitetin e email-it
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Email invalid";
        } else {
            // Kontrolloni validitetin e fjalëkalimit
            $password = $_POST['password'];
            if (strlen($password) < 8) {
                $error = "Fjalëkalimi duhet të jetë së paku 8 karaktere";
            } elseif (!preg_match("/[a-zA-Z]/", $password)) {
                $error = "Fjalëkalimi duhet të përmbajë të paktën një shkronjë të madhe ose të vogël";
            } elseif (!preg_match("/\d/", $password)) {
                $error = "Fjalëkalimi duhet të përmbajë të paktën një numër";
            } elseif (!preg_match("/[^a-zA-Z0-9]/", $password)) {
                $error = "Fjalëkalimi duhet të përmbajë të paktën një karakter të veçantë";
            } else {
                // Nëse të gjitha validimet përmbushen, mund të vazhdoni procesin e regjistrimit ose identifikimit
                // Këtu mund të bëni diçka të tillë si ruajtja e të dhënave në bazën e të dhënave ose identifikimi i përdoruesit
            }
        }
    } else {
        $error = "Ju lutemi plotësoni të gjitha fushat.";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../CSS/Login.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
</head>
<body style="background-image:url(./foto/Photo19.jpg);" class="truculenta">

  <header class="sticky-header">
    <h1 style="padding-right: 5px;" >Gardening Shop</h1>
    <nav style="padding-right: 5px;">
      <a href="home.php">Home</a>
      <a href="index.php">Login</a>
      <a href="about.php">About</a>

    </nav>
  </header>
<br><br><br><br><br><br>
<div class="row">
  <div class="col-4"></div>


  <div class="container col-4">
    <form action="../php/login.php" method="POST" onsubmit="return validateForm()">
      <label for="emri">Name:</label>
      <input type="text" id="emri" name="emri" placeholder="Joe" required>
      <label for="mbiemri">Mbiemri:</label>
      <input type="text" id="mbiemri" name="mbiemri" placeholder="Hill" required>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" placeholder="joehill@gmail.com" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <input type="submit" value="Login" name='submit'>
    </form>
  </div>
  <div class="col-4"></div>
</div>

  <footer>
    &copy; 2024 Login Page. All rights reserved.
  </footer>

</body>
</html>
