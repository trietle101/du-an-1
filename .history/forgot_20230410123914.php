<?php
  session_start();
  ob_start();
  require './PDO/pdo.php';
  require './PDO/user.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';
  if(isset($_POST['forgot'])){
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $checkMail = check_email($email);
    if($checkMail == 0){
      function custom_uniqid() {
      $time = time();
      $ip = $_SERVER['REMOTE_ADDR'];
      $rand = mt_rand(0, 999999);
      return md5($time . $ip . $rand);
      }
      $_SESSION['code'] = substr(custom_uniqid(), 0, 8);

      $mail =  new PHPMailer(true);
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'robotpet2023@gmail.com';
        $mail -> Password = 'ceasbfjzewsajpiu';
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail -> Port = 587;


        $mail -> setFrom('robotpet2023@gmail.com' , 'Robot_Pet');
      $mail -> addAddress($email);
      $mail -> isHTML(true);
      $mail -> Subject = 'Forgot Password';
      $mail -> Body = 'Your account recovery confirmation code is: '. $_SESSION['code'];
      $mail -> send();
      header('Location: forgot.php?title=forgot');
    }else{
      $err = 'Email does not exist';
    }
  }
  if(isset($_POST['add-code'])){
    $code = $_POST['code'];
    if($code == $_SESSION['code']){
      header('Location: forgot.php?title=reset');
    }else{
     $err ='The code entered is incorrect';
    }
  }
  if(isset($_POST['reset'])){
    $pass = $_POST['pass'];
    $rePass = $_POST['re-pass'];
    if($pass == '' || $rePass == ''){
      $err = 'Do not leave blank';
    }else{
      if($pass == $rePass){
        updatePassword_email($_SESSION['email'], $pass);
        $cp = 'Change password successfully';
      }else{
        $err = 'New password does not match';
      }
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
      <?php
        if(isset($_GET['title']) && $_GET['title'] == 'forgot'){
          ?>
          <div class="form-container login-container">
            <form action="forgot.php?title=forgot" method="POST">
              <h1 class="title">Email Authentication</h1>
              <input id="login-email" type="text" placeholder="Code" name="code"/>
              <?php
                  if(isset($err) && $err != ''){
                    ?>
                    <p class="err"><?php echo $err ?></p>
                  <?php }?>
              <button type="submit" name="add-code" id="logins">Submit</button>
            </form>
          </div>
          <div class="overlay-container">
            <div class="overlay">
              <div class="overlay-panel overlay-right">
                <h1 class="title">
                Sorry <br />
                  You forgot password
                </h1>
                <p>
                  If you don't have an account yet, join us and start your journey.
                </p>
              </div>
            </div>
          </div>
        <?php }elseif(isset($_GET['title']) && $_GET['title'] == 'reset'){
          ?>
            <div class="form-container login-container">
              <form action="forgot.php?title=reset" method="POST">
                <h1 class="title">Reset Password</h1>
                <input id="login-email" type="password" placeholder="New Password" name="pass"/>
                <input id="login-email" type="password" placeholder="Re Password" name="re-pass"/>
                <?php
                  if(isset($err)){
                    echo '<p class="err">'.$err.'</p>';
                  }
                  if(isset($cp)){
                    echo '<p class="complete">'.$cp.'</p>';
                  }
                ?>
                <button type="submit" name="reset" id="logins">Submit</button>
                <div class="content">
                  <div class="checkbox">
                    <label for="Remember me">Come back</label>
                  </div>
                  <div class="pass-link">
                    <a href="./login.php">Login</a>
                  </div>
                </div>
              </form>
            </div>
            <div class="overlay-container">
              <div class="overlay">
                <div class="overlay-panel overlay-right">
                  <h1 class="title">
                  Sorry <br />
                    You forgot password
                  </h1>
                  <p>
                    If you don't have an account yet, join us and start your journey.
                  </p>
                </div>
              </div>
            </div>
        <?php }  else{
          ?>
            <div class="form-container login-container">
              <form action="forgot.php" method="POST">
                <h1 class="title">Forgot Password</h1>
                <input id="login-email" type="email" placeholder="Email" name="email"/>
                <?php
                  if(isset($err) && $err != ''){
                    ?>
                    <p class="err"><?php echo $err ?></p>
                  <?php }?>
                <button type="submit" name="forgot" id="logins">Submit</button>
                <div class="content">
                  <div class="checkbox">
                    <label for="Remember me">Come back</label>
                  </div>
                  <div class="pass-link">
                    <a href="./login.php">Login</a>
                  </div>
                </div>
              </form>
            </div>
            <div class="overlay-container">
              <div class="overlay">
                <div class="overlay-panel overlay-right">
                  <h1 class="title">
                  Sorry You
                  </h1>
                  <p>
                    If you forgot your password, please re-enter your email and we will help you recover
                  </p>
                </div>
              </div>
            </div>
        <?php }?>
    </div>
  </body>
  <script src="./assets/script/login.js"></script>
</html>
