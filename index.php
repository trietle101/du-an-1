<?php
  session_start();
  ob_start();
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  $newProducts = products_new();
  $productCostumes = products_selectID_cate(4);
  if(isset($_SESSION['cart'])){
    $_SESSION['qty'] = count($_SESSION['cart']);
  }
  if(isset($_GET['id_user'])){
    unset($_SESSION['id_user']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ROBO PET</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png">
    <link rel="stylesheet" href="assets/css/reset.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
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
            <a href="./index.php" class="header-logo">
              <img src="assets/img/logo.png" />
              <span>ROBO PET</span>
            </a>
            <i class="fas fa-bars header-toggle"></i>
            <div class="header-menu">
              <ul class="nav__list">
                <li class="nav__item">
                  <a href="./index.php" class="nav__link active">Home</a>
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
                  <li class="nav__item dropdown">
                    <div class="dropdown__user">
                      <span class="nav__links"
                        ><?php echo $_SESSION['name'] ?></i
                      ></span>
                    </div>
                    <ul class="dropdown__list">
                        <a href="<?php echo './profile.php' ?>" class="dropdown__item dropdown__text dropdown__width"><i class="fas fa-house-user"></i></a>
                        <a href="<?php echo './index.php?id_user='.$_SESSION['id_user'] ?>" class="dropdown__item dropdown__text dropdown__width"><i class="fas fa-sign-out-alt"></i></a>
                    </ul>
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
        <div class="banner">
          <div class="banner-info">
            <h1 class="banner-heading">
              WELCOME TO<br />
              THE <span>ROBO PET</span>
            </h1>
            <p class="banner-desc">
              With the learning and artificial intelligence features, Robo has
              the ability to become smarter when talking and interacting with
              humans over time.
            </p>
            <div class="banner-button">
              <a href="./shop.php" class="banner-button-item">
                <button>Shop now</button>
              </a>
              <a class="banner-button-item">
                <button>
                  <i class="video fa-regular fa-circle-play"></i>
                  Request demo
                </button>
              </a>
            </div>
            <div class="banner-user">
              <div class="banner-user-item">
                <h4 class="banner-user-title">40k+</h4>
                <span class="banner-user-name">Happy User</span>
              </div>
              <div class="banner-user-item">
                <h4 class="banner-user-title">12k+</h4>
                <span class="banner-user-name">Active User</span>
              </div>
              <div class="banner-user-item">
                <h4 class="banner-user-title">2k</h4>
                <span class="banner-user-name">Online User</span>
              </div>
            </div>
          </div>
          <div class="banner-slider">
            <div class="banner-image">
              <img
                src="assets/img/AI/img emo/emo.png"
                alt=""
                class="banner-image-item banner-image-item-1"
              />
              <img
                src="assets/img/AI/img eillik/Frame_1__98_-removebg-preview.png"
                alt=""
                class="banner-image-item banner-image-item-2"
              />
              <img
                src="assets/img/AI/img vector/Frame_1__84_-removebg-preview.png"
                alt=""
                class="banner-image-item banner-image-item-3"
              />
              <div class="banner-shadow"></div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section class="outstanding">
      <div class="container">
        <div class="outstanding-product">
          <h2 class="outstanding-title">Latest releases</h2>
          <div class="outstanding-list">
            <?php
              foreach ($newProducts as $item){
                $id_pd = './detail.php?id_pd='.$item[0];
                ?>
            <div class="outstanding-item">
              <div class="outstanding-main">
                <img
                  class="outstanding-image"
                  src="<?php echo $item[4] ?>"
                  alt=""
                />
                <?php
                  if($item[8] == 0){
                    ?>
                    <img
                      class="products-expired"
                      src=".assets/img/expired.png"
                      alt=""
                    />
                <?php }?>
                <div class="outstanding-content">
                  <ul class="outstanding-social">
                    <li class="outstanding-social-item">
                      <a class="outstanding-social-link" href="<?php echo $id_pd ?>"
                        ><i class="fas fa-search"></i
                      ></a>
                    </li>
                    <li class="outstanding-social-item">
                      <a class="outstanding-social-link" href="#"
                        ><i class="fas fa-heart"></i
                      ></a>
                    </li>
                  </ul>
                </div>
                <div class="outstanding-info">
                  <h4 class="outstanding-name"><?php echo $item[1] ?></h4>
                  <div class="outstanding-price">
                    <span>$<?php echo $item[3] ?></span>
                    <del>$<?php echo $item[2] ?></del>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <section class="brand">
      <div class="container">
        <h4 class="brand-tilte">
          Working with the most trusted brands in the industry
        </h4>
      </div>
      <div class="brand-bg">
        <div class="container">
          <div class="brand-logo">
            <img src="img/brand/enegize.png" alt="" />
            <img src="img/brand/living3.png" alt="" />
            <img src="img/brand/Anki.png" alt="" />
          </div>
        </div>
      </div>
    </section>
    <section class="custum">
      <div class="container">
        <div class="custum-product">
          <h2 class="custum-title">Robot costumes</h2>
          <div class="custum-list">
            <?php
              foreach ($productCostumes as $item){
                $id_pd = './detail.php?id_pd='.$item[0];
                ?>
              <div class="custum-item">
                <div class="custum-main">
                  <img
                    class="custum-image"
                    src="<?php echo $item[4]?>"
                    alt=""
                  />
                  <?php
                  if($item[8] == 0){
                    ?>
                    <img
                      class="products-expired"
                      src=".assets/img/expired.png"
                      alt=""
                    />
                  <?php }?>
                  <div class="custum-content">
                    <ul class="custum-social">
                      <li class="custum-social-item">
                        <a class="custum-social-link" href="<?php echo $id_pd ?>"
                          ><i class="fas fa-search"></i
                        ></a>
                      </li>
                      <li class="custum-social-item">
                        <a class="custum-social-link" href="#"
                          ><i class="fas fa-heart"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                  <div class="custum-info">
                    <h4 class="custum-name"><?php echo $item[1] ?></h4>
                    <div class="custum-price">
                      <span>$<?php echo $item[3]?></span>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>
          </div>
        </div>
      </div>
    </section>
    <section class="intelligent">
      <div class="container">
        <h4 class="intellegent-title">
          Intelligent Interaction with Emo,<br />
          Eilik, and Vector
        </h4>
        <div class="intelligent-top">
          <img src="img/Inteligent/eilik1.gif" alt="" />
          <img src="img/Inteligent/giphy2.gif" alt="" />
        </div>
        <div class="intelligent-bottom">
          <img src="img/Inteligent/intenlen3.gif" alt="" />
        </div>
      </div>
    </section>
    <section class="versatile">
      <div class="container">
        <img src="assets/img/Shapes.png" alt="" class="versatile-bg" />
        <h2 class="versatile-title">
          Versatile Interaction Experience <br />
          with Eilik, Emo, and Vector
        </h2>
        <p class="versatile-desc">Intelligent Robots for Home and Education</p>
        <div class="versatile-bottom">
          <a href="./shop.php" class="versatile-button">View now</a>
        </div>
      </div>
    </section>
    <footer class="footer">
      <div class="container">
        <div class="footer-list">
          <div class="footer-logo">
            <img src="assets/img/logo.png" alt="" />
            <h5>ROBO PET</h5>
          </div>
          <div class="footer-center">
            <ul class="footer-center-item">
              <h5 class="footer-center-title">Support</h5>
              <li class="footer-center-link">
                <a href="#">Contact Us</a>
              </li>
              <li class="footer-center-link">
                <a href="#">Policy</a>
              </li>
            </ul>
            <ul class="footer-center-item">
              <h5 class="footer-center-title">About Us</h5>
              <li class="footer-center-link">
                <a href="#">Robopet.ai</a>
              </li>
              <li class="footer-center-link">
                <a href="#">Living.ai</a>
              </li>
              <li class="footer-center-link">
                <a href="#">Energizelab.com</a>
              </li>
            </ul>
            <ul class="footer-center-item">
              <h5 class="footer-center-title">Follow Us</h5>
              <li class="footer-center-link">
                <a href="#">Facebook</a>
              </li>
              <li class="footer-center-link">
                <a href="#">Twitter</a>
              </li>
              <li class="footer-center-link">
                <a href="#">Youtubbe</a>
              </li>
              <li class="footer-center-link">
                <a href="#">Instagram</a>
              </li>
            </ul>
          </div>
          <div class="footer-right">
            <h5 class="footer-right-title">Newsletter</h5>
            <p>
              Subscribe to our newsletter to keep up to date on our marketing,
              website, design services, and tips.
            </p>
            <form class="footer-right-form">
              <input type="email" name="newsletter" placeholder="Enter email" />
              <button>Submit</button>
            </form>
            <p>
              We hate spam as much as you do. We will never, ever send you such
              emails.
            </p>
          </div>
        </div>
        <hr />
        <div class="footer-bottom">
          <p class="footer-bottom-info">
            © 2023 Robot AI. All Rights Reserved. Terms & Conditions. Privacy
            Policy.
          </p>
          <ul class="footer-bottom-icon">
            <li>
              <a href="#"><i class="fa fa-facebook fa-xl"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-twitter fa-xl"></i></a>
            </li>
            <li>
              <a href="#"><i class="fa fa-linkedin fa-xl"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    <script src="assets/script/script.js"></script>
  </body>
</html>
