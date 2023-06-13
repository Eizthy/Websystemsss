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

  <link rel="preload" as="image" href="./assets/images/hero-bg.svg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-banner-2.jpg">
  <link rel="preload" as="image" href="./assets/images/hero-shape-1.svg">
  <link rel="preload" as="image" href="./assets/images/hero-shape-2.png">

</head>

<body id="top" style="padding-top: 100px;">

  <!-- 
    - #HEADER
  -->

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
            <a href="#" class="navbar-link">Admin</a>
            <ul class="dropdown-content">
              <li><a href="reset.php">Change Password</a></li>
              <li><a href="index.php">Logout</a></li>
            </ul>
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

<div style="padding: 20px;">
  <form>
    <label for="newsCategory">News Category:</label>
    <select id="newsCategory" name="newsCategory" style="font-size: 15px;">
      <option value="beginner">Beginner</option>
      <option value="intermediate">Intermediate</option>
      <option value="advanced">Advanced</option>
    </select>

    <br><br>

    <label for="newsTitle" style="display: inline-block; margin-right: 10px;">Course Title:</label>
    <input type="text" id="newsTitle" name="newsTitle" style="width: 300px; border: 1px solid #ccc; display: inline-block;" placeholder="Enter your Title..." required>

    <br>

    <p>Description:</p>
    <label for="newsDescription"></label>
    <textarea id="newsDescription" name="newsDescription" required style="width: 500px; height: 300px; border: 1px solid #ccc;" required></textarea>

    <br><br>

    <label for="students" style="display: inline-block; margin-right: 10px;">Students:</label>
    <input type="text" id="students" name="students" style="width: 300px; border: 1px solid #ccc; display: inline-block;" placeholder="Enter number of students..." required>

    <br><br>

    <div style="display: flex; justify-content: flex-start; gap: 10px;">
      <button type="button" style="border: 1px solid gray;">Undo</button>
      <button type="submit" style="border: 1px solid gray;">Save</button>
      <button type="button" style="border: 1px solid gray;">Delete</button>
    </div>

  </form>
</div>



  <!-- 
    - #FOOTER
  -->

  <footer class="footer" style="background-image: url('./assets/images/footer-bg.png')">

    <div class="footer-top section">
      <div class="container grid-list">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/learnopia.png" width="190" height="70" alt="EduWeb logo">
          </a>

          <p class="footer-brand-text">
            Join our vibrant community of learners today and unlock your full learning potential with LearnOpia!
          </p>

          <div class="wrapper">
            <span class="span">Add:</span>

            <address class="address">Palawan State University</address>
          </div>

          <div class="wrapper">
            <span class="span">Call:</span>

            <a href="tel:+011234567890" class="footer-link">+01 123 4567 890</a>
          </div>

          <div class="wrapper">
            <span class="span">Email:</span>

            <a href="mailto:info@eduweb.com" class="footer-link">info@learnopia.com</a>
          </div>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Online Platform</p>
          </li>

          <li>
            <a href="#" class="footer-link">About</a>
          </li>

          <li>
            <a href="#" class="footer-link">Courses</a>
          </li>

          <li>
            <a href="#" class="footer-link">Instructor</a>
          </li>

          <li>
            <a href="#" class="footer-link">Events</a>
          </li>

          <li>
            <a href="#" class="footer-link">Instructor Profile</a>
          </li>

          <li>
            <a href="#" class="footer-link">Purchase Guide</a>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Links</p>
          </li>

          <li>
            <a href="#" class="footer-link">Contact Us</a>
          </li>

          <li>
            <a href="#" class="footer-link">Gallery</a>
          </li>

          <li>
            <a href="#" class="footer-link">News & Articles</a>
          </li>

          <li>
            <a href="#" class="footer-link">FAQ's</a>
          </li>

          <li>
            <a href="#" class="footer-link">Sign In/Registration</a>
          </li>

          <li>
            <a href="#" class="footer-link">Coming Soon</a>
          </li>

        </ul>

        <div class="footer-list">

          <p class="footer-list-title">Contacts</p>

          <p class="footer-list-text">
            Enter your email address to register to our newsletter subscription
          </p>

          <form action="" class="newsletter-form">
            <input type="email" name="email_address" placeholder="Your email" required class="input-field">

            <button type="submit" class="btn has-before">
              <span class="span">Subscribe</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </button>
          </form>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-youtube"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          Copyright 2022 All Rights Reserved by <a href="#" class="copyright-link">codewithsadee</a>
        </p>

      </div>
    </div>

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