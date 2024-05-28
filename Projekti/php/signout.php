<?php
session_start();

function unsetSessionVar(&$varName) {
    // Referencimi i variablave globale -- kerkese
    $var2 = &$_SESSION;

    // Perdorimi i funksionit unset -- kerkese
    unset($var2[$varName]);
}

$var1 = 'user';
unsetSessionVar($var1);

header("Location: ../index.php");
exit;
?>



