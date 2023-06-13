<header class="header" data-header>
  <div class="container">
    <img src="./assets/images/learnopia.png" width="190" height="70" alt="EduWeb logo">
    <nav class="navbar" data-navbar>
      <div class="wrapper">
        <img src="./assets/images/learnopia.png" width="162" height="50" alt="EduWeb logo">
        <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
          <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
        </button>
      </div>
      <ul class="navbar-list">
        <li class="navbar-item">
          <a href="#home" class="navbar-link" data-nav-link>Home</a>
        </li>
        <li class="navbar-item">
          <a href="#about" class="navbar-link" data-nav-link>About</a>
        </li>
        <li class="navbar-item">
          <a href="#courses" class="navbar-link" data-nav-link>Courses</a>
        </li>
        <li class="navbar-item">
          <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
        </li>
        <li class="navbar-item">
          <a href="#" class="navbar-link" data-nav-link>Contact</a>
        </li>
        <li class="navbar-item dropdown">
          <?php
          if (isset($_SESSION['username'])) {
            if ($_SESSION['isAdmin'] == 1) {
              echo "<a href='#' class='navbar-link'>Admin</a>";
              echo "<ul class=\"dropdown-content\">";
              echo "<li><a href='reset.php'>Add Course</a></li>";
            } else {
              echo "<a href='#' class='navbar-link'>Profile</a>";
              echo "<ul class=\"dropdown-content\">";
              echo "<li><a href='reset.php'>Change Password</a></li>";
            }
            echo "<li><a href='#' onclick='logout()'>Logout</a></li>";
            echo "<script> function logout() { var confirmLogout = confirm('Are you sure you want to logout?'); if (confirmLogout) {window.location.href = 'index.php'; }}  </script>";
          } else {
            echo "<a href='login.php' class='btn has-before'>
                    <span class='span'>Try for free</span>
                    <ion-icon name='arrow-forward-outline' aria-hidden='true'></ion-icon>
                  </a>";
          }
          ?>  
        </li>
      </ul>
    </nav>
    <div class="header-actions">
      <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>
    </div>
    <div class="overlay" data-nav-toggler data-overlay></div>
  </div>
</header>