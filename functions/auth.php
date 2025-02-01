<?php 
include('../db/db.php'); 
session_start();

if (isset($_POST['register'])) {
    $name     = $_POST['name'];
    $phone    = $_POST['phone'];
    $password = $_POST['password'];
    $aadhaar  = $_POST['aadhaar'];

    // Check if phone number already exists
    $checkQuery = "SELECT * FROM users WHERE phone = '$phone'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Phone number already exists! Please use a different number.";
        exit;
    }

    // Insert new user
    $sql = "INSERT INTO users (username, phone, password, aadhaar) VALUES ('$name', '$phone', '$password', '$aadhaar')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['phone'] = $phone;
        $_SESSION['password'] = $password; 

        header("Location: ../dasboard.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if (isset($_POST['login'])) {
    $phone    = $_POST['phone'];
    $password = $_POST['password'];

    // Validate user
    $sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Start session and store user details
        $_SESSION['phone'] = $phone;

        header("Location: ../dasboard.php");
        exit;
    } else {
        echo "Invalid phone number or password!";
        exit;
    }
}
?>
