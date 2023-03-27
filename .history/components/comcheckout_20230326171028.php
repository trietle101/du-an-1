<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
  require '../PDO/user.php';
  $db = new PDO("mysql:host=localhost:3308;dbname=robot_pet","root","");
  $shiping = 5;
  if(isset($_SESSION['id_user'])){
    $checkUser = select_userID($_SESSION['id_user']);
  }
  if(isset($_POST['checkout'])){
    $id_user = $_POST['id_user'];
    $id_pd = $_POST['id_pd'];
    $address = $_POST['address'].', '.$_POST['wards'].', '.$_POST['district'].', '.$_POST['city'] ;
    echo $total;

    // $stmt = $db->prepare('INSERT INTO bill (total, address, id_user) VALUES (?,?,?)');
    // $stmt->bindParam(1,$total);
    // $stmt->bindParam(2,$address);
    // $stmt->bindParam(3,$id_user);
    // $stmt->execute();
    // $id_bill = $db->lastInsertId();
    
    // $sql = "INSERT INTO bill_detail (total, quantity, id_bill, id_pd) VALUES ";
    // $values = array();
    // foreach ($_SESSION['cart'] as $product) {
    //     $values[] = "({$product['total']}, {$product['quantity']}, $id_bill, {$product['id_pd']})";
    // }
    // $sql .= implode(',', $values);
    // $slmt = $db->prepare($sql);
    // $slmt->execute();
    // unset($_SESSION['cart']);
  }
?>
<div class="header-banner">
        <div class="container">
          <h1 class="banner-title">Check out</h1>
        </div>
      </div>
    </header>
    <section class="checkout">
      <div class="container">
        <form action="checkout.php" method="POST">
          <input type="hidden" name="id_user" value="<?php if(isset($_SESSION['id_user'])){
    echo $_SESSION['id_user'];
  } ?>">
          <div class="checkout-box">
            <div class="checkout-address">
              <h3 class="checkout-address-title">
                <span>BILLING ADDRESS</span>
              </h3>
              <div class="checkout-address-box">
                  <div class="checkout-address-list">
                    <div class="checkout-address-item">
                      <?php
                        if(isset($_SESSION['name'])){
                          ?>
                          <div class="checkout-address-input">
                            <label>Name</label> <br>
                            <input type="text" placeholder="Full name" value="<?php echo $checkUser[0][1] ?>">
                          </div>
                          <div class="checkout-address-input">
                            <label>Phone</label> <br>
                            <input type="number" placeholder="+84..." value="<?php echo '0'.$checkUser[0][4] ?>">
                          </div>
                          <div class="checkout-address-input">
                            <label>Email</label> <br>
                            <input type="email" placeholder="123@gmail.com" value="<?php echo $checkUser[0][2] ?>">
                          </div>
                        <?php }else{
                          ?>
                          <div class="checkout-address-input">
                            <label>Name</label> <br>
                            <input type="text" placeholder="Full name">
                          </div>
                          <div class="checkout-address-input">
                            <label>Phone</label> <br>
                            <input type="number" placeholder="+84...">
                          </div>
                          <div class="checkout-address-input">
                            <label>Email</label> <br>
                            <input type="email" placeholder="123@gmail.com">
                          </div>
                        <?php }?>
                    </div>  
                    <div class="checkout-address-item">
                      <div class="checkout-address-input">
                        <label>Address</label> <br>
                      <input type="text" placeholder="123 ABC Street" name="address">
                      </div>
                      <div class="checkout-address-input">
                        <label>Wards</label> <br>
                      <input type="text" placeholder="Wards 13" name="wards">
                      </div>
                      <div class="checkout-address-input">
                        <label>District</label> <br>
                      <input type="text" placeholder="District 1" name="district">
                      </div>
                      <div class="checkout-address-input">
                        <label>Province / City</label> <br>
                      <input type="text" placeholder="ABC city" name="city">
                      </div>
                    </div>
                  </div>
                
              </div>
            </div>
            <div class="checkout-total">
              <h3 class="checkout-total-title">
                <span>ORDER TOTAL</span>
              </h3>
              <div class="checkout-total-box">
                <div class="checkout-total-list">
                  <h3 class="checkout-total-heading">Products</h3>
                  <div class="checkout-total-item">
                    <?php
                      $total = 0;
                      if(isset($_SESSION['cart']) && $_SESSION['cart'] != array()){
                        $sum = 0;
                        foreach($_SESSION['cart'] as $cart){
                          $listProducts = products_selectID_pd($cart['id_pd']);
                          foreach($listProducts as $item){
                            ?>
                            <div class="checkout-total-info">
                              <input type="hidden" name="id_pd" value="<?php echo $item[0] ?>">
                              <h4 class="checkout-total-name"><?php echo $item[1] ?></h4>
                              <span class="checkout-total-quantity"><?php echo $_SESSION['cart'][$item[0]]["quantity"] ?></span>
                              <span class="checkout-total-price">$<?php echo $subtotal = $_SESSION['cart'][$item[0]]["total"] ?></span>
                            </div>
                            <hr />
                            <?php
                            $sum += $subtotal
                            ?>
                          <?php }?>
                        <?php }?>
                      <?php }?>
                    <div class="checkout-total-info">
                      <h4 class="checkout-total-sub">Subtotal</h4>
                      <span class="checkout-total-ship">$<?php if(isset($_SESSION['cart']) && $_SESSION['cart'] != array()){
                                echo $sum;
                            }else{
                                echo  0;
                            }
                                ?></span>
                    </div>
                    <div class="checkout-total-info">
                      <h4 class="checkout-total-sub">Shipping</h4>
                      <span class="checkout-total-ship">$<?php echo $shiping ?></span>
                    </div>
                    <hr />
                    <?php
                      $total = $sum + $shiping;
                    ?>
                    <div class="checkout-total-info">
                      <h4 class="checkout-total-total">Total</h4>
                      <span class="checkout-total-total">$<?php 
                                echo $total 
                            ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <h3 class="checkout-pay-title">
                <span>PAYMENT</span>
              </h3>
              <div class="checkout-pay-low">
                <a>
                  <button type="submit" name="checkout" class="checkout-total-button">
                      Place Order
                  </button>
                </a>
              </div>
            </div>  
          </div>
        </form>
        </div>
      </div>
    </section>