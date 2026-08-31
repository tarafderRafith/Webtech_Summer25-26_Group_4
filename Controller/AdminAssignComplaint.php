<?php
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["assign"])) 
{
    $complaint_id = trim($_POST["complaint_id"] ?? "");
    $staff_id = trim($_POST["staff_id"] ?? "");

    if (!empty($complaint_id) && !empty($staff_id)) {
        $database = new db();
        $connection = $database->connection();
        $database->assign_complaint($connection, $complaint_id, $staff_id);
    }

    header("Location: all-complaints.php");
    exit();
}
?>