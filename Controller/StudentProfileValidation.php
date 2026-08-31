<?php
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";
$profile_error = "";
$password_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["update_profile"])) {
        $fullname = trim($_POST["fullname"] ?? "");
        $email = trim($_POST["email"] ?? "");

        if (empty($fullname) || strlen($fullname) < 5) {
            $profile_error = "Full name must be at least 5 characters<br>";
        }
        if (empty($email) || !str_contains($email, "@")) {
            $profile_error = "Email must be valid and contain '@'<br>";
        }

        if (empty($profile_error)) {
            $database = new db();
            $connection = $database->connection();

            $check = $database->CheckUserExcludingSelf($connection, $email, $_SESSION["id"]);
            if ($check->num_rows > 0) {
                $profile_error = "Email is already taken by another account";
            } else {
                $database->update_profile($connection, $_SESSION["id"], $fullname, $email);
                $_SESSION["email"] = $email;
                header("Location: profile.php");
                exit();
            }
        }
    }

    if (isset($_POST["change_password"])) {
        $current_password = trim($_POST["current_password"] ?? "");
        $new_password = trim($_POST["new_password"] ?? "");
        $confirm_new_password = trim($_POST["confirm_new_password"] ?? "");

        if (empty($current_password)) {
            $password_error = "Current password cannot be empty<br>";
        }
        if (empty($new_password) || strlen($new_password) < 5) {
            $password_error = "New password must be at least 5 characters<br>";
        }
        if (empty($confirm_new_password) || $confirm_new_password != $new_password) {
            $password_error = "New Password and Confirm Password do not match<br>";
        }

        if (empty($password_error)) {
            $database = new db();
            $connection = $database->connection();
            $user = $database->get_user_by_id($connection, $_SESSION["id"]);

            if ($current_password != $user["password"]) {
                $password_error = "Current password is incorrect";
            } else {
                $database->update_password($connection, $_SESSION["id"], $new_password);
                header("Location: profile.php");
                exit();
            }
        }
    }
}
?>