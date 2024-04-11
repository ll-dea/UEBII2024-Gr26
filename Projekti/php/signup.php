<?php
session_start();

// Ruan mesazhet e gabimeve nëse ndodhin
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kontrollo nëse ka emrin e përdoruesit të dorëzuar
    if (isset($_POST['emri'])) {
        $emri = $_POST['emri'];
        $emri = preg_replace('/ë/', 'e', $emri);
        
        // Kontrolloni nëse emri përmban vetëm shkronja dhe hapësira
        if (!preg_match("/^[A-Za-z-' ]*$/", $emri)) {
            $errors['error_emri'] = "Emri i përdoruesit mund të përmbajë vetëm shkronja, viza, dhe hapësira.";
        }
    }

    // Kontrollo nëse ka mbiemrin e përdoruesit të dorëzuar
    if (isset($_POST['mbiemri'])) {
        $mbiemri = $_POST['mbiemri'];
        $mbiemri = preg_replace('/ë/', 'e', $mbiemri);
        if (!preg_match('/^[A-Za-z\s]+$/', $mbiemri)) {
            $errors['error_mbiemri'] = "Mbiemri duhet të përmbajë vetëm shkronja dhe hapsira.";
        }
    }

    // Kontrollo nëse ka emailin ose numrin e telefonit të përdoruesit të dorëzuar
    if (isset($_POST['contactType'])) {
        $contactType = $_POST['contactType'];

        if ($contactType === 'email') {
            if (isset($_POST['email'])) {
                $email = $_POST['email'];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['error_email'] = "Adresa e emailit nuk është e vlefshme.";
                }
            }
        } elseif ($contactType === 'phone') {
            if (isset($_POST['telefoni'])) {
                $telefoni = $_POST['telefoni'];

                if (!preg_match('/^[0-9]{9,15}$/', $telefoni)) {
                    $errors['error_telefoni'] = "Numri i telefonit duhet të përmbajë vetëm shifra dhe të jetë në mes 9 dhe 15 karaktere në gjatësi.";
                }
            }
        }
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];

        // Kontrolloni se fjalëkalimi ka të paktën një shkronjë të madhe, një shkronjë të vogël dhe një numër
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            $errors['error_password'] = "Fjalëkalimi duhet të përmbajë të paktën një shkronjë të madhe, një shkronjë të vogël dhe një numër, dhe të jetë më i gjatë se 8 karaktere.";
        }
    }

    // Nëse nuk ka asnjë gabim, ruaj të dhënat dhe kthehu në faqen e konfirmimit
    if (empty($errors)) {
        $_SESSION['emri'] = $_POST['emri'];
        $_SESSION['mbiemri'] = $_POST['mbiemri'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['telefoni'] = $_POST['telefoni'];

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
    <title>Signup Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Truculenta:opsz,wght@12..72,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../CSS/signup.css">
    <style>
        body {
            background-image: url(./foto/Photo19.jpg);
            font-family: 'Truculenta', sans-serif;
            /* Use the custom font */
            margin: 0;
            /* Remove default margin */
            padding: 0;
            /* Remove default padding */
        }

        header {
            background-color: #8efc8c;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            /* Ensure header is on top */
        }

        header a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        header a:hover {
            text-decoration: underline;
            color: white;
        }

        .container {
            max-width: 400px;
            margin: 150px auto 20px;
            /* Adjust margin-top to move form below header */
            padding: 0 20px;
        }

        footer {
            background-color: #8efc8c;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-top: 20px;
            /* Adjust margin-top to match the margin-bottom of the form */
        }
    </style>
</head>

<body>

    <header>
        <h1 style="padding-right: 5px;">Gardening Shop</h1>
        <nav style="padding-right: 5px;">
            <a href="home.php">Home</a>
            <a href="Login.html">Login</a>
            <a href="about.php">About</a>
        </nav>
    </header>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="signupForm">
            <div class="mb-3">
                <label for="emri" class="form-label">Name:</label>
                <input type="text" class="form-control" id="emri" name="emri" placeholder="John" required>
            </div>
            <div class="mb-3">
                <label for="mbiemri" class="form-label">Surname:</label>
                <input type="text" class="form-control" id="mbiemri" name="mbiemri" placeholder="Doe" required>
            </div>
            <div class="mb-3">
                <label for="contactType" class="form-label">Choose contact form:</label>
                <select class="form-select" id="contactType" name="contactType" required>
                    <option value="" disabled selected></option>
                    <option value="email">Email</option>
                    <option value="phone">Phone Number</option>
                </select>
            </div>
            <div class="mb-3" id="emailField" style="display: none;">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="john.doe@example.com">
            </div>
            <div class="mb-3" id="phoneField" style="display: none;">
                <label for="telefoni" class="form-label">Phone Number:</label>
                <input type="tel" class="form-control" id="telefoni" name="telefoni" pattern="[0-9]{9,15}"
                    placeholder="1234567890">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Shkruani fjalëkalimin tuaj" required>
            </div>
            <input type="submit" value="Sign Up">
            <a href="Login.html" style="font-size:small;">Do you have an account? Click here!</a>
        </form>
    </div>
    <br><br><br><br><br>
    <footer>
        &copy; 2024 Signup Form. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var contactTypeField = document.getElementById('contactType');
            var emailField = document.getElementById('emailField');
            var phoneField = document.getElementById('phoneField');

            contactTypeField.addEventListener('change', function () {
                if (contactTypeField.value === 'email') {
                    emailField.style.display = 'block';
                    phoneField.style.display = 'none';
                } else if (contactTypeField.value === 'phone') {
                    emailField.style.display = 'none';
                    phoneField.style.display = 'block';
                }
            });
        });
    </script>

</body>

</html>