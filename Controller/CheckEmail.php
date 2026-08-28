<?php
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";
$email=trim($_POST["email"] ?? "");
if(empty($email))
    {
        echo "Email Required";
    }
    else{
        $database = new db();
        $connection=$database->connection();
        $result=$database->CheckUser($connection, $email);
        if($result->num_rows>0)
            {
                echo "Email Already Taken";
            }
            else
                {
                    echo "Email Available";
                }
    }
?>