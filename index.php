<?php

include'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION["user_id"])) {
  header("Location: fill_facture.php");
}

if(isset($_POST['signup'])){
    $full_name = mysqli_real_escape_string($conn, $_POST['signup_full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['signup_email']);
    $password = mysqli_real_escape_string($conn, $_POST['signup_password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['signup_cpassword']);

    $check_email = mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email= '$email' "));

    if($password !== $cpassword){
        echo "<script> alert('Password did not match');</script>";
    }
    elseif ($check_email > 0) {
        echo "<script> alert('Email already exist in our database'); </script>";
    }
    else{
        $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result){ 
          $_POST['signup_full_name'] = "";
          $_POST['signup_email'] = "";
          $_POST['signup_password'] = "";
          $_POST['signup_cpassword'] = "";
          echo "<script> alert('User registration succesfully'); </script>";
        }
        else{
          echo "<script> alert('User registration failed'); </script>";
        }
    }
}
if(isset($_POST['signin'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $check_email = mysqli_query($conn,"SELECT id FROM users WHERE email= '$email' AND password = '$password' ");

    if(mysqli_num_rows($check_email) > 0){
        $row = mysqli_fetch_assoc($check_email);
        $_SESSION["user_id"] = $row['id'];
        header("Location: next.php");
    }
    else{
        echo "<script> alert('Login details incorrect try again');</script";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="POST" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Email" required name="email" value="<?php echo $_POST['email']; ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" required name="password" value="<?php echo $_POST['password']; ?>" />
            </div>
            <input type="submit" value="Login" class="btn solid" name="signin" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <form action="" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="full name" name="signup_full_name" required value="<?php echo $_POST['signup_full_name']; ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="signup_email" required value="<?php echo $_POST['signup_email']; ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="signup_password" required value="<?php echo $_POST['signup_password']; ?>" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="signup_cpassword" required value="<?php echo $_POST['signup_cpassword']; ?>" />
            </div>
            <input type="submit" class="btn" name="signup" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Connexion ?</h3>
            <p><i>
              Bienvenue sur impriMORE le meilleur Platform d'impression à distance, veiller vous connecter
            </i></p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Eté vous nouveaux ?</h3>
            <p><i>
              Bienvenue sur impriMORE le meilleur Platform d'impression à distance, veiller crée un compte
            </i></p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
