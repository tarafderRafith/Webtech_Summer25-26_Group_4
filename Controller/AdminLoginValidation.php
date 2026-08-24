<?php
$email = "";
$password = "";
$php_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($email) || !str_contains($email, "@")) 
    {
        $php_error .= "Email must be valid and contain '@'<br>";
    }
    if (empty($password) || strlen($password)<5) 
    {
        $php_error .= "Password must be at least 5 characters<br>";
    }
}
?>