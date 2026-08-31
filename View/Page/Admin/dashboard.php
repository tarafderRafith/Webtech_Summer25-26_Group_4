<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Admin Dashboard</title>
    <link rel="stylesheet" href="../../Design/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="logo">UniResolve</div>

    <ul class="nav-links">
      <li><a href="../home.php">Home</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>

  <section class="dashboard-section">

    <div class="dashboard-welcome">
      <h1>Welcome, Admin</h1>
      <p>Oversee all complaints, users, and system activity.</p>
    </div>

    <div class="dashboard-cards">
      <a href="all-complaints.php" class="dashboard-card">
        <h3>All Complaints</h3>
        <p>View and manage every complaint in the system.</p>
      </a>

      <a href="manage-users.php" class="dashboard-card">
        <h3>Manage Users</h3>
        <p>View and manage Student and Staff accounts.</p>
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