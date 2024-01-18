<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="btn btn-outline-info mx-2" type="submit" href="bmi.php">BMI_Calculator</a>
        </li>
      </ul>
      <form class="d-flex" >
        <?php
            session_start();
            if (!isset($_SESSION['name'])) {
              echo "<a class='btn btn-outline-success mx-2' type='submit' href='login.php'>Login</a>";
              echo "<a class='btn btn-outline-primary mx-2' type='submit' href='signup.php'>Signup</a>";
            }
            else {
              echo "<a class='btn btn-outline-danger mx-2' type='submit' href='logout.php'>Logout</a>";
            }
        ?>
      </form>
    </div>
  </div>
</nav>