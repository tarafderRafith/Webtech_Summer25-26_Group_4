<?php
include "../../../Controller/StudentProfileValidation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Student Profile</title>
    <link rel="stylesheet" href="../../Design/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="logo">UniResolve</div>

    <ul class="nav-links">
      <li><a href="../home.php">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="login.php">Logout</a></li>
    </ul>
  </nav>

  <section class="form-section">
    <div class="form-box wide-box">

      <h2>Profile Details</h2>
      <p class="form-subtext">Your current account information.</p>

      <table class="profile-info-table">
        <tr>
          <td class="info-label">Full Name</td>
          <td class="info-value">Student Name</td>
        </tr>
        <tr>
          <td class="info-label">Email</td>
          <td class="info-value">example@uniresolve.edu</td>
        </tr>
        <tr>
          <td class="info-label">Role</td>
          <td class="info-value">Student</td>
        </tr>
      </table>



      <h2>Update Profile</h2>
      <p class="form-subtext">Update your personal account information.</p>

      <?php if (!empty($profile_error)) { ?>
        <p class="php-error"><?php echo $profile_error; ?></p>
      <?php } ?>

      <form method="post" action="" onsubmit="return validate_profile_update()">
        <table class="form-table">
          <tr>
            <td><label for="fullname">Full Name</label></td>
          </tr>
          <tr>
            <td><input type="text" id="fullname" name="fullname" placeholder="Enter your full name"></td>
          </tr>

          <tr>
            <td><label for="email">Email</label></td>
          </tr>
          <tr>
            <td><input type="email" id="email" name="email" placeholder="Enter your email"></td>
          </tr>
          <tr>
            <td><input type="submit" name="update_profile" value="Update Profile"></td>
          </tr>
        </table>
      </form>


      <h2>Change Password</h2>
      <p class="form-subtext">Update your account password.</p>

      <?php if (!empty($password_error)) { ?>
        <p class="php-error"><?php echo $password_error; ?></p>
      <?php } ?>

      <form method="post" action="" onsubmit="return validate_password_change()">
        <table class="form-table">
          <tr>
            <td><label for="current_password">Current Password</label></td>
          </tr>
          <tr>
            <td><input type="password" id="current_password" name="current_password" placeholder="Enter current password"></td>
          </tr>

          <tr>
            <td><label for="new_password">New Password</label></td>
          </tr>
          <tr>
            <td><input type="password" id="new_password" name="new_password" placeholder="Enter new password"></td>
          </tr>

          <tr>
            <td><label for="confirm_new_password">Confirm New Password</label></td>
          </tr>
          <tr>
            <td><input type="password" id="confirm_new_password" name="confirm_new_password" placeholder="Re-enter new password"></td>
          </tr>

          <tr>
            <td><input type="submit" name="change_password" value="Update Password"></td>
          </tr>
        </table>
      </form>

    </div>
  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>