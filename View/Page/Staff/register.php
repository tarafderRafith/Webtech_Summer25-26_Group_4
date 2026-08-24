<?php
include "../../../Controller/StaffRegisterValidation.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Staff Register</title>
    <link rel="stylesheet" href="../../Design/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="logo">UniResolve</div>

    <ul class="nav-links">
      <li><a href="../home.php">Home</a></li>
    </ul>
  </nav>

  <section class="form-section">
    <div class="form-box">

      <h2>Create a Staff Account</h2>
      <p class="form-subtext">Register to start reporting and tracking your complaints.</p>

      <?php if (!empty($php_error)) { ?>
        <p class="php-error"><?php echo $php_error; ?></p>
      <?php } ?>

      <form method="post" action="" onsubmit="return collect_data()">

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
            <td><label for="password">Password</label></td>
          </tr>
          <tr>
            <td><input type="password" id="password" name="password" placeholder="Create a password"></td>
          </tr>

          <tr>
            <td><label for="confirm_password">Confirm Password</label></td>
          </tr>
          <tr>
            <td><input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter your password"></td>
          </tr>

          <tr>
            <td><input type="submit" value="Register"></td>
          </tr>
        </table>

        <p class="form-footer-text">
          Already have an account? <a href="login.php">Login here</a>
        </p>

      </form>

    </div>
  </section>
  <script src="../../JS/script.js"></script>
</body>
</html>