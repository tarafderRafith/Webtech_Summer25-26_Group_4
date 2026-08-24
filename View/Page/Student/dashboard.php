<?php

session_start();

if(!isset($_SESSION["student_logged_in"]))
{
    header("Location: login.php");
    exit();
}

$student_name = $_SESSION["student_name"];

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
      <li><a href="login.php">Logout</a></li>
    </ul>
  </nav>

  <section class="dashboard-section">

    <div class="dashboard-welcome">
      <h1>Welcome, <?php echo $student_name; ?></h1>
      <p>Manage your complaints and track their resolution from here.</p>
    </div>

    <div class="dashboard-cards">
      <a href="submit-complaint.php" class="dashboard-card">
        <h3>Submit a Complaint</h3>
        <p>Report a new university-related issue.</p>
      </a>

      <a href="#" class="dashboard-card">
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