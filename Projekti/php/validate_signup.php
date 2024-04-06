<?php
session_start(); // Fillon një sesion nëse nuk është filluar ende

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

          // Sigurohuni që të gjitha ndryshimet në sesion janë ruajtur
    session_write_close();

    include 'konfirmimi.php'; // Përfshini skedarin e konfirmimit
    exit(); // Dhe mbyllni skriptën pas përfundimit të pjesës së procesimit të regjistrimit
    }
}

// Përshkruani file-in e CSS
echo '<link rel="stylesheet" href="../CSS/signup.css">';

// Përshkruani kodin HTML për formën e regjistrimit
include 'signup.html';

// Shfaq mesazhet e gabimeve nëse kanë ndodhur
foreach ($errors as $error) {
    echo "<p class='text-danger'>$error</p>";
}
?>