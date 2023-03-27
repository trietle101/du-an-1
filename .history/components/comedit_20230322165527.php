<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
  if(isset($_POST['edit_pd'])){
    if(isset($_POST['id_pd'])){
      $name = $_POST['name'];
      $price = $_POST['price'];
      $price_sale = $_POST['price_sale'];
      $quantity = $_POST['quantity'];
      $cate = $_POST['cate'];

      update_not_img($_POST['id_pd'], $name, $price, $price_sale, $quantity, $cate);
    }
  }
?>
<!-- MAIN -->
<main>
        <div class="head-title">
          <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">Edit</a>
              </li>
            </ul>
          </div>
        </div>
        <?php
          if(isset($_GET['id_pd'])){
            $products = products_selectID_pd($_GET['id_pd']);
            ?>
            <div class="checkout-address">
              <h3 class="checkout-address-title">
                <span>Edit Products</span>
              </h3>
              <div class="checkout-address-box">
                <form action="edit.php" method="post">
                  <input type="hidden" name="id_pd" value="<?php echo $products[0][0] ?>">
                  <div class="checkout-address-list">
                    <div class="checkout-address-item">
                      <div class="checkout-address-input">
                        <label>Name</label> <br />
                        <input type="text" placeholder="Name" name="name" value="<?php echo $products[0][1] ?>"/>
                      </div>
                      <div class="checkout-address-input">
                        <label>Price</label> <br />
                        <input type="number" placeholder="$" name="price_sale" value="<?php echo $products[0][3] ?>" />
                      </div>
                      <div class="checkout-address-input">
                        <label>Reduced Price</label> <br />
                        <input type="number" placeholder="$" name="price" value="<?php echo $products[0][2] ?>" />
                      </div>
                    </div>
                    <div class="checkout-address-item">
                      <div class="checkout-address-input">
                        <label>Quantity</label> <br />
                        <input type="number" placeholder="+123" name="quantity" value="<?php echo $products[0][8] ?>" />
                      </div>
                      <div class="checkout-address-input">
                        <label>Category</label> <br />
                        <select name="cate">
                          <?php
                            $cate_pd = cate_selectAll();
                            foreach ($cate_pd as $item){
                              ?> 
                              <option value="<?php echo $item[0] ?>"><?php echo $item[1] ?></option>
                            <?php }?>
                        </select>
                      </div>
                      <div class="checkout-address-input">
                        <label>Images</label> <br />
                        <input type="file" name="image" id="avatar" />
                      </div>
                      <div class="checkout-address-input">
                        <label>Image Review</label> <br />
                        <img src="" alt="" id="avatar-view" />
                      </div>
                      <div class="checkout-address-input">
                        <input type="submit" value="Edit" name="edit_pd" class="submit" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <?php }?>
        <!-- <div class="checkout-address">
          <h3 class="checkout-address-title">
            <span>Input Images</span>
          </h3>
          <div class="checkout-address-box">
            <form action="#">
              <div class="checkout-address-list">
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Images</label> <br />
                    <input type="file" name="image" id="avatar" />
                  </div>
                  <div class="checkout-address-input">
                    <label>Products</label> <br />
                    <input type="text" value="Id products" />
                  </div>
                </div>
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Image Review</label> <br />
                    <img src="" alt="" id="avatar-view" />
                  </div>
                  <div class="checkout-address-input">
                    <input type="submit" value="Edit" class="submit" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="checkout-address">
          <h3 class="checkout-address-title">
            <span>Edit Category</span>
          </h3>
          <div class="checkout-address-box">
            <form action="#">
              <div class="checkout-address-list">
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Name</label> <br />
                    <input type="text" placeholder="Name" />
                  </div>
                  <div class="checkout-address-input">
                    <input type="submit" value="edit" class="submit" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div> -->
      </main>
      <!-- MAIN -->