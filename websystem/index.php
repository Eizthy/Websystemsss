<?php 
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>LearnOpia - The Best Program to Enroll for Exchange</title>
  
  <link rel="stylesheet" href="./assets/css/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <?php
  if (isset($_POST['logout'])) {
    // Perform logout actions here, where destroying the session
    session_destroy();
    // Redirect the user to the back to the home page
    header("Location: index.php");
    exit();
  }
?>

<header class="header" data-header>
  <div class="container">
    <img src="./assets/images/learnopia.png" width="162" height="50" alt="EduWeb logo">
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
          <a href="#courses" class="navbar-link" data-nav-link>Courses</a>
        </li>
        <li class="navbar-item">
          <a href="#blog" class="navbar-link" data-nav-link>Blog</a>
        </li>
        <li class="navbar-item">
          <a href="#" class="navbar-link" data-nav-link>Contact</a>
        </li>
        <!-- an if-else condition to display different navbar definding on the user -->
        <li class="navbar-item dropdown">
          <?php
            if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 1) {
              echo "<a href='admin.php' class=\"navbar-link\">Admin</a>";
              echo "<ul class=\"dropdown-content\">";
              echo "<li><a href='add.php'>Add Course</a></li>";
              echo "<div class=\"dropdown-divider\"></div>";
              echo "<li><form method='post' action=''><button type='submit' name='logout'>Logout</button></form></li>";
              echo "<script> function logout() { var confirmLogout = confirm('Are you sure you want to logout?'); 
                if (confirmLogout) {window.location.href = 'index.php'; }}  </script>";
            } else if (isset($_SESSION['username']) && $_SESSION['isAdmin'] == 0) {
              echo "<a href='#' class=\"navbar-link\">Profile</a>";
              echo "<ul class=\"dropdown-content\">";
              echo "<li><a href='reset.php'>Change Password</a></li>";
              echo "<div class=\"dropdown-divider\"></div>";
              echo "<li><form method='post' action=''><button type='submit' name='logout'>Logout</button></form></li>";
              echo "</ul>";
              echo "<script> function logout() { var confirmLogout = confirm('Are you sure you want to logout?'); 
                if (confirmLogout) {window.location.href = 'index.php'; }}  </script>";
            }
          ?>
        </li>
      </ul>
    </nav>
    <!-- an array that display navbar if there are no user loged in -->
    <?php
      if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    ?>
    <div class="header-actions"></div>
      <a href="login.php" class="btn has-before">
        <span class="span">Try for free</span>
        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
      </a>
    </div>
    <?php
      }
    ?>
    <div class="overlay" data-nav-toggler data-overlay></div>
  </div>
</header>



  <main>
    <article>

      <!-- 
        - #HOME
      -->

      <section class="section hero has-bg-image" id="home" aria-label="home" >
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 section-title">
            Explore a World of Knowledge with <span class="span">LearnOpia</span>
            </h1>

            <p class="hero-text">
            Welcome to LearnOpia, the ultimate destination for lifelong learners! Whether you're a student, professional, or simply curious, LearnOpia offers a diverse collection of courses, resources, and interactive tools to enhance your learning experience. 
            </p>

            <a href="#courses" class="btn has-before">
              <span class="span">Find courses</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>

          </div>
          <figure class="hero-banner">

            <div class="img-holder one" style="--width: 270; --height: 300;">
              <img src="./assets/images/hero-banner-1.jpg" width="270" height="300" alt="hero banner" class="img-cover">
            </div>

            <div class="img-holder two" style="--width: 240; --height: 370;">
              <img src="./assets/images/hero-banner-2.jpg" width="240" height="370" alt="hero banner" class="img-cover">
            </div>
            <img src="./assets/images/hero-shape-1.svg" width="380" height="190" alt="" class="shape hero-shape-1">

            <img src="./assets/images/hero-shape-2.png" width="622" height="551" alt="" class="shape hero-shape-2">

          </figure>

        </div>
      </section>


      <!-- 
        - #COURSE
      -->
      
<!-- an array that display in website -->
      <section class="section course" id="courses" aria-label="course">
        <div class="container">
          <!-- inputing a connection where the query will get -->
          <?php
          include 'connection.php';
          ?>

          <p class="section-subtitle">Popular Courses</p>

          <h2 class="h2 section-title">Pick A Course To Get Started</h2>

          <ul class="grid-list">

            <li>
              <div class="course-card">

                <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                  <img src="./assets/images/course-1.jpg" width="370" height="220" loading="lazy"
                    alt="Build Responsive Real- World Websites with HTML and CSS" class="img-cover">
                </figure>

                <div class="abs-badge">
                  <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                  <span class="span">3 Weeks</span>
                </div>


                <div class="card-content">
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=1";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<span class=\"badge\">" . $row['level'] . "</span>";
                    } 
                    ?>
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=1";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<h3 class="h3"><a href="#" class="card-title">' . $row['course'] . ' </a></h3>';
                    } 
                  ?>

                  <div class="wrapper">

                  <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <p class="rating-text">(5.0 /9 Rating)</p>

                  </div>
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=1";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<data class=\"price\" style=\"color: red;\"> ₱" . $row['price'] . ".00</data>";
                    } 
                  ?>
                  <ul class="card-meta-list">
                  <li class="card-meta-item">
                    <ion-icon name="library-outline" aria-hidden="true"></ion-icon>
                    <?php
                      $query = "SELECT * FROM `data` WHERE id=1";
                      $result = mysqli_query($conn, $query); 
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<span class=\"span\">" . $row['lessons'] . " lesson</span>";
                      } 
                    ?>
                  </li>
                  <li class="card-meta-item">
                    <ion-icon name="people-outline" aria-hidden="true"></ion-icon>
                    <?php
                      $query = "SELECT * FROM `data` WHERE id=1";
                      $result = mysqli_query($conn, $query); 
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<span class=\"span\">" . $row['students'] . " Students</span>";
                      } 
                    ?>
                  </li>

                  </ul>

                </div>

              </div>
            </li>
            <div class="course-card">
              <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                <img src="./assets/images/course-3.jpg" width="370" height="220" loading="lazy"
                  alt="The Complete Camtasia Course for Content Creators" class="img-cover">
              </figure>

              <div class="abs-badge">
                <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                <span class="span">3 Weeks</span>
              </div>

              <div class="card-content">
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=2";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<span class=\"badge\">" . $row['level'] . "</span>";
                    } 
                    ?>
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=2";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<h3 class="h3"><a href="#" class="card-title">' . $row['course'] . ' </a></h3>';
                    } 
                  ?>

                  <div class="wrapper">

                  <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <p class="rating-text">(5.0 /9 Rating)</p>

                  </div>
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=2";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<data class=\"price\" style=\"color: red;\"> ₱" . $row['price'] . ".00</data>";
                    } 
                  ?>
                  <ul class="card-meta-list">
                  <li class="card-meta-item">
                    <ion-icon name="library-outline" aria-hidden="true"></ion-icon>
                    <?php
                      $query = "SELECT * FROM `data` WHERE id=2";
                      $result = mysqli_query($conn, $query); 
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<span class=\"span\">" . $row['lessons'] . " lesson</span>";
                      } 
                    ?>
                  </li>
                  <li class="card-meta-item">
                    <ion-icon name="people-outline" aria-hidden="true"></ion-icon>
                    <?php
                      $query = "SELECT * FROM `data` WHERE id=2";
                      $result = mysqli_query($conn, $query); 
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<span class=\"span\">" . $row['students'] . " Students</span>";
                      } 
                    ?>
                  </li>

                  </ul>

                </div>

              </div>
              </li>               

            <li>
              <div class="course-card">

                <figure class="card-banner img-holder" style="--width: 370; --height: 220;">
                  <img src="./assets/images/course-2.jpg" width="370" height="220" loading="lazy"
                    alt="Java Programming Masterclass for Software Developers" class="img-cover">
                </figure>

                <div class="abs-badge">
                  <ion-icon name="time-outline" aria-hidden="true"></ion-icon>

                  <span class="span">8 Weeks</span>
                </div>

                <div class="card-content">
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=3";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<span class=\"badge\">" . $row['level'] . "</span>";
                    } 
                    ?>
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=3";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo '<h3 class="h3"><a href="#" class="card-title">' . $row['course'] . ' </a></h3>';
                    } 
                  ?>

                  <div class="wrapper">

                  <div class="rating-wrapper">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                    <p class="rating-text">(5.0 /9 Rating)</p>

                  </div>
                  <?php
                    $query = "SELECT * FROM `data` WHERE id=3";
                    $result = mysqli_query($conn, $query); 
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<data class=\"price\" style=\"color: red;\"> ₱" . $row['price'] . ".00</data>";
                    } 
                  ?>
                  <ul class="card-meta-list">
                  <li class="card-meta-item">
                    <ion-icon name="library-outline" aria-hidden="true"></ion-icon>
                    <?php
                      $query = "SELECT * FROM `data` WHERE id=3";
                      $result = mysqli_query($conn, $query); 
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<span class=\"span\">" . $row['lessons'] . " lesson</span>";
                      } 
                    ?>
                  </li>
                  <li class="card-meta-item">
                    <ion-icon name="people-outline" aria-hidden="true"></ion-icon>
                    <?php
                      $query = "SELECT * FROM `data` WHERE id=3";
                      $result = mysqli_query($conn, $query); 
                      while ($row = mysqli_fetch_array($result)) {
                        echo "<span class=\"span\">" . $row['students'] . " Students</span>";
                      } 
                    ?>
                  </li>

                  </ul>

                </div>

              </div>
            </li>

            <li>

          </ul>

          <a href="#" class="btn has-before">
            <span class="span">Browse more courses</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </a>

        </div>
      </section>





      <!-- 
        - #VIDEO
      -->

      <section class="video has-bg-image" aria-label="video"
        style="background-image: url('./assets/images/video-bg.png')">
        <div class="container">

          <div class="video-card">

            <div class="video-banner img-holder has-after" style="--width: ; --height: ;">
              <img src="./assets/images/video-banner.jpg" width="970" height="550" loading="lazy" alt="video banner"
                class="img-cover">

              <button class="play-btn" aria-label="play video">
                <ion-icon name="play" aria-hidden="true"></ion-icon>
              </button>
            </div>

            <img src="./assets/images/video-shape-1.png" width="1089" height="605" loading="lazy" alt=""
              class="shape video-shape-1">

            <img src="./assets/images/video-shape-2.png" width="158" height="174" loading="lazy" alt=""
              class="shape video-shape-2">

          </div>

        </div>
      </section>





      <!-- 
        - #STATE
      -->

      <section class="section stats" aria-label="stats">
        <div class="container">

          <ul class="grid-list">

            <li>
              <div class="stats-card" style="--color: 170, 75%, 41%">
                <h3 class="card-title">29.3k</h3>

                <p class="card-text">Student Enrolled</p>
              </div>
            </li>

            <li>
              <div class="stats-card" style="--color: 351, 83%, 61%">
                <h3 class="card-title">32.4K</h3>

                <p class="card-text">Class Completed</p>
              </div>
            </li>

            <li>
              <div class="stats-card" style="--color: 260, 100%, 67%">
                <h3 class="card-title">100%</h3>

                <p class="card-text">Satisfaction Rate</p>
              </div>
            </li>

            <li>
              <div class="stats-card" style="--color: 42, 94%, 55%">
                <h3 class="card-title">354+</h3>

                <p class="card-text">Top Instructors</p>
              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #BLOG
      -->

      <section class="section blog has-bg-image" id="blog" aria-label="blog"
        style="background-image: url('./assets/images/blog-bg.svg')">
        <div class="container">

          <p class="section-subtitle">Latest Articles</p>

          <h2 class="h2 section-title">Get News With LearnOpia</h2>

          <ul class="grid-list">

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="./assets/images/blog-1.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-btn" aria-label="read more">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="#" class="card-subtitle">Online</a>

                  <h3 class="h3">
                    <a href="#" class="card-title">10 Essential Study Tips for Online Learners</a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span">April 10, 2023</span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>

                      <span class="span">Com 09</span>
                    </li>

                  </ul>

                  <p class="card-text">
                  Discover crucial strategies to enhance your online learning experience and boost your academic performance.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="./assets/images/blog-2.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-btn" aria-label="read more">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="#" class="card-subtitle">Online</a>

                  <h3 class="h3">
                    <a href="#" class="card-title">Become A Better Blogger: Content Planning</a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span">May 16, 2023
                      </span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>

                      <span class="span">Com 11</span>
                    </li>

                  </ul>

                  <p class="card-text">
                  Enhance your blogging skills by mastering effective content planning techniques to consistently create engaging and impactful blog posts.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="blog-card">

                <figure class="card-banner img-holder has-after" style="--width: 370; --height: 370;">
                  <img src="./assets/images/blog-3.jpg" width="370" height="370" loading="lazy"
                    alt="Become A Better Blogger: Content Planning" class="img-cover">
                </figure>

                <div class="card-content">

                  <a href="#" class="card-btn" aria-label="read more">
                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                  <a href="#" class="card-subtitle">Online</a>

                  <h3 class="h3">
                    <a href="#" class="card-title">The Benefits of Online Education: Why It's Worth Your Investment</a>
                  </h3>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <ion-icon name="calendar-outline" aria-hidden="true"></ion-icon>

                      <span class="span">June 14, 2023</span>
                    </li>

                    <li class="card-meta-item">
                      <ion-icon name="chatbubbles-outline" aria-hidden="true"></ion-icon>

                      <span class="span">Com 09</span>
                    </li>

                  </ul>

                  <p class="card-text">
                  Uncover the numerous advantages of online education, from flexibility and accessibility to career advancement opportunities.
                  </p>

                </div>

              </div>
            </li>

          </ul>

          <img src="./assets/images/blog-shape.png" width="186" height="186" loading="lazy" alt=""
            class="shape blog-shape">

        </div>
      </section>

    </article>
  </main>
  
  <footer>
      <?php include 'footer.php'; ?>
  </footer>

  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>