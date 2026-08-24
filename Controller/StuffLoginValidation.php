<?php

session_start();

$email = "";
$password = "";
$message = "";
$remember = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if(isset($_POST["remember"]))
    {
        $remember = true;
    }

    if(empty($email))
    {
        $message = "Email is required.";
    }
    elseif(empty($password))
    {
        $message = "Password is required.";
    }
    elseif(!isset($_SESSION["stuff_email"]))
    {
        $message = "Please register first.";
    }
    elseif($email != $_SESSION["stuff_email"])
    {
        $message = "Invalid email or password.";
    }
    elseif($password != $_SESSION["stuff_password"])
    {
        $message = "Invalid email or password.";
    }
    else
    {
        $_SESSION["stuff_logged_in"] = true;

        if($remember)
        {
            setcookie("stuff_email", $email, time() + 60*60*24*7, "/");
        }

        header("Location: dashboard.php");
        exit();
    }
}

?>