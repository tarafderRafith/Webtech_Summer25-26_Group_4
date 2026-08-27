<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Student") 
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Student Dashboard</title>
    <link rel="stylesheet" href="../../Design/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="logo">UniResolve</div>

    <ul class="nav-links">
      <li><a href="../home.php">Home</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </nav>

  <section class="dashboard-section">

    <div class="dashboard-welcome">
      <h1>Welcome, Student</h1>
      <p>Manage your complaints and track their resolution from here.</p>
    </div>

    <div class="dashboard-cards">
      <a href="submit-complaint.php" class="dashboard-card">
        <h3>Submit a Complaint</h3>
        <p>Report a new university-related issue.</p>
      </a>

      <a href="my-complaints.php" class="dashboard-card">
        <h3>My Complaints</h3>
        <p>View the status of complaints you have submitted.</p>
      </a>

      <a href="profile.php" class="dashboard-card">
        <h3>My Profile</h3>
        <p>View and update your account information.</p>
      </a>
    </div>

  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>