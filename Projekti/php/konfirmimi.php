<?php
session_start();
error_reporting(E_ALL);

// Kontrollo nëse ka të dhëna të regjistrimit në sesion
if (isset($_SESSION['emri']) && isset($_SESSION['mbiemri']) && isset($_SESSION['email']) && isset($_SESSION['telefoni'])) {
    $emri = preg_replace('/e/', 'ë', $_SESSION['emri']);
    $mbiemri = preg_replace('/e/', 'ë', $_SESSION['mbiemri']);
    $email = $_SESSION['email'];
    $telefoni = $_SESSION['telefoni'];
    $telefoni_formatuar = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $telefoni);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regjistrimi u Krye me Sukses</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/konfirmimi.css">
</head>
<body>
<div class="container"> <!-- Shtoni një kontejner që përmban të gjitha elementet -->
    <h2>Regjistrimi është kryer me sukses!</h2><br>
    <p>Emri: <?= $emri ?></p>
    <p>Mbiemri: <?= $mbiemri ?></p>
    <p>Email: <?= $email ?></p>
    <p>Numri i telefonit: <?= $telefoni_formatuar ?></p>
    <a href="home.php" class="button">Vazhdoni në faqen kryesore</a>
</div>
</body>
</html>
<?php
    session_unset();
    session_destroy();
} else {
    echo "<p>Të dhënat e regjistrimit nuk janë gjetur. Ju lutem kryeni regjistrimin.</p>";
}
?>