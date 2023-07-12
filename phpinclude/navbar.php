<header>
  <nav class="navbar navbar-expand-lg navbar-custom mr-auto px-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../frontend/images/main/main_text.png" alt="Midgardian's Delight"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="../frontend/index.php">Home</a></li>
              <li><a class="dropdown-item" href="../frontend/index.php#about">About</a></li>
              <li><a class="dropdown-item" href="../frontend/index.php#faq">FAQ</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" aria-current="page" href="../frontend/drinks_display.php">Drinks</a></li>
          <li class="nav-item"><a class="nav-link" aria-current="page" href="../frontend/desserts_display.php">Desserts</a></li>
          <li class="nav-item"><a class="nav-link" aria-current="page" href="../frontend/bars_display.php">Bars</a></li>
        </ul>
        <form class="d-flex me-2">
          <input class="form-control me-2" type="text" placeholder="Search">
          <button class="btn btn-primary" type="button" onclick="myFunction()">Search</button>
        </form>
        <?php if(isset($_SESSION['user_username']) || isset($_SESSION['admin_username'])): ?>
          <a href="../backend/session/logout.php"><button type="button" id="logoutBtn" class="btn btn-primary ms-2">Logout</button></a>
        <?php else: ?>
            <a href="../frontend/register.php" class="btn btn-primary ms-2">Register</a>
            <a href="../frontend/login.php" class="btn btn-primary ms-2">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header>
