<?php
session_start();
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";
$complaint_error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $title = trim($_POST["title"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $description = trim($_POST["description"] ?? "");

    if (empty($title) || strlen($title)<5) 
    {
        $complaint_error = "Complaint title must be at least 5 characters<br>";
    }
    if (empty($category) || strlen($category)<3) 
    {
        $complaint_error = "Category must be at least 3 characters<br>";
    }
    if (empty($description) || strlen($description)<10) 
    {
        $complaint_error = "Description must be at least 10 characters<br>";
    }

    if (empty($complaint_error))
    {
        $database = new db();
        $connection = $database->connection();
        $submitted_by = $_SESSION["id"];
        $result = $database->submit_complaint($connection, $title, $category, $description, $submitted_by);

        if ($result) {
            header("Location: my-complaints.php");
            exit();
        } else {
            $complaint_error = "Please try again";
        }
    }
}
?>