<?php
$profile_error = "";
$password_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST["update_profile"])) {
        $fullname = trim($_POST["fullname"] ?? "");
        $email = trim($_POST["email"] ?? "");

        if (empty($fullname) || strlen($fullname) < 5) 
        {
            $profile_error .= "Full name must be at least 5 characters<br>";
        }
        if (empty($email) || !str_contains($email, "@"))
        {
            $profile_error .= "Email must be valid and contain '@'<br>";
        }
    }

    if (isset($_POST["change_password"])) {
        $current_password = trim($_POST["current_password"] ?? "");
        $new_password = trim($_POST["new_password"] ?? "");
        $confirm_new_password = trim($_POST["confirm_new_password"] ?? "");

        if (empty($current_password)) {
            $password_error .= "Current password cannot be empty<br>";
        }
        if (empty($new_password) || strlen($new_password) < 5) 
        {
            $password_error .= "New password must be at least 5 characters<br>";
        }
        if (empty($confirm_new_password) || $confirm_new_password != $new_password) 
        {
            $password_error .= "New Password and Confirm Password do not match<br>";
        }
    }
}
?>