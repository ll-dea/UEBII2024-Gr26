<?php
session_start();
error_reporting(E_ALL);
// Kontrollo nëse ka të dhëna të regjistrimit në sesion
if (isset($_SESSION['emri']) && isset($_SESSION['mbiemri']) && isset($_SESSION['email']) && isset($_SESSION['telefoni']) && isset($_SESSION['contactType'])) {
    // Merrni të dhënat nga sesioni
    $emri = preg_replace('/ë/', 'e', $_SESSION['emri']);
    $mbiemri = preg_replace('/ë/', 'e', $_SESSION['mbiemri']);
    $contactType = $_SESSION['contactType'];

    if ($contactType === 'email') {
        $email = $_SESSION['email'];
        echo "<p>Email: $email</p>";
    } elseif ($contactType === 'phone') {
        $telefoni = $_SESSION['telefoni'];
        $telefoni_formatuar = preg_replace('/(\d{3})(\d{3})(\d{4})/', '$1-$2-$3', $telefoni);
        echo "<p>Numri i telefonit: $telefoni_formatuar</p>";
    }

    // Shfaq një mesazh për regjistrimin e suksesshëm dhe të dhënat e përdoruesit
    echo "<h2>Regjistrimi është kryer me sukses!</h2>";
    echo "<p>Emri: $emri</p>";
    echo "<p>Mbiemri: $mbiemri</p>";

    // Pastro sesionin pasi t'ju tregohen të dhënat
    session_unset();
    session_destroy();
    header('Location: home.php');
    exit();
} else {
    // Nëse nuk ka të dhëna të regjistrimit në sesion, shfaq një mesazh për gabim
    echo "<p>Të dhënat e regjistrimit nuk janë gjetur. Ju lutem kryeni regjistrimin.</p>";
}
?>