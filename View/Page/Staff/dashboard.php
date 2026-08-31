<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Staff") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Staff Dashboard</title>
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
      <h1>Welcome, Staff</h1>
      <p>Review and manage complaints assigned to your department.</p>
    </div>

    <div class="dashboard-cards">
      <a href="assigned-complaints.php" class="dashboard-card">
        <h3>Assigned Complaints</h3>
        <p>View complaints assigned to you for review.</p>
      </a>

      <a href="update-status.php" class="dashboard-card">
        <h3>Update Status</h3>
        <p>Mark complaints as in-progress or resolved.</p>
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