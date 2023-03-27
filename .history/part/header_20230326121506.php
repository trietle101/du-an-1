<?php
  session_start();
  ob_start();
  if(isset($_SESSION['cart'])){
    $_SESSION['qty'] = count($_SESSION['cart']);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ROBO PET</title>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="./css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/08ee78edd1.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header class="header">
      <div class="container">
        <nav class="header-nav">
          <div class="container-fixed">
            <a href="#" class="header-logo">
              <img src="./img/logo.png" />
              <span>ROBO PET</span>
            </a>
            <i class="fas fa-bars header-toggle"></i>
            <div class="header-menu">
              <ul class="nav__list">
                <li class="nav__item">
                  <a href="../index.php" class="nav__link">Home</a>
                </li>
                <li class="nav__item">
                  <a href="./about.php" class="nav__link">About</a>
                </li>
                <li class="nav__item">
                  <a href="./shop.php" class="nav__link">Robo shop</a>
                </li>
                <li class="nav__item">
                  <a href="./blog.php" class="nav__link">Blogs</a>
                </li>
                <li class="nav__item">
                  <a href="./contact.php" class="nav__link">Contact</a>
                </li>
              </ul>
              <ul class="nav__list">
                <li class="nav__item">
                  <a href="" class="nav__links"
                    ><i class="fa-solid fa-magnifying-glass"></i
                  ></a>
                </li>
                <li class="nav__item">
                  <a href="./cart.php" class="nav__links">
                    <i class="fa-solid fa-cart-shopping absolute">
                      <?php  
                      if(isset($_SESSION['cart'])){
                        ?>
                      <span><?php echo $_SESSION['qty'] ?></span>
                      <?php }else{
                        ?>
                      <span>0</span>
                        <?php }?>
                    </i>
                  </a>
                </li>
                <?php
                  if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
                    ?>
                  <li class="nav__item">
                    <a href="./login.html" class="nav__links"
                      ><?php echo $_SESSION['name'] ?></i
                    ></a>
                  </li>
                  <?php }else{
                    ?>
                      <li class="nav__item">
                        <a href="./login.php" class="nav__links"
                          ><i class="fa-solid fa-user"></i
                        ></a>
                      </li>
                  <?php }?>
              </ul>
            </div>
          </div>
        </nav>
      </div>