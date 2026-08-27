<?php
session_start();
$role = $_SESSION["role"] ?? "";
session_unset();
session_destroy();

if ($role == "Student") 
{
    header("Location: Student/login.php");
} 
elseif ($role == "Staff") 
{
    header("Location: Staff/login.php");
} 
elseif ($role == "Admin") 
{
    header("Location: Admin/login.php");
} 
else
{
    header("Location: home.php");
}
exit();
?>