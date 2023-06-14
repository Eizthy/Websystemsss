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
            <a href="#courses" class="navbar-link" data-nav-link>Courses</a>
          </li>
          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Contact</a>
          </li>
          <li class="navbar-item dropdown">
            <a href="#" class="navbar-link">Admin</a>
            <ul class="dropdown-content">
              <li><a href="add.php">Add Course</a></li>
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
include ('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Delete news function
  if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    echo '
    <script>
      var confirmed = confirm("Are you sure you want to delete this?");
      if (confirmed) {
        // Delete the news
        window.location.href = "delete-news.php?id=' . $id . '";
      } else {
      }
    </script>';
  } 

  // Update news function
  if (isset($_POST['update'])) {
    $level = $_POST['level'];
    $course = $_POST['course'];
    $price = $_POST['price'];
    $lessons = $_POST['lessons'];
    $students = $_POST['students'];
    $id = $_POST['id'];
    
    $sql = "UPDATE `data` SET level='$level', course='$course', price='$price', lessons='$lessons', students='$students' WHERE id=$id";
    $result = mysqli_query($conn, $sql) or die('Error querying database.');
    
    if ($result) {
      echo '<script> alert("Successfully updated the news."); window.location.href = "admin.php"; </script>';
    }
  }
}

$query = "SELECT * FROM `data`";
$result = mysqli_query($conn, $query); 

while ($row = mysqli_fetch_array($result)) {
  echo "<form method='POST' action='admin.php'> <!-- Update the action attribute to point to 'admin.php' -->
      <label for='level'>Level:</label>
      <select id='level' name='level' style='font-size: 15px;'>
        <option value='". $row['level']. "'>" . $row['level'] . "</option>
        <option value='Beginner'>Beginner</option>
        <option value='Intermediate'>Intermediate</option>
        <option value='Advanced'>Advanced</option>
      </select>
      <br><br>
      <label for='CourseTitle' style='display: inline-block; margin-right: 10px;'>Course Title:</label>
      <input type='text' id='CourseTitle' name='course' value='".$row['course']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>
      <label for='price' style='display: inline-block; margin-right: 10px;'>Price:</label>
      <input type='text' id='price' name='price' value='".$row['price']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>
      <label for='lessons' style='display: inline-block; margin-right: 10px;'>Lesson:</label>
      <input type='text' id='lessons' name='lessons' value='".$row['lessons']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>
      <label for='students' style='display: inline-block; margin-right: 10px;'>Student:</label>
      <input type='text' id='students' name='students' value='".$row['students']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;'>
      <br><br>

      <div style='display: flex; justify-content: flex-start; gap: 10px;'>
        <button type='button' style='border: 1px solid gray;'>Undo</button>
        <button type='submit' name='update' style='border: 1px solid gray;'>Save</button>
        <button type='submit' name='delete' style='border: 1px solid gray;'>Delete</button>
        <input type='hidden' name='id' value='".$row['id']."'>
      </div>

  </form>";
}
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