<?php
    require '../PDO/pdo.php';
    require '../PDO/products.php';
    require '../PDO/images.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * 12;
    $products = products_select_limit_12($offset);
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
    <link rel="stylesheet" href="./css/shop.css" />
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
          <a href="#" class="header-logo">
            <img src="./img/logo.png" />
            <span>ROBO PET</span>
          </a>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="../index.html" class="nav__link">Home</a>
            </li>
            <li class="nav__item">
              <a href="./about.html" class="nav__link">About</a>
            </li>
            <li class="nav__item">
              <a href="./shop.html" class="nav__link active">Robo shop</a>
            </li>
            <li class="nav__item">
              <a href="./blog.html" class="nav__link">Blogs</a>
            </li>
            <li class="nav__item">
              <a href="./contact.html" class="nav__link">Contact</a>
            </li>
          </ul>

          <ul class="nav__list">
            <li class="nav__item">
              <a href="" class="nav__link"
                ><i class="fa-solid fa-magnifying-glass"></i
              ></a>
            </li>
            <li class="nav__item">
              <a href="./cart.html" class="nav__link absolute">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>0</span>
              </a>
            </li>
            <li class="nav__item">
              <a href="../login.html" class="nav__link"><i class="fa-solid fa-user"></i></a>
            </li>
          </ul>
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
                      <li class="dropdown__item">
                        <span class="dropdown__text">Emo</span>
                      </li>
                      <li class="dropdown__item">
                        <span class="dropdown__text">Eilik</span>
                      </li>
                      <li class="dropdown__item">
                        <span class="dropdown__text">Vector</span>
                      </li>
                    </ul>
                  </div>
            </div>
          </div>
          <hr />
          <div class="products-list">
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
                    <span><?php echo $item[3] ?></span>
                    <del><?php echo $item[2] ?></del>
                  </div>
                </div>
              </div>
            </div>
              <?php }?>
          </div>
        </div>
      </div>
    </section>
    <section class="pagination">
      <div class="container">
        <div class="pagination-list">
          <a href="#" class="prev"
            ><i class="fas fa-chevron-left"></i></a>
          <a href="#" class="page">1</a>
          <a href="#" class="page active">2</a>
          <a href="#" class="page">3</a>
          <a href="#" class="page">4</a>
          <a href="#" class="page">5</a> ...
          <a href="#" class="next"
            ><i class="fas fa-angle-right"></i></i
          ></a>
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
      <footer>
        <div class="container">
          <div class="footer">
            <section class="footer-content">
              <img src="././img/logo.png" alt="" />
              <span>ROBO PET</span>
            </section>
            <section class="footer-content">
              <h3>Company</h3>
              <a href="#">about</a>
              <a href="#">work</a>
              <a href="#">careers</a>
              <a href="#">pricing</a>
              <a href="#">blog</a>
            </section>
            <section class="footer-content">
              <h3>Services</h3>
              <a href="#">branding</a>
              <a href="#">websites</a>
              <a href="#">development</a>
              <a href="#">strategy</a>
              <a href="#">platforms</a>
            </section>
            <section class="footer-content">
              <h3>Contact</h3>
              <a href="#">help desk</a>
              <a href="#">docs</a>
              <a href="#">open a ticket</a>
              <a href="#">chat</a>
              <a href="#">forum</a>
            </section>
            <section class="footer-content">
              <h3>Newsletter</h3>
              <p>
                Subscribe to our newsletter to keep up to date on our marketing,
                website, design services, and tips.
              </p>
              <fieldset class="form">
                <input type="email" name="newsletter" placeholder="Enter email" />
                <button>Submit</button>
              </fieldset>
              <p>
                We hate spam as much as you do. We will never, ever send you such
                emails.
              </p>
            </section>
          </div>
          <div class="footer">
            <section class="footer-content">
              <p>
                © 2023 Robot AI. All Rights Reserved. Terms & Conditions. Privacy
                Policy.
              </p>
            </section>
            <section class="footer-content">
              <a href="#"><i class="fa fa-facebook fa-xl"></i></a>
              <a href="#"><i class="fa fa-twitter fa-xl"></i></a>
              <a href="#"><i class="fa fa-linkedin fa-xl"></i></a>
            </section>
          </div>
        </div>>
      </footer>

    <script src="././script/script.js"></script>
    <script src="././script/shop.js"></script>
  </body>
</html>
