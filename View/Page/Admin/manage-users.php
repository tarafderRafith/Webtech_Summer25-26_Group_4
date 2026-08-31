<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Admin") 
{
    header("Location: login.php");
    exit();
}
include "../../../Controller/AdminManageUsers.php";
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";

$database = new db();
$connection = $database->connection();
$users = $database->get_all_users($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Manage Users</title>
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
      <h1>Manage Users</h1>
      <p>View and manage Student and Staff accounts.</p>
    </div>

    <ul class="complaints-list">
      <?php if ($users && $users->num_rows > 0) { ?>
        <?php while ($row = $users->fetch_assoc()) { ?>
          <li class="complaint-item">
            <div class="complaint-title"><?php echo $row["fullname"]; ?></div>
            <div class="complaint-meta">
              <span><?php echo $row["email"]; ?></span>
              <span class="status status-<?php echo strtolower($row["role"]); ?>"><?php echo $row["role"]; ?></span>
            </div>

            <form method="post" action="" class="assign-form" onsubmit="return confirm('Are you sure you want to delete this user?');">
              <input type="hidden" name="user_id" value="<?php echo $row["id"]; ?>">
              <input type="submit" name="delete_user" value="Delete" class="btn-delete">
            </form>
          </li>
        <?php } ?>
      <?php } else { ?>
        <li class="complaint-item">No users found.</li>
      <?php } ?>
    </ul>

    <p class="form-footer-text">
      <a href="dashboard.php">Back to Dashboard</a>
    </p>

  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>