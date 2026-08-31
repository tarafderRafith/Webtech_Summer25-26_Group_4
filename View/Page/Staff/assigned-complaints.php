<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Staff") 
{
    header("Location: login.php");
    exit();
}
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";

$database = new db();
$connection = $database->connection();
$complaints = $database->get_assigned_complaints($connection, $_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Assigned Complaints</title>
    <link rel="stylesheet" href="../../Design/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="logo">UniResolve</div>

    <ul class="nav-links">
      <li><a href="../home.php">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>

  <section class="dashboard-section">

    <div class="dashboard-welcome">
      <h1>Assigned Complaints</h1>
      <p>Complaints currently assigned to you.</p>
    </div>

    <ul class="complaints-list">
      <?php if ($complaints && $complaints->num_rows > 0) { ?>
        <?php while ($row = $complaints->fetch_assoc()) { ?>
          <li class="complaint-item">
            <div class="complaint-title"><?php echo $row["title"]; ?></div>
            <p class="complaint-description"><?php echo $row["description"]; ?></p>
            <div class="complaint-meta">
              <span>By: <?php echo $row["submitted_by_name"]; ?></span>
              <span><?php echo $row["category"]; ?></span>
              <span><?php echo $row["created_at"]; ?></span>
              <span class="status status-<?php echo strtolower(str_replace(" ", "-", $row["status"])); ?>"><?php echo $row["status"]; ?></span>
            </div>
          </li>
        <?php } ?>
      <?php } else { ?>
        <li class="complaint-item">No complaints assigned to you yet.</li>
      <?php } ?>
    </ul>

    <p class="form-footer-text">
      <a href="dashboard.php">Back to Dashboard</a>
    </p>

  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>