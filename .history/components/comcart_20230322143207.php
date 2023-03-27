<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
?>
<div class="header-banner">
        <div class="container">
          <h1 class="banner-title">Cart</h1>
        </div>
      </div>
    </header>
    <section class="cart">
      <div class="container">
        <div class="cart-container">
          <table class="cart-table">
            <thead>
              <tr>
                <td></td>
                <td></td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
              </tr>
            </thead>

            <tbody>
              <?php
                if(isset($_SESSION['cart']) && $_SESSION['cart'] != ''){
                  ?>
                  <?php
                    $sum = 0;
                    $shiping = 5;
                    foreach($_SESSION['cart'] as $cart){
                      $listProducts = products_selectID_pd($cart['id_pd']);
                      foreach($listProducts as $item){
                        ?>
                        <tr class="item">
                          <td>
                            <a href="#"><i class="fas fa-times icon"></i></a>
                          </td>
                          <td>
                            <img src="<?php echo $item[4] ?>" alt="" />
                          </td>
                          <td><h5><?php echo $item[1] ?></h5></td>
                          <td><h5>$<?php echo $item[3] ?></h5></td>
                          <td>
                            <form action="./cart.php" method="post">
                              <input type="hidden" name="id_pd" value="<?php echo $item[0] ?>">
                              <input type="hidden" name="total" value="<?php echo $item[3] ?>">
                              <button name="minus" class="cart-prev">
                                <i class="fas fa-minus"></i>
                              </button>
                              <input type="number" name="quantity" value="<?php echo $_SESSION['cart'][$item[0]]["quantity"] ?>" class="input-number" />
                              <button name="plus" class="cart-next">
                                <i class="fas fa-plus"></i>
                              </button>
                            </form>
                          </td>
                          <td><h5>$<?php echo $subtotal = $_SESSION['cart'][$item[0]]["total"] ?></h5></td>
                        </tr>
                        <?php
                        $sum += $subtotal;
                        ?>
                        <?php
                          if(isset($_POST['minus'])){
                            $id = $_POST['id_pd'];
                            $total = $_POST['total'];
                            if($id == $_SESSION['cart'][$item[0]]['id_pd']){
                                $_SESSION['cart'][$item[0]]['quantity']--;
                                $_SESSION['cart'][$item[0]]['total'] -= $total;
                            }
                            if($_SESSION['cart'][$item[0]]['quantity'] == 0){
                                unset($_SESSION['cart'][$item[0]]);
                            }
                            if($_SESSION['cart'][$item[0]] == ''){
                                unset($_SESSION['cart']);
                            }
                          }
                          if(isset($_POST['plus'])){
                            $id = $_POST['id_pd'];
                            if($id == $_SESSION['cart'][$item[0]]['id_pd']){
                                $_SESSION['cart'][$item[0]]['quantity']++;
                                $_SESSION['cart'][$item[0]]['total'] += $total;
                            }
                          }
                        ?>
                      <?php } ?>
                    <?php }?>
                <?php } ?>
            </tbody>
            <thead>
              <tr>
                <td></td>
                <td></td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
              </tr>
            </thead>
          </table>
        </div>
        <div class="cart-right">
          <!-- <div class="cart-none"></div> -->
          <div class="cart-bottom">
            <h3 class="cart-title">Cart Total</h3>
            <div class="cart-item">
              <div class="cart-info">
                <h4 class="cart-name">Subtotal</h4>
                <span class="cart-price">$699.97</span>
              </div>
              <hr />
              <div class="cart-info">
                <h4 class="cart-name">Shipping</h4>
                <span class="cart-price">$5.00</span>
              </div>
              <hr />
              <div class="cart-info">
                <h4 class="cart-name">Total</h4>
                <span class="cart-price">$704.97</span>
              </div>
              <hr />
            </div>
            <div class="cart-low">
              <a href="./checkout.php">
                <button class="cart-button">Proceed to checkout</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>