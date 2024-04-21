<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/loginphp.css">
    <style>
        body {
            font-family: 'Truculenta', sans-serif; 
            background-color: #f8f9fa;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            padding: 0; 
        }
        .container {
            background-color: #ffffff; 
            border-radius: 10px; 
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); 
            padding: 20px;
            text-align: center; 
        }
        h1 {
            color: #ff7f49; /* Set heading color */
            margin-bottom: 20px; /* Add space below heading */
        }
        p {
            color: #6c757d; /* Set paragraph color */
        }
    </style>
    <title>Garden Shop</title>
</head>
<?php
define('BASE_URL', 'home.php');
?>
  

        <?php
      
        session_start();

      
        if(isset($_COOKIE['visit_count'])) {
            $visit_count = $_COOKIE['visit_count'] + 1; 
            setcookie('visit_count', $visit_count, time() + (86400 * 30), "/"); 
        } else {
            $visit_count = 1;
            setcookie('visit_count', $visit_count, time() + (86400 * 30), "/"); 
        }

        // Use session to store the visit count value
        $_SESSION['visit_count'] = $visit_count;
        ?>
<body  style="<?php if($visit_count % 2 == 0) { echo 'background-color: #ff7f49;'; } else { echo 'background-color:#ffb617 ;'; } ?>">
    <div class="container">
      
        
        <h1>Welcome to our website!</h1>
        <p>This is your visit number <?php echo $_SESSION['visit_count']; ?>.</p>
        <a href="<?php echo BASE_URL; ?>" style="color: #ff7f49;">Go Home</a>
    </div>
</body>
</html>
