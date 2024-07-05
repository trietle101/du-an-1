<?php
    require '../PDO/pdo.php';
    require '../PDO/products.php';
    require '../PDO/images.php';
    require '../PDO/cate.php';
    $db = new PDO("mysql://srmj5rykmlxl2833:sbsivpzobmlr1mxq@gk90usy5ik2otcvi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/a73gdrc8msqutu9e");
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * 8;
    $id = isset($_GET['id_pd']) ? $_GET['id_pd']:'all';
    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
  }
  $_SESSION['qty'] = count($_SESSION['cart']);
    if(isset($_POST['add-to-cart'])){
      $product_id = $_POST['id_pd'];
      $total =$_POST['total'];
      if(array_key_exists($product_id, $_SESSION['cart'])){
        $_SESSION['cart'][$product_id]['quantity']++;
        $_SESSION['cart'][$product_id]['total'] += $total;
      }else{
        $_SESSION['cart'][$product_id] = array('id_pd' => $product_id, 'quantity' => 1 ,'total' => $total);
      }
      header("Refresh:0");
      die();
    }
  ?>
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
                    <a href="<?php echo './shop.php?id_pd=2' ?>" class="dropdown__item dropdown__text">Emo</a>
                    <a href="<?php echo './shop.php?id_pd=1' ?>" class="dropdown__item dropdown__text">Eilik</a>
                    <a href="<?php echo './shop.php?id_pd=3' ?>" class="dropdown__item dropdown__text">Vector</a>
                    <a href="<?php echo './shop.php?id_pd=4' ?>" class="dropdown__item dropdown__text">Accessories</a>
                    <a href="<?php echo './shop.php' ?>" class="dropdown__item dropdown__text">All</a>
                </ul>
              </div>
            </div>
          </div>
          <hr />
          <div class="products-list">
          <?php
            if(isset($_GET['id_pd'])){
              $productsCate = products_selectID_cateAll($_GET['id_pd']);
              ?>
              <?php
                    foreach($productsCate as $item){
                      $id_pd = './detail.php?id_pd='.$item[0];
                      ?>
                      <div class="products-item">
                        <div class="products-main">
                          <img
                            class="products-image"
                            src="<?php echo $item[4] ?>"
                            alt=""
                          />
                          <?php
                          if($item[8] == 0){
                            ?>
                            <img
                              class="products-expired"
                              src="../assets/img/expired.png"
                              alt=""
                            />
                          <?php }?>
                          <div class="products-content">
                            <ul class="products-social">
                              <li class="products-social-item">
                                <a class="products-social-link" href="<?php echo $id_pd ?>"
                                  ><i class="fas fa-search"></i
                                ></a>
                              </li>
                              <?php if($item[8] == 0){
                                ?>
                                <li class="products-social-item" style="opacity: 0.5; pointer-events: none">
                                  <a class="products-social-link">
                                    <i class="fas fa-cart-plus"></i>
                                  </a>
                                </li>
                              <?php }else{
                                ?>
                                <li class="products-social-item">
                                  <form action="./shop.php" method="post">
                                    <input type="hidden" name="id_pd" value="<?php echo $item[0] ?>">
                                    <input type="hidden" name="total" value="<?php echo $item[3] ?>">
                                    <button type="submit" name="add-to-cart">
                                      <a class="products-social-link">
                                        <i class="fas fa-cart-plus"></i>
                                      </a>
                                    </button>
                                  </form>
                                </li>
                              <?php }?>
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
                  $stml = $db ->query("select * from products order by  date_update desc limit 8 offset " . $offset);
                  $products = $stml -> fetchAll(PDO::FETCH_NUM);
                  ?>
                  <?php
              foreach($products as $item){
                $id_pd = './detail.php?id_pd='.$item[0];
                ?>
            <div class="products-item">
              <div class="products-main">
                <img
                  class="products-image"
                  src="<?php echo $item[4] ?>"
                  alt=""
                />
                <?php
                  if($item[8] == 0){
                    ?>
                    <img
                      class="products-expired"
                      src="../assets/img/expired.png"
                      alt=""
                    />
                  <?php }?>
                <div class="products-content" >
                  <ul class="products-social">
                    <li class="products-social-item">
                      <a class="products-social-link" href="<?php echo $id_pd ?>"
                        ><i class="fas fa-search"></i
                      ></a>
                    </li>
                    <?php if($item[8] == 0){
                      ?>
                      <li class="products-social-item" style="opacity: 0.5; pointer-events: none">
                        <a class="products-social-link">
                          <i class="fas fa-cart-plus"></i>
                        </a>
                      </li>
                    <?php }else{
                      ?>
                      <li class="products-social-item">
                        <form action="./shop.php" method="post">
                          <input type="hidden" name="id_pd" value="<?php echo $item[0] ?>">
                          <input type="hidden" name="total" value="<?php echo $item[3] ?>">
                          <button type="submit" name="add-to-cart">
                            <a class="products-social-link">
                              <i class="fas fa-cart-plus"></i>
                            </a>
                          </button>
                        </form>
                      </li>
                    <?php }?>
                    <li class="products-social-item">
                      <a class="products-social-link" href="#"
                        ><i class="fas fa-heart"></i
                      ></a>
                    </li>
                  </ul>
                </div>
                <div class="products-info"  >
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
              ?>
              <a href="<?php echo '?page='. $page - 1 . ''?>" class="prev"
              ><i class="fas fa-chevron-left"></i></a>
            <?php }
            for($i = 1; $i <= ceil($all->rowCount() / 8); $i++){
              echo '<a href="?page=' . $i . '" class="'.($i == $page? 'active': '').'">' . $i . '</a>';
              
            }
            if ($page >= 1 && $page < ceil($all->rowCount() / 8)) {
              ?>
              <a href="<?php echo '?page='. $page + 1 . ''?>" class="next"
              ><i class="fas fa-angle-right"></i></i
            ></a>
            <?php }?>
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
            <a href="./assets/shop.php" class="versatile-button">View now</a>
          </div>
        </div>
      </section>