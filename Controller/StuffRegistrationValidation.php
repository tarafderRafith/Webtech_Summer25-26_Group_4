<?php

session_start();

$fullname = "";
$email = "";
$password = "";
$confirm_password = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirm_password = trim($_POST["confirm_password"] ?? "");

    if(empty($fullname))
    {
        $message = "Full Name is required.";
    }
    elseif(empty($email))
    {
        $message = "Email is required.";
    }
    elseif(empty($password))
    {
        $message = "Password is required.";
    }
    elseif(empty($confirm_password))
    {
        $message = "Confirm Password is required.";
    }
    elseif($password != $confirm_password)
    {
        $message = "Password does not match.";
    }
    else
    {
        $_SESSION["stuff_name"] = $fullname;
        $_SESSION["stuff_email"] = $email;
        $_SESSION["stuff_password"] = $password;

        $message = "Registration Successful!";
    }
}

?>