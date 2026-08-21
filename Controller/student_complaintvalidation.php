<?php

$title = "";
$category = "";
$description = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"] ?? "");
    $category = trim($_POST["category"] ?? "");
    $description = trim($_POST["description"] ?? "");

    if (empty($title)) {
        $message = "Complaint Title is required.";
    }
    elseif (strlen($title) < 5) {
        $message = "Complaint Title must be at least 5 characters.";
    }
    elseif (empty($category)) {
        $message = "Category is required.";
    }
    elseif (empty($description)) {
        $message = "Description is required.";
    }
    elseif (strlen($description) < 10) {
        $message = "Description must be at least 10 characters.";
    }
    else {
        $message = "Complaint submitted successfully!";

        // Later we will insert the complaint into the database.
    }
}

?>