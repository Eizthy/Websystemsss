<?php
session_start();
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

<?php
include 'connection.php';

  echo "<form>
      <label for='level'>Level:</label>
      <select id='level' name='level' style='font-size: 15px;'>
      <option value=''></option>
        <option value='beginner'>Beginner</option>
        <option value=intermediate'>Intermediate</option>
        <option value='advanced'>Advanced</option>
      </select>
      <br><br>
      <label for='CourseTitle' style='display: inline-block; margin-right: 10px;'>Course Title:</label>
      <input type='text' id='CourseTitle name='CourseTitle' value='' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>
      <label for='students' style='display: inline-block; margin-right: 10px;'>Price:</label>
      <input type='text' id='students' name='students' value='' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>
      <label for='students' style='display: inline-block; margin-right: 10px;'>Lesson:</label>
      <input type='text' id='students' name='students' value='' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>
      <label for='students' style='display: inline-block; margin-right: 10px;'>Student:</label>
      <input type='text' id='students' name='students' value='' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>

      <div style='display: flex; justify-content: flex-start; gap: 10px;'>
        <button type='submit' style='border: 1px solid gray;'>Save</button>
      </div>

  </form>";
?>
<!-- Insert news to database script -->
<?php
include 'connection.php';
if ($conn && isset($_POST['submit'])) {
    $level = $_POST['level'];
    $course = $_POST['course'];
    $price = $_POST['price'];
    $lessons = $_POST['lessons'];
    $students = $_POST['students'];

    $query = "INSERT INTO `data` (`level`, `course`, `price`, `lessons`, `students`) VALUES ('$level', '$course', '$price', '$lessons', '$students')";
    $result=mysqli_query($conn,$sql);
      if($result){ 
      header('location:index.php');
      echo"<script>alert('New User Register Success');</script>";   
      }else{
          die(mysqli_error($conn)) ;
      }
}


mysqli_close($conn);
?>

</div>

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