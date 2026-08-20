<?php
$email="";
$password="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email=trim($_POST["email"] ?? "");
    $password=trim($_POST["password"] ?? "");

    if(!empty($email) && strlen($email)>=5)
    {
        echo "Email: ".$email;
        echo "<br>";
    }
    else
    {
        echo "Email Must be at least 5 Charectar";
        echo "<br>";
    }

    if(!empty($password) && strlen($password)>=5)
    {
        echo "Password: ".$password;
        echo "<br>";
    }
    else
    {
        echo "Password Must be at least 5 Charectar";
        echo "<br>";
    }

    if(!empty($email) && strlen($email)>=5 && !empty($password) && strlen($password)>=5)
    {
        header("Location: dashboard.php");
        exit();
    }
}
?>