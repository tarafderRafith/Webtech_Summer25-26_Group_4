<?php

$fullname = "";
$email = "";
$password = "";
$confirm_password = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirm_password = trim($_POST["confirm_password"] ?? "");

    if (empty($fullname)) {
        $message = "Full Name is required.";
    }
    elseif (strlen($fullname) < 3) {
        $message = "Full Name must be at least 3 characters.";
    }
    elseif (empty($email)) {
        $message = "Email is required.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Please enter a valid email address.";
    }
    elseif (empty($password)) {
        $message = "Password is required.";
    }
    elseif (strlen($password) < 6) {
        $message = "Password must be at least 6 characters.";
    }
    elseif (empty($confirm_password)) {
        $message = "Please confirm your password.";
    }
    elseif ($password != $confirm_password) {
        $message = "Passwords do not match.";
    }
    else {
        $message = "Registration Successful!";

        // Later we will insert the student information into the database.
    }
}

?>