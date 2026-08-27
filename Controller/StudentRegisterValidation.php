<?php
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";
$fullname = "";
$email = "";
$password = "";
$confirm_password = "";
$php_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $confirm_password = trim($_POST["confirm_password"] ?? "");

    if (empty($fullname) || strlen($fullname) < 5) {
        $php_error = "Full name must be at least 5 characters<br>";
    }
    if (empty($email) || !str_contains($email, "@")) {
        $php_error = "Email must be valid and contain '@'<br>";
    }
    if (empty($password) || strlen($password) < 5) {
        $php_error = "Password must be at least 5 characters<br>";
    }
    if (empty($confirm_password) || $confirm_password != $password) {
        $php_error = "Passwords do not match<br>";
    }

    if (empty($php_error)) 
    {

        $database = new db();
        $connection = $database->connection();
        $result = $database->register($connection, $fullname, $email, $password, "Student");

        if ($result) {
            header("Location: login.php");
            exit();
        } else {
            $php_error = "Please try again";
        }
    }
}
?>