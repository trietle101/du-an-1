<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
  $shiping = 5;
  if(isset($_SESSION['cart'][$_GET['id_pd']])){
    if(isset($_GET['id_pd'])){
      unset($_SESSION['cart'][$_GET['id_pd']]);
      header("Refresh:0");
      die();
    }
  }
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
                if(isset($_SESSION['cart']) && $_SESSION['cart'] != array()){
                  ?>
                  <?php
                    $sum = 0;
                    foreach($_SESSION['cart'] as $cart){
                      $listProducts = products_selectID_pd($cart['id_pd']);
                      foreach($listProducts as $item){
                          $remove = './cart.php?id_pd='.$item[0];
                        ?>
                        <tr class="item">
                          <td>
                            <a href="<?php echo $remove ?>"><i class="fas fa-times icon"></i></a>
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
                            if($id == $_SESSION['cart'][$id]['id_pd']){
                                $_SESSION['cart'][$id]['quantity']--;
                                $_SESSION['cart'][$id]['total'] -= $total;
                            }
                            if($_SESSION['cart'][$id]['quantity'] == 0){
                              unset($_SESSION['cart'][$id]);

                            }
                            if($_SESSION['cart'] == array()){
                                unset($_SESSION['cart']);
                              }
                              header("Refresh:0");
                            die();
                          }
                          if(isset($_POST['plus'])){
                            $id = $_POST['id_pd'];
                            $total = $_POST['total'];
                            if($id == $_SESSION['cart'][$id]['id_pd']){
                              if($_SESSION['cart'][$id]['quantity'] < $item[8] ){
                                $_SESSION['cart'][$id]['quantity']++;
                                $_SESSION['cart'][$id]['total'] += $total;
                                }
                              }
                              header("Refresh:0");
                            die();
                          }
                        ?>
                      <?php } ?>
                    <?php }?>
                <?php }else{
                  ?>
                  <tr>
                  <tr>
                <td colspan="6" ><span class="pr-3">You have no products in your shopping cart</span></td>
              </tr>
              </tr>
                <?php }?>
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
                <span class="cart-price">$<?php if(isset($_SESSION['cart']) && $_SESSION['cart'] != array()){
                                echo $sum;
                            }else{
                                echo  0;
                            }
                                ?></span>
              </div>
              <hr />
              <div class="cart-info">
                <h4 class="cart-name">Shipping</h4>
                <span class="cart-price">$<?php echo $shiping?></span>
              </div>
              <hr />
              <div class="cart-info">
                <h4 class="cart-name">Total</h4>
                <span class="cart-price">$<?php 
                            if(isset($_SESSION['cart']) && $_SESSION['cart'] != array()){
                                echo $total = $sum + $shiping; 
                            }else{
                                echo $shiping;
                            }
                            ?></span>
              </div>
              <hr />
            </div>
            <div class="cart-low">
              <?php
                if(isset($_SESSION['name'])){
                  ?>
                  <?php
                    if(isset($_SESSION['cart']) && $_SESSION['cart'] != array()){
                      ?>
                      <a href="./checkout.php">
                        <button class="cart-button">Proceed to checkout</button>
                      </a>
                      <?php }else{
                        ?>
                        <a href="./checkout.php" style="opacity: 0.5; pointer-events: none">
                          <button class="cart-button">Proceed to checkout</button>
                        </a>
                    <?php }?>
                  <?php }else{
                    ?>
                    <a href="../login.php">
                      <button class="cart-button">Proceed to checkout</button>
                    </a>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>