<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kontrollo nëse ka emrin e përdoruesit të dorëzuar
    if (isset($_POST['emri'])) {
        $emri = $_POST['emri'];
        
        
        
        // Kontrolloni nëse emri përmban vetëm shkronja dhe hapësira
        if (preg_match("/^[A-Z-' ]*$/", $emri)) {

        } else {
            echo "Emri i përdoruesit mund të përmbajë vetëm shkronja të mëdha, viza dhe hapësira.";
        }
    }

    // Kontrollo nëse ka mbiemrin e përdoruesit të dorëzuar
    if (isset($_POST['mbiemri'])) {
        $mbiemri = $_POST['mbiemri'];

        if (preg_match('/^[a-zA-Z\s]+$/', $mbiemri)) {
            // Në rregull, mbiemri përmban vetëm shkronja dhe hapsira
            // Mund të vazhdojmë me procesin e regjistrimit
        } else {
            // Mesazh për gabim nëse mbiemri nuk përmban vetëm shkronja dhe hapsira
            echo "Mbiemri duhet të përmbajë vetëm shkronja dhe hapesira.";
        }
    }

    // Kontrollo nëse ka emailin e përdoruesit të dorëzuar
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        if (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $email)) {
            // Adresa e email-it është e vlefshme
            // Mund të vazhdoni me procesin e regjistrimit
        } else {
            // Mesazh për gabim në rast se adresa e emailit nuk është në formatin e duhur
            echo "Adresa e emailit nuk është e vlefshme.";
        }
    }

    // Kontrollo nëse ka numrin e telefonit të përdoruesit të dorëzuar
    if (isset($_POST['telefoni'])) {
        $telefoni = $_POST['telefoni'];

        if (preg_match('/^[0-9]{9,15}$/', $telefoni)) {
            $_SESSION['emri'] = $emri;
            $_SESSION['mbiemri'] = $mbiemri;
            $_SESSION['email'] = $email;
            $_SESSION['telefoni'] = $telefoni;
            
            header('Location: konfirmimi.php');
        exit();
        } else {
            // Mesazh për gabim në rast se numri i telefonit nuk është i vlefshëm
            echo "Numri i telefonit duhet të përmbajë vetëm shifra dhe të jetë në mes 9 dhe 15 karaktere në gjatësi.";
        }
    }
}
?>