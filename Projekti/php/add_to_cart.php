
<?php
// Check if the form is submitted
if(isset($_POST['save'])) {
    // Get the product name from the form
    $productName = $_POST['productName'];

    // Check if the input is not empty
    if (!empty($productName)) {
        // Initialize or load the array of product names from session
        session_start();
        $productNames = isset($_SESSION['productNames']) ? $_SESSION['productNames'] : array();
        
        // Add the product name to the array
        $productNames[] = $productName;

        // Save the updated array back to session
        $_SESSION['productNames'] = $productNames;
        
        // Optionally, you can display a message or update UI here
        echo "Product name added: $productName";
    } else {
        echo "Please enter a valid product name.";
    }
}
?>