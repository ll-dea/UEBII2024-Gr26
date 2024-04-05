<?php
session_start();

// Kontrollo nëse ka të dhëna të regjistrimit në sesion
if (isset($_SESSION['emri']) && isset($_SESSION['mbiemri']) && isset($_SESSION['email']) && isset($_SESSION['telefoni'])) {
    // Merrni të dhënat nga sesioni
    $emri = $_SESSION['emri'];
    $mbiemri = $_SESSION['mbiemri'];
    $email = $_SESSION['email'];
    $telefoni = $_SESSION['telefoni'];

    // Shfaqi një mesazh për regjistrimin e suksesshëm dhe të dhënat e përdoruesit
    echo "<h2>Regjistrimi është kryer me sukses!</h2>";
    echo "<p>Emri: $emri</p>";
    echo "<p>Mbiemri: $mbiemri</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Numri i telefonit: $telefoni</p>";

    // Pastro sesionin pasi t'ju tregohen të dhënat
    session_unset();
    session_destroy();
} else {
    // Nëse nuk ka të dhëna të regjistrimit në sesion, shfaq një mesazh për gabim
    echo "<p>Të dhënat e regjistrimit nuk janë gjetur. Ju lutem kryeni regjistrimin.</p>";
}
?>