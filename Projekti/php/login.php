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

    <title>Garden Shop</title>
</head>

<body>
    <?php
    $name = $_POST["emri"];
    ?>
    <div class="row" style="padding-top: 150px;">

        <center>
            <div id="square" class="row div1">

                <h class="display-3">Hello <?php echo $name; ?></h>
                
                <h class="display-6">You have sucessfully logged in.</h>
                <br><br><br>
                <a href="../HTML/index.html"><button type="button" class="btn btn-light btn-lg buton1">Go Home</button></a>
            </div>
        </center>
    </div>
</body>

</html>