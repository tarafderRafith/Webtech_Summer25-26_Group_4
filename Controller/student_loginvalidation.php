<?php

$email = "";
$password = "";
$message = "";
$remember = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (isset($_POST["remember"])) {
        $remember = true;
    }

    if (empty($email)) {
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
    else {

       

        if ($email == "student@gmail.com" && $password == "123456") {

            if ($remember) {
                setcookie("student_email", $email, time() + (60 * 60 * 24 * 7), "/");
            }

            header("Location: dashboard.php");
            exit();
        }
        else {
            $message = "Invalid email or password.";
        }
    }
}

if (isset($_COOKIE["student_email"])) {
    $email = $_COOKIE["student_email"];
    $remember = true;
}

?>