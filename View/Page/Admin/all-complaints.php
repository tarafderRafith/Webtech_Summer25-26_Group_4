<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["role"] != "Admin") {
    header("Location: login.php");
    exit();
}
include "../../../Controller/AdminAssignComplaint.php";
include "C:/xampp/htdocs/Web tech Project/Webtech_Project_summer_2026/Model/db.php";

$database = new db();
$connection = $database->connection();
$complaints = $database->get_all_complaints($connection);
$staff_list = $database->get_staff_list($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - All Complaints</title>
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
      <h1>All Complaints</h1>
      <p>Review every complaint and assign it to a staff member.</p>
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

            <?php if (empty($row["assigned_to"])) { ?>
              <form method="post" action="" class="assign-form">
                <input type="hidden" name="complaint_id" value="<?php echo $row["id"]; ?>">
                <select name="staff_id">
                  <option value="">-- Assign to Staff --</option>
                  <?php
                    $staff_list->data_seek(0);
                    while ($staff = $staff_list->fetch_assoc()) {
                      echo "<option value=\"" . $staff["id"] . "\">" . $staff["fullname"] . "</option>";
                    }
                  ?>
                </select>
                <input type="submit" name="assign" value="Assign">
              </form>
            <?php } else { ?>
              <p class="assigned-note">Assigned to: <?php echo $row["assigned_to_name"]; ?></p>
            <?php } ?>
          </li>
        <?php } ?>
      <?php } else { ?>
        <li class="complaint-item">No complaints submitted yet.</li>
      <?php } ?>
    </ul>

    <p class="form-footer-text">
      <a href="dashboard.php">Back to Dashboard</a>
    </p>

  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>