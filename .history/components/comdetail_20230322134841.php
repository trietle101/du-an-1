<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  $infoProduct = products_selectID_pd($_GET['id_pd']);
  $infoImage = images_selectID_product($_GET['id_pd']);
  $newProducts = products_new();
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}
  if(isset($_POST['add-to-cart'])){
    $product_id = $_POST['id_pd'];
    $total =$_POST['total'];
    if(array_key_exists($product_id, $_SESSION['cart'])){
      $_SESSION['cart'][$product_id]['quantity'] += $_POST['quantity'];
      $_SESSION['cart'][$product_id]['total'] += $total;
    }else{
      $_SESSION['cart'][$product_id] = array('id_pd' => $product_id, 'quantity' => $_POST['quantity'] ,'total' => $total);
    }
  }
  $_SESSION['qty'] = count($_SESSION['cart']);
?>
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
              <span>$<?php echo $infoProduct[0][3] ?></span>
              <del>$<?php echo $infoProduct[0][2] ?></del>
            </div>
            <p class="detail-info-desc">
            <?php echo $infoProduct[0][5] ?>
            </p>
            <div class="detail-info-quantity">
            <form action="./detail.php" method="post">
              <input type="hidden" name="id_pd" value="<?php echo $infoProduct[0][0] ?>">
              <input type="hidden" name="total" value="<?php echo $infoProduct[0][3] ?>">
              <span class="quantity-prev">
                <i class="fas fa-minus"></i>
              </span>
              <input type="number" name="quatity" value="1" class="input-number" />
              <span class="quantity-next">
                <i class="fas fa-plus"></i>
              </span>
              <button class="detail-info-button">Add to cart</button>
            </form>
            </div>
            <div class="dilital-info-icon">
              <i class="far fa-heart"></i> |
              <i class="far fa-envelope"></i>
              <i class="fab fa-facebook-f"></i>
              <i class="fab fa-instagram"></i>
              <i class="fab fa-twitter"></i>
            </div>
            <hr />
            <?php
            if(isset($_GET['id_pd']) && $infoProduct[0][8] == 1){
              ?>
              <img
                src="./img/Eilik/item_gif.gif"
                alt=""
                class="detail-info-gif"
              />
            <?php }?>
            <?php
            if(isset($_GET['id_pd']) && $infoProduct[0][8] == 2){
              ?>
              <img
                src="./img/Emo/item-gif.gif"
                alt=""
                class="detail-info-gif"
              />
            <?php }?>
            <?php
            if(isset($_GET['id_pd']) && $infoProduct[0][8] == 3){
              ?>
              <img
                src="./img/Vector/item_gif.gif"
                alt=""
                class="detail-info-gif"
              />
            <?php }?>
            <?php
            if(isset($_GET['id_pd']) && $infoProduct[0][8] == 4){
              ?>
              <img
                src="./img/Eilik/item_gif.gif"
                alt=""
                class="detail-info-gif"
              />
            <?php }?>
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
                $id_pd = '../detail.php?id_pd='.$item[0];
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