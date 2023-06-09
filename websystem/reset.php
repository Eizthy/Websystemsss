
<!doctype html>
<html lang="en">

<head>
  <title>Forgot Password</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>


  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="login.png" class="img-fluid" alt="Phone image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
    <form action="resetpass.php" method="post">
        <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Reset your password</p>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="email"><i class="bi bi-envelope-fill"></i> Email</label>
            <input type="text" id="username" class="form-control form-control-lg py-3" name="username" autocomplete="off" placeholder="Enter your username" style="border-radius: 25px;" required >
        </div>

        <!-- New Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="new_password"><i class="bi bi-chat-left-dots-fill"></i> New Password</label>
            <input type="password" id="new_password" class="form-control form-control-lg py-3" name="new_password" autocomplete="off" placeholder="Enter your new password" style="border-radius: 25px;">
        </div>

        <!-- Confirm New Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="confirm_password"><i class="bi bi-chat-left-dots-fill"></i> Confirm Password</label>
            <input type="password" id="confirm_password" class="form-control form-control-lg py-3" name="confirm_password" autocomplete="off" placeholder="Confirm your new password" style="border-radius: 25px;">
        </div>

        <!-- Submit button -->
        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <input type="submit" value="Change Password" name="reset" class="btn btn-warning btn-lg text-light my-2 py-3" style="width: 100%; border-radius: 30px; font-weight: 600;">
        </div>

          </form><br>
          <p align="center">I don't have any account. <a href="register.php" class="text-warning" style="font-weight:600;text-decoration:none;">Register Here.</a></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>