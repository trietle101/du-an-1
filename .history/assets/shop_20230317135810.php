<?php
    require '../PDO/pdo.php';
    require '../PDO/products.php';
    require '../PDO/images.php';
    require '../PDO/cate.php';
    $db = new PDO("mysql:host=localhost:3308;dbname=robot_pet","root","");
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * 12;
    $id = isset($_GET['id_pd']) ? $_GET['id_pd']:'all';
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="./script/slider.js"></script>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
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
            <a href="../index.php" class="header-logo">
              <img src="./img/logo.png" />
              <span>ROBO PET</span>
            </a>
            <a href="#" class="nav__link header-toggle">
              <i class="fas fa-bars"></i>
            </a>
            <ul class="nav__list">
              <li class="nav__item">
                <a href="../index.php" class="nav__link active">Home</a>
              </li>
              <li class="nav__item">
                <a href="./assets/about.html" class="nav__link">About</a>
              </li>
              <li class="nav__item">
                <a href="./assets/shop.php" class="nav__link">Robo shop</a>
              </li>
              <li class="nav__item">
                <a href="./assets/blog.html" class="nav__link">Blogs</a>
              </li>
              <li class="nav__item">
                <a href="./assets/contact.html" class="nav__link">Contact</a>
              </li>
            </ul>
            <ul class="nav__list">
              <li class="nav__item">
                <a href="" class="nav__link"
                  ><i class="fa-solid fa-magnifying-glass"></i
                ></a>
              </li>
              <li class="nav__item">
                <a href="./assets/cart.html" class="nav__link absolute">
                  <i class="fa-solid fa-cart-shopping"></i>
                  <span>0</span>
                </a>
              </li>
              <li class="nav__item">
                <a href="./login.html" class="nav__link"
                  ><i class="fa-solid fa-user"></i
                ></a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <div class="header-banner">
        <div class="container">
          <h1 class="banner-title">Our Shop</h1>
        </div>
      </div>
    </header>
    <section class="products">
      <div class="container">
        <div class="products-product">
          <div class="products-title">
            <h2 class="products-title-left">Products</h2>
            <div class="products-title-right">
                <div class="dropdown">
                    <div class="dropdown__select">
                      <span class="dropdown__selected">Shorting By</span>
                      <i class="fa fa-caret-down dropdown__caret"></i>
                    </div>
                    <ul class="dropdown__list">
                      <?php

                      ?>
                        <a href="<?php echo '../assets/shop.php?id_pd=2' ?>" class="dropdown__item dropdown__text">Emo</a>
                        <a href="<?php echo '../assets/shop.php?id_pd=1' ?>" class="dropdown__item dropdown__text">Eilik</a>
                        <a href="<?php echo '../assets/shop.php?id_pd=3' ?>" class="dropdown__item dropdown__text">Vector</a>
                        <a href="<?php echo '../assets/shop.php?id_pd=4' ?>" class="dropdown__item dropdown__text">Accessories</a>
                        <a href="<?php echo '../assets/shop.php' ?>" class="dropdown__item dropdown__text">All</a>
                    </ul>
                  </div>
            </div>
          </div>
          <hr />
          <div class="products-list">
          <?php
            if(isset($_GET['id_pd'])){
              $productsCate = products_selectID_cate($_GET['id_pd']);
              ?>
              <?php
                    foreach($productsCate as $item){
                      ?>
                      <div class="products-item">
                        <div class="products-main">
                          <img
                            class="products-image"
                            src="<?php echo $item[4] ?>"
                            alt=""
                          />
                          <div class="products-content">
                            <ul class="products-social">
                              <li class="products-social-item">
                                <a class="products-social-link" href="<?php echo $id_pd ?>"
                                  ><i class="fas fa-search"></i
                                ></a>
                              </li>
                              <li class="products-social-item">
                                <a class="products-social-link" href="#"
                                  ><i class="fas fa-cart-plus"></i
                                ></a>
                              </li>
                              <li class="products-social-item">
                                <a class="products-social-link" href="#"
                                  ><i class="fas fa-heart"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                          <div class="products-info">
                            <h4 class="products-name"><?php echo $item[1] ?></h4>
                            <div class="products-price">
                              <span>$<?php echo $item[3] ?></span>
                              <del>$<?php echo $item[2] ?></del>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                <?php } else{
                  $stml = $db ->query("select * from products limit 12 offset " . $offset);
                  $products = $stml -> fetchAll(PDO::FETCH_NUM);
                  ?>
                  <?php
              foreach($products as $item){
                $id_pd = '../assets/detail.php?id_pd='.$item[0];
                ?>
            <div class="products-item">
              <div class="products-main">
                <img
                  class="products-image"
                  src="<?php echo $item[4] ?>"
                  alt=""
                />
                <div class="products-content">
                  <ul class="products-social">
                    <li class="products-social-item">
                      <a class="products-social-link" href="<?php echo $id_pd ?>"
                        ><i class="fas fa-search"></i
                      ></a>
                    </li>
                    <li class="products-social-item">
                      <a class="products-social-link" href="#"
                        ><i class="fas fa-cart-plus"></i
                      ></a>
                    </li>
                    <li class="products-social-item">
                      <a class="products-social-link" href="#"
                        ><i class="fas fa-heart"></i
                      ></a>
                    </li>
                  </ul>
                </div>
                <div class="products-info">
                  <h4 class="products-name"><?php echo $item[1] ?></h4>
                  <div class="products-price">
                    <span>$<?php echo $item[3] ?></span>
                    <del>$<?php echo $item[2] ?></del>
                  </div>
                </div>
              </div>
            </div>
              <?php }?>
                <?php }?>
          </div>
        </div>
      </div>
    </section>
    <section class="pagination">
      <div class="container">
        <div class="pagination-list">
          <?php
            $all = $db->query("SELECT * FROM products");
            if($page >= 2){
              echo ' <a href="?page=' . $page - 1 . '" class="prev"
              ><i class="fas fa-chevron-left"></i></a>';
            }
            for($i = 1; $i <= ceil($all->rowCount() / 12); $i++){
              echo '<a href="?page=' . $i . '" class="page'. ($i == $page? 'active': '').'">' . $i . '</a>';
              
            }
            if ($page >= 1 && $page < ceil($all->rowCount() / 12)) {
              echo '<a href="?page=' . $page + 1 . '" class="next"
              ><i class="fas fa-angle-right"></i></i
            ></a>';
            }
          ?>
        </div>
      </div>
    </section>
    <section class="versatile">
        <div class="container">
          <img src="././img/Shapes.png" alt="" class="versatile-bg" />
          <h2 class="versatile-title">
            Versatile Interaction Experience <br />
            with Eilik, Emo, and Vector
          </h2>
          <p class="versatile-desc">Intelligent Robots for Home and Education</p>
          <div class="versatile-bottom">
            <button class="versatile-button">View now</button>
          </div>
        </div>
      </section>
      <footer class="footer">
      <div class="container">
        <div class="footer-list">
          <div class="footer-logo">
            <img src="./assets/img/logo.png" alt="" />
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
    <script src="././script/script.js"></script>
    <script src="././script/shop.js"></script>
  </body>
</html>
