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
  <link rel="stylesheet" href="./assets/css/admin.css">


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="preload" as="image" href="./assets/images/hero-bg.svg">


</head>

<body id="top" style="padding-top: 100px;">

  <!-- 
    - #HEADER
  -->

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
            <a href="#" class="navbar-link" data-nav-link>Home</a>
          </li>
          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Courses</a>
          </li>
          <li class="navbar-item">
            <a href="#" class="navbar-link" data-nav-link>Contact</a>
          </li>
          <li class="navbar-item dropdown">
            <a href="#" class="navbar-link">Admin</a>
            <ul class="dropdown-content">
              <li><a href="add.php">Add Course</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <?php
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      ?>
      <div class="header-actions"></div>
        <!-- <a href="login.php" class="btn has-before">
          <span class="span">Try for free</span>
          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </a> -->
      </div>
      <?php
        }
      ?>
      <div class="header-actions">
      <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>
</div>
<div class="overlay" data-nav-toggler data-overlay></div>
</div>
</header>

<!-- CRUD functions in admin page -->
<div class="admin-container">
  <div class="admin-content">
    <?php
    include ('connection.php');

    $originalValues = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Delete courses function
      if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        // Update the database values to 'N/A'
        $sql = "UPDATE `data` SET level='N/A', course='N/A', price='N/A', lessons='N/A', students='N/A' WHERE id=$id";
        $result = mysqli_query($conn, $sql) or die('Error querying database.');

        if ($result) {
          echo '<script> alert("Successfully deleted the data."); window.location.href = "admin.php"; </script>';
        }
      }

      // Update or insert data function
      if (isset($_POST['update'])) {
        $level = $_POST['level'];
        $course = $_POST['course'];
        $price = $_POST['price'];
        $lessons = $_POST['lessons'];
        $students = $_POST['students'];
        $id = $_POST['id'];

        if ($id != '') {
          // Update existing data
          $query = "SELECT * FROM `data` WHERE id=$id";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_array($result);
          $originalValues[$id] = $row;

          $sql = "UPDATE `data` SET level='$level', course='$course', price='$price', lessons='$lessons', students='$students' WHERE id=$id";
        } else {
          // Insert new data
          $sql = "INSERT INTO `data` (level, course, price, lessons, students) VALUES ('$level', '$course', '$price', '$lessons', '$students')";
        }

        $result = mysqli_query($conn, $sql) or die('Error querying database.');

        if ($result) {
          if ($id != '') {
            echo '<script> alert("Successfully updated the data."); window.location.href = "admin.php"; </script>';
          } else {
            echo '<script> alert("Successfully inserted new data."); window.location.href = "admin.php"; </script>';
          }
        }
      }
    }

    if (isset($_POST['undo'])) {
      $id = $_POST['id'];

      // Check if original values exist for the given ID
      if (isset($originalValues[$id])) {
        // Retrieve the original values
        $originalRow = $originalValues[$id];

        // Update the database with the original values
        $sql = "UPDATE `data` SET level='" . $originalRow['level'] . "', course='" . $originalRow['course'] . "', price='" . $originalRow['price'] . "', lessons='" . $originalRow['lessons'] . "', students='" . $originalRow['students'] . "' WHERE id=$id";
        $result = mysqli_query($conn, $sql) or die('Error querying database.');

        if ($result) {
          echo '<script> alert("Changes undone."); window.location.href = "admin.php"; </script>';
        }
      }
    }
      
// form where update, delete funcations
    $query = "SELECT * FROM `data`";
    $result = mysqli_query($conn, $query); 

    while ($row = mysqli_fetch_array($result)) {
      echo "<form method='POST' action='admin.php'> 
          <label for='level'>Level:</label>
          <select id='level' name='level' style='font-size: 15px;'>
            <option value='". $row['level']. "'>" . $row['level'] . "</option>
            <option value='Beginner'>Beginner</option>
            <option value='Intermediate'>Intermediate</option>
            <option value='Advanced'>Advanced</option>
          </select>
          <br><br>
          <label for='CourseTitle' style='display: inline-block; margin-right: 10px;'>Course Title:</label>
          <input type='text' id='CourseTitle' name='course' value='".$row['course']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;' require>
          <br><br>
          <label for='price' style='display: inline-block; margin-right: 10px;'>Price:</label>
          <input type='text' id='price' name='price' value='".$row['price']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;' require>
          <br><br>
          <label for='lessons' style='display: inline-block; margin-right: 10px;'>Lesson:</label>
          <input type='text' id='lessons' name='lessons' value='".$row['lessons']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;' require>
          <br><br>
          <label for='students' style='display: inline-block; margin-right: 10px;'>Student:</label>
          <input type='text' id='students' name='students' value='".$row['students']."' style='width: 300px; border: 1px solid #ccc; display: inline-block;' require>
          <br><br>

          <div style='display: flex; justify-content: flex-start; gap: 10px;'>
        <button class='btn_undo'type='submit' name='undo' >Undo</button>
        <button class='btn_save'type='submit' name='update'>Save</button>
        <button class='btn_del'type='submit' name='delete' >Delete</button>
        <input type='hidden' name='id' value='".$row['id']."'>
      </div>

      <div class='black-line' style='height: 1px; background-color: black; margin: 10px 0;'></div>

      </form>";
    }
    ?>
    </div>
    </div>

</div>

<div>
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