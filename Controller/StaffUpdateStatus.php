<?php
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_status"])) {
    $complaint_id = trim($_POST["complaint_id"] ?? "");
    $status = trim($_POST["status"] ?? "");

    if (!empty($complaint_id) && !empty($status)) {
        $database = new db();
        $connection = $database->connection();
        $database->update_status($connection, $complaint_id, $status, $_SESSION["id"]);
    }

    header("Location: update-status.php");
    exit();
}
?>