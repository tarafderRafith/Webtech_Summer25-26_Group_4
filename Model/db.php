<?php
if (!class_exists('db')) {
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
    function submit_complaint($connection,$title,$category,$description,$submitted_by)
    {
        $sql="INSERT INTO complaints(title, category, description, submitted_by) VALUES ('".$title."', '".$category."', '".$description."', '".$submitted_by."')";
        $result=$connection->query($sql);
        return $result;
    }
    function CheckUser($connection,$email)
    {
        $sql="SELECT * FROM users WHERE email='".$email."'";
        $result=$connection->query($sql);
        return $result;
    }
    function get_complaints($connection,$submitted_by)
    {
        $sql="SELECT * FROM complaints WHERE submitted_by='".$submitted_by."' ORDER BY id DESC";
        $result=$connection->query($sql);
        return $result;
    }
    function get_all_complaints($connection)
    {
        $sql="SELECT complaints.*, u1.fullname AS submitted_by_name, u2.fullname AS assigned_to_name FROM complaints JOIN users u1 ON complaints.submitted_by = u1.id LEFT JOIN users u2 ON complaints.assigned_to = u2.id ORDER BY complaints.id DESC";
        $result=$connection->query($sql);
        return $result;
    }
    function get_staff_list($connection)
    {
        $sql="SELECT id, fullname FROM users WHERE role='Staff'";
        $result=$connection->query($sql);
        return $result;
    }
    function assign_complaint($connection,$complaint_id,$staff_id)
    {
        $sql="UPDATE complaints SET assigned_to='".$staff_id."' WHERE id='".$complaint_id."' AND assigned_to IS NULL";
        $result=$connection->query($sql);
        return $result;
    }
    function get_assigned_complaints($connection,$staff_id)
    {
        $sql="SELECT complaints.*, users.fullname AS submitted_by_name FROM complaints JOIN users ON complaints.submitted_by = users.id WHERE complaints.assigned_to='".$staff_id."' ORDER BY complaints.id DESC";
        $result=$connection->query($sql);
        return $result;
    }
    function update_status($connection,$complaint_id,$status,$staff_id)
    {
        $sql="UPDATE complaints SET status='".$status."' WHERE id='".$complaint_id."' AND assigned_to='".$staff_id."'";
        $result=$connection->query($sql);
        return $result;
    }
    function get_all_users($connection)
    {
        $sql="SELECT id, fullname, email, role FROM users WHERE role != 'Admin' ORDER BY role, fullname";
        $result=$connection->query($sql);
        return $result;
    }
    function delete_user($connection,$user_id)
    {
        $sql="DELETE FROM users WHERE id='".$user_id."' AND role != 'Admin'";
        $result=$connection->query($sql);
        return $result;
    }
}
}
?>