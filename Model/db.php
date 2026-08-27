<?php
class db{
    function connection()
    {
        $db_host="localhost";
        $db_user="root";
        $db_password="";
        $db_name="uniresolve_db";
        $connection= new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error)
            {
                die("Please connect the Database");
            }
    return $connection;
    }
    function register($connection,$fullname,$email,$password,$role)
    {
        $sql="INSERT INTO users(fullname, email, password, role) VALUES ('".$fullname."', '".$email."', '".$password."', '".$role."')";
        $result=$connection->query($sql);
        return $result;
    }
    function login($connection,$email)
    {
        $sql="SELECT * FROM users WHERE email = '".$email."'";
        $result=$connection->query($sql);
        return $result;
    }
}
?>