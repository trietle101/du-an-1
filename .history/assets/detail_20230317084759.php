<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  $infoProduct = products_selectID_pd($_GET['id_pd']);
  $infoImage = images_selectID_product($_GET['id_pd']);
  $newProducts = products_new();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./detail.html" />
    <link rel="stylesheet" href="./css/detail.css" />
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
              <a href="../login.html" class="nav__link"
                ><i class="fa-solid fa-user"></i
              ></a>
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
    <section class="detail">
      <div class="container">
        <div class="detail-box">
          <div class="detail-image">
            <img
              src="<?php echo $infoProduct[0][4] ?>"
              alt=""
              class="detail-image-main"
              id="image-main"
            />
            <div class="detail-image-list">
              <img
                src="<?php echo $infoProduct[0][4] ?>"
                alt=""
                class="detail-image-item is-active"
              />
              <?php
                foreach ($infoImage as $item){
                  ?>
              <img
                src="<?php echo $item[1] ?>"
                alt=""
                class="detail-image-item"
              />
                <?php }?>
            </div>
          </div>
          <div class="detail-info">
            <h3 class="detail-info-name"><?php echo $infoProduct[0][1] ?></h3>
            <div class="detail-info-price">
              <span><?php echo $infoProduct[0][3] ?></span>
              <del><?php echo $infoProduct[0][2] ?></del>
            </div>
            <p class="detail-info-desc">
            <?php echo $infoProduct[0][5] ?>
            </p>
            <div class="detail-info-quantity">
              <button class="quantity-prev">
                <i class="fas fa-minus"></i>
              </button>
              <input type="number" name="" value="1" class="input-number" />
              <button class="quantity-next">
                <i class="fas fa-plus"></i>
              </button>
              <button class="detail-info-button">Add to cart</button>
            </div>
            <div class="dilital-info-icon">
              <i class="far fa-heart"></i> |
              <i class="far fa-envelope"></i>
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-twitter"></i>
            </div>
            <hr />
            <img
              src="././img/AI/img eillik/eilik 2.gif"
              alt=""
              class="detail-info-gif"
            />
          </div>
        </div>
      </div>
    </section>
    <section class="description">
      <div class="container">
        <div class="description-menu">
          <ul class="description-menu-list">
            <li class="description-menu-item active">Description</li>
            <li class="description-menu-item">Aditional Information</li>
            <li class="description-menu-item">Reviews</li>
            <li class="description-menu-item">Shipping Rates</li>
          </ul>
        </div>
        <hr />
        <div class="description-content">
          <p class="description-desc">
            Robot can provide many of the same benefits as real pets, such as
            reducing stress and loneliness, improving mood and mental health,
            and promoting physical activity...
          </p>
          <p class="description-desc">
            Overall, robot are an innovative solution for those who want the
            companionship and joy of owning a pet, but who may not have the
            time, space, or resources...
          </p>
        </div>
        <hr />
      </div>
    </section>
    <section class="outstanding">
      <div class="container">
        <div class="outstanding-product">
          <h2 class="outstanding-title">Here you can buy similar products</h2>
          <div class="outstanding-list">
          <?php
              foreach ($newProducts as $item){
                $id_pd = './assets/detail.php?id_pd='.$item[0];
                ?>
            <div class="outstanding-item">
              <div class="outstanding-main">
                <img
                  class="outstanding-image"
                  src="<?php echo $item[4] ?>"
                  alt=""
                />
                <div class="outstanding-content">
                  <ul class="outstanding-social">
                    <li class="outstanding-social-item">
                      <a class="outstanding-social-link" href="<?php echo $id_pd ?>"
                        ><i class="fas fa-search"></i
                      ></a>
                    </li>
                    <li class="outstanding-social-item">
                      <a class="outstanding-social-link" href="#"
                        ><i class="fas fa-cart-plus"></i
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
                  <h4 class="outstanding-name"><?php echo $item[2] ?></h4>
                  <div class="outstanding-price">
                    <span><?php echo $item[3] ?></span>
                    <del><?php echo $item[2] ?></del>
                  </div>
                </div>
              </div>
            </div>
              <?php } ?>
          </div>
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
      </div>
    </footer>
  </body>
  <script src="./script/script.js"></script>
  <script src="./script/detail.js"></script>
</html>
