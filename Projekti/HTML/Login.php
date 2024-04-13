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
    <form action="../php/login.php" method="POST" onsubmit="return validateForm()">
      <label for="emri">Name:</label>
      <input type="text" id="emri" name="emri" placeholder="Joe" required>
      <label for="mbiemri">Mbiemri:</label>
      <input type="text" id="mbiemri" name="mbiemri" placeholder="Hill" required>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" placeholder="joehill@gmail.com" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

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
<script>
  function validateForm() {
     var email = document.getElementById('email').value;

     // Email validation
     var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
     if (!emailRegex.test(email)) {
       alert('Please enter a valid email address.');
       return false;
     }

     // BUTTON ANIMATION
     function clickButton() {
       const Toast = Swal.mixin({
         toast: true,
         position: "top-end",
         showConfirmButton: false,
         timer: 3000,
         timerProgressBar: true,
         didOpen: (toast) => {
           toast.onmouseenter = Swal.stopTimer;
           toast.onmouseleave = Swal.resumeTimer;
         }
       });
       Toast.fire({
         icon: "success",
         title: "Email eshte Derguar!"
       });
     }

     clickButton();

     return true;
   }

</script>
</html>