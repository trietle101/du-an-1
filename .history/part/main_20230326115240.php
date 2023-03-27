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
              <a class="banner-button-item">
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
                src="./assets/img/AI/img emo/emo.png"
                alt=""
                class="banner-image-item banner-image-item-1"
              />
              <img
                src="./assets/img/AI/img eillik/Frame_1__98_-removebg-preview.png"
                alt=""
                class="banner-image-item banner-image-item-2"
              />
              <img
                src="./assets/img/AI/img vector/Frame_1__84_-removebg-preview.png"
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
          <h2 class="outstanding-title">Outstanding</h2>
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
            <img src="assets/img/brand/enegize.png" alt="" />
            <img src="assets/img/brand/living3.png" alt="" />
            <img src="assets/img/brand/Anki.png" alt="" />
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
                $id_pd = './assets/details.php?id_pd='.$item[0];
                ?>
              <div class="custum-item">
                <div class="custum-main">
                  <img
                    class="custum-image"
                    src="<?php echo $item[4]?>"
                    alt=""
                  />
                  <div class="custum-content">
                    <ul class="custum-social">
                      <li class="custum-social-item">
                        <a class="custum-social-link" href="<?php echo $id_pd ?>"
                          ><i class="fas fa-search"></i
                        ></a>
                      </li>
                      <li class="custum-social-item">
                        <a class="custum-social-link" href="#"
                          ><i class="fas fa-cart-plus"></i
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
          <img src="assets/img/Inteligent/eilik1.gif" alt="" />
          <img src="assets/img/Inteligent/giphy2.gif" alt="" />
        </div>
        <div class="intelligent-bottom">
          <img src="assets/img/Inteligent/intenlen3.gif" alt="" />
        </div>
      </div>
    </section>
    <section class="versatile">
      <div class="container">
        <img src="./assets/img/Shapes.png" alt="" class="versatile-bg" />
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