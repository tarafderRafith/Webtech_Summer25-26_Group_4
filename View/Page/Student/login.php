<?php
include "../../../Controller/student_loginvalidation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Student Login</title>
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

      <h2>Student Login</h2>

      <p class="form-subtext">
        Access your Student account to submit and track complaints.
      </p>


      <!-- PHP Message -->
      <p style="color: red; text-align: center; font-weight: bold;">
        <?php echo $message; ?>
      </p>


      <form method="post" action="" onsubmit="return collect_data()">

        <table class="form-table">

          <tr>
            <td>
              <label for="email">Email</label>
            </td>
          </tr>

          <tr>
            <td>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email"
                value="<?php echo $email; ?>"
              >
            </td>
          </tr>


          <tr>
            <td>
              <label for="password">Password</label>
            </td>
          </tr>

          <tr>
            <td>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="Enter your password"
              >
            </td>
          </tr>


          <tr class="remember-row">
            <td>

              <input
                type="checkbox"
                name="remember"
                id="remember"
                <?php echo $remember ? 'checked' : ''; ?>
              >

              <label for="remember">
                Remember me
              </label>

            </td>
          </tr>


          <tr>
            <td>
              <input type="submit" value="Login">
            </td>
          </tr>

        </table>


        <p class="form-footer-text">
          Don't have an account?
          <a href="register.php">Register here</a>
        </p>

      </form>

    </div>

  </section>


  <script src="../../JS/script.js"></script>

</body>
</html>