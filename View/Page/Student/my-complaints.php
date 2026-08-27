<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Student") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - My Complaints</title>
    <link rel="stylesheet" href="../../Design/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="logo">UniResolve</div>

    <ul class="nav-links">
      <li><a href="../home.php">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="../logout.php">Logout</a></li>
    </ul>
  </nav>

  <section class="dashboard-section">

    <div class="dashboard-welcome">
      <h1>My Complaints</h1>
      <p>Track the status of every complaint you have submitted.</p>
    </div>

    <div class="complaints-table-wrap">
      <table class="complaints-table">
        <tr>
          <th>Title</th>
          <th>Category</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
        <tr>
          <td>Wifi not working in Hall B</td>
          <td>Technical</td>
          <td>12 Aug 2026</td>
          <td><span class="status status-pending">Pending</span></td>
        </tr>
        <tr>
          <td>Delay in exam result publishing</td>
          <td>Academic</td>
          <td>05 Aug 2026</td>
          <td><span class="status status-progress">In Progress</span></td>
        </tr>
        <tr>
          <td>Broken chair in Room 302</td>
          <td>Administrative</td>
          <td>28 Jul 2026</td>
          <td><span class="status status-resolved">Resolved</span></td>
        </tr>
      </table>
    </div>

    <p class="form-footer-text">
      <a href="dashboard.php">Back to Dashboard</a>
    </p>

  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>