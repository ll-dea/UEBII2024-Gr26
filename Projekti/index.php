
<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location: ./php/home.php");
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
 <link rel="stylesheet" href="./CSS/Login.css">
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
  
      <a href="./HTML/About.html">About Us</a>

    </nav>
  </header>
<br><br><br><br><br><br>


  <div class="container" >
  <?php
        if(isset($_POST['login'])){
          $email =($_POST['email']);
          $password =( $_POST['password']);
            require_once "./php/database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
               if( password_verify($password,$user["password"])){
                session_start();
                $_SESSION["user"] = "yes";
                header("Location: ./php/home.php");
                die();
               }else{
                echo "<div class ='alert alert-danger'>Password does not match!</div>";
            }
            }else{
                echo "<div class ='alert alert-danger'>Email does not exist!</div>";
            }
        }
        ?>
    <form action="index.php" method="POST"  >
        <div class="form-group" >
            <input type="text" id="email" name="email" placeholder="Email" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" required placeholder="Password">
        </div>

        <input type="submit" value="Login" name="login" class="form-control" class="btn">
       
        <a href="./php/signup.php" style="font-size: small;">Don't have an account? Sign Up!</a>
    </form>
</div>



  <footer>
    &copy; 2024 Login Page. All rights reserved.
  </footer>

</body>
</html>