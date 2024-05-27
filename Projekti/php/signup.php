

<!-- session_start();

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
} -->



   


   <?php
     session_start();
    if(isset($_SESSION["users"])){
    header("Location: ../index.php");
    }
    

$errors = [];

if(isset($_POST["Submit"])){
    $fullName =($_POST["fullname"]);
    $email =($_POST["email"]);
    $password =($_POST["password"]);
    $rpassword =($_POST["rpassword"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $errors = array();

        if(empty($fullName) or empty($email) or empty($password) OR empty($rpassword) ){
            array_push($errors, "Please fill out all the blank spaces!");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($errors, "Email is not valid");
        }         
        if(strlen($password)<8){
            array_push($errors,"Password must be at least 8 characters long");

        }
        if($password !== $rpassword){
            array_push($errors, "The passwords do not match");
        }
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn , $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0){
            array_push($errors,"Email already exist!");
        }

        if(count($errors)>0){
            foreach($errors as $error){
                echo "<div class = 'alert alert-danger'>$error</div>";
            }
        } else{
            // Funksioni për insertimin e përdoruesit
            $sql = "INSERT INTO users (full_name, email, password) VALUES (?,?,?)";
           $stmt =  mysqli_stmt_init($conn);
           $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
           if($prepareStmt){
            mysqli_Stmt_bind_param($stmt,"sss",$fullName,$email,$password_hash);
            mysqli_stmt_execute($stmt);
            echo "<div class = 'alert alert-success'>You are registered successfully</div>";

           }
           else{
            die("Something went wrong");
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
  <br><br><br><br><br><br>
        <div class="container">
        <form action="signup.php" method="post" id="signupForm" >
            <div class="form-group">
                <input  type="text" class="form-control" id="fullname" name="fullname" required placeholder="Full Name">
            </div>
            <div class="form-group">
                <input  type="email" class="form-control" id="email" name="email" required placeholder="Email">
            </div>
            <div class="form-group">
                <input  type="password" class="form-control" id="password" name="password" required placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="rpassword" name="rpassword" required placeholder="Repeat Password">
            </div>
            <button type="submit" name="Submit"  class="btn form-control " style="background-color: #ff7f49;color:white">Sign Up</button>
            <br>
            <a href="../index.php">Do you have an account? Login in!</a>
        </form>
    </div>

    <footer style="background-color: ff7f49;">
        &copy; 2024 Signup Form. All rights reserved.
    </footer>

</body>
</html>