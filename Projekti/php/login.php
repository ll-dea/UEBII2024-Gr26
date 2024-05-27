<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="container">
        <?php 
        if(isset($_POST["login"])){
            $email=$_POST["email"];
            $password=$_POST["password"];
            require_once "database.php";
            $sql="SELECT * FROM users WHERE email='$email'";
            $result=mysqli_query($conn, $sqli);
            $user=mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if(password_verify($password, $user["password"])){
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }

            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>
</html>