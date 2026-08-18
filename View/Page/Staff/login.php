<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Staff Login</title>
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

      <h2>Staff Login</h2>
      <p class="form-subtext">Access your Staff account to submit and track complaints.</p>
      <form action="dashboard.php">

        <table class="form-table">
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
            <td><input type="password" id="password" name="password" placeholder="Enter your password"></td>
          </tr>

          <tr>
            <td><input type="submit" value="Login"></td>
          </tr>
        </table>

        <p class="form-footer-text">
          Don't have an account? <a href="register.php">Register here</a>
        </p>

      </form>

    </div>
  </section>
  <script src="../../JS/script.js"></script>
</body>
</html>