<?php
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_user"])) {
    $user_id = trim($_POST["user_id"] ?? "");

    if (!empty($user_id)) {
        $database = new db();
        $connection = $database->connection();
        $database->delete_user($connection, $user_id);
    }

    header("Location: manage-users.php");
    exit();
}
?>