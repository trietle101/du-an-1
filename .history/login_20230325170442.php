<?php
  session_start();
  ob_start();
  require './PDO/pdo.php';
  require './PDO/user.php';
  if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    $checkemail = check_email($email);
    $checkphone = check_phone($phone);
    if(strlen($phone) != 10){
      $phone_err = "Phone number must be 10 digits";
    }
    if(strlen($pass) < 6){
      $pass_err = "Pass must be at least 6 characters";
    }
    if($checkemail != 0){
      $email_err = "This email already exists";
    }
    if($checkphone != 0){
      $phone_err = "This phone number already exists";
    }
    if($pass != $re_pass){
      $pass_err = "Password does not match";
    }

    if(strlen($phone) == 10 && strlen($pass) >= 6 && $checkemail == 0 && $checkphone == 0 && $pass == $re_pass){
      insert_user($name, $email, $pass, $phone);
      
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/reset.css" />
    <link rel="stylesheet" href="./assets/css/login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
    <div class="container" id="container">
      <div class="form-container register-container">
        <form action="login.php" method="POST">
          <h1 class="title">Register here</h1>
          <input type="text" placeholder="Name" name="name" id="name"/>
          <input type="email" placeholder="Email" name="email" id="email"/>
          <input type="number" placeholder="Phone" name="phone" id="phone"/>
          <input type="password" placeholder="Password" name="pass" id="pass"/>
          <input type="password" placeholder="Re password" name="re_pass" id="re_pass" />
          <button type="submit" name="register" id="registers" >Register</button>
        </form>
      </div>

      <div class="form-container login-container">
        <form action="#">
          <h1 class="title">Login here</h1>
          <input type="email" placeholder="Email" />
          <input type="password" placeholder="Password" />
          <div class="content">
            <div class="checkbox">
              <input type="checkbox" name="checkbox" id="checkbox" />
              <label for="Remember me">Remember me</label>
            </div>
            <div class="pass-link">
              <a href="#">Forgot password?</a>
            </div>
          </div>
          <button><a class="login" href="./index.html">Login</a></button>
          <span>or use your account</span>
          <div class="social-container">
            <a href="#" class="social">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>

      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1 class="title">
              Hello <br />
              friends
            </h1>
            <p>If you already have an account login here and have fun.</p>
            <button class="ghost" id="login">
              Login <i class="fas fa-long-arrow-alt-left login"></i>
            </button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1 class="title">
              Start your <br />
              journey now
            </h1>
            <p>
              If you don't have an account yet, join us and start your journey.
            </p>
            <button class="ghost" id="register">
              Register <i class="fas fa-long-arrow-alt-right register"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="./assets/script/login.js"></script>
</html>
