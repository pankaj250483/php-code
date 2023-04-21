<div class="conatiner-fluid m-0 p-2 text-center">
<h2>Family Banking System</h2>
<h4>Main User PANEL</h4>
<p class="text-primary">Welcome <?php echo $_SESSION["fullname"]; ?></p>
</div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="home.php">Home</a>
        </li>
        <?php
          if ($_SESSION['usertype']=="master")
          {
            echo '
                <li class="nav-item">
                  <a class="nav-link" href="addfamilymember.php">Add Family Member</a>
                </li>';
          }
          ?>
              <li class="nav-item">
                  <a class="nav-link" href="paybill.php">Pay Bills</a>
                </li>
                <li class="nav-item">
          <a class="nav-link" href="add_debt.php">Add Debt</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="statement.php">View Statement</a>
        </li>
         <li class="nav-item">
          <a class="nav-link float-end" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>