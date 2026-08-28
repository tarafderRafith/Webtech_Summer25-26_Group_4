<?php
session_start();
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";
$email = "";
$password = "";
$remember = false;
$php_error = "";

if (isset($_COOKIE["remember_admin"])) 
{
    $email = $_COOKIE["remember_admin"];
    $remember = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");
    $remember = isset($_POST["remember"]) && $_POST["remember"] == "1";

    if (empty($email) || !str_contains($email, "@")) {
        $php_error = "Email must be valid and contain '@'<br>";
    }
    if (empty($password) || strlen($password) < 5) {
        $php_error = "Password must be at least 5 characters<br>";
    }

    if (empty($php_error)) 
    {
        $database = new db();
        $connection = $database->connection();
        $result = $database->login($connection, $email);

        if ($result && $result->num_rows > 0) 
        {
            $user = $result->fetch_assoc();

            if ($password == $user["password"] && $user["role"] == "Admin") 
            {
                $_SESSION["logged_in"] = true;
                $_SESSION["email"] = $email;
                $_SESSION["role"] = "Admin";

                if ($remember) 
                {
                    setcookie("remember_admin", $email, time()+86400*30, "/");
                } else {
                    setcookie("remember_admin", "", time()-3600, "/");
                }

                $jsonfile = "../../../Model/user.json";
                $users = [];
                if (file_exists($jsonfile)) {
                    $jsonData = file_get_contents($jsonfile);
                    $users = json_decode($jsonData, true) ?? [];
                }
                $users[] = [
                    "email" => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    "role" => "Admin",
                    "timestamp" => time()
                ];
                file_put_contents($jsonfile, json_encode($users, JSON_PRETTY_PRINT));

                header("Location: dashboard.php");
                exit();
            } else {
                $php_error = "Invalid email or password<br>";
            }
        } else {
            $php_error = "Invalid email or password<br>";
        }
    }
}
?>