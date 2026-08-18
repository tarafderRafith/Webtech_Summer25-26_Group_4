<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UniResolve - Submit a Complaint</title>
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

      <h2>Submit a New Complaint</h2>
      <p class="form-subtext">Describe your issue below and we will route it to the right department.</p>

      <form>

        <table class="form-table">
          <tr>
            <td><label for="title">Complaint Title</label></td>
          </tr>
          <tr>
            <td><input type="text" id="title" name="title" placeholder="Enter a short title for your complaint"></td>
          </tr>

          <tr>
            <td><label for="category">Category</label></td>
          </tr>
          <tr>
            <td>
              <input type="text" name="category" id="category" placeholder="e.g. Academic, Hostel, Technical...">
            </td>
          </tr>

          <tr>
            <td><label for="description">Description</label></td>
          </tr>
          <tr>
            <td><textarea id="description" name="description" rows="6" cols="8" placeholder="Explain your issue in detail..."></textarea></td>
          </tr>

          <tr>
            <td><input type="submit" value="Submit Complaint"></td>
          </tr>
        </table>

        <p class="form-footer-text">
          <a href="dashboard.php">Back to Dashboard</a>
        </p>

      </form>

    </div>
  </section>

  <script src="../../JS/script.js"></script>
</body>
</html>