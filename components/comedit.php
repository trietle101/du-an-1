<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
  require '../PDO/user.php';
  require '../PDO/bill.php';
  if(isset($_GET['id_pd'])){
    $products = products_selectID_pd($_GET['id_pd']);
  }
  if(isset($_POST['edit_pd'])){
    if(isset($_POST['id_pd'])){
      $name = $_POST['name'];
      $price = $_POST['price'];
      $price_sale = $_POST['price_sale'];
      $quantity = $_POST['quantity'];
      $cate = $_POST['cate'];
      $date = $_POST['date'];

      $chechSP = products_selectID_pd($_POST['id_pd']);
      $newImage = $_FILES["image"]["name"] ?: false;
      $newDesc = $_POST['description'] ?: false;

      if($newDesc){
        if($newImage){
            $image_link = $_FILES["image"]["tmp_name"];
            //Đổi tên file 
            $imageArr = explode(".", $newImage);//Tạo mảng gồm các phần tử cách nhau sau dâu "."
            $ext = end($imageArr);//Lấy phần tử cuối của mảng
            $target_dir = "../assets/img/".$cate."/";
            //Nơi lưu file khi upload
            unlink($chechSP[0][4]);
            do{
                $newImage = $cate."-".uniqid().".".$ext;
                $target_file = $target_dir . $newImage;
                $check = check_img($target_file);
            }while($check = 0);
            move_uploaded_file($image_link, $target_file);
            update_products($_POST['id_pd'], $name, $price, $price_sale, $target_file, $newDesc, $date, $quantity, $cate);
        }else{
          update_not_img($_POST['id_pd'], $name, $price, $price_sale, $newDesc, $date, $quantity, $cate);
        }
      }else{
        if($newImage){
          $image_link = $_FILES["image"]["tmp_name"];
          //Đổi tên file 
          $imageArr = explode(".", $newImage);//Tạo mảng gồm các phần tử cách nhau sau dâu "."
          $ext = end($imageArr);//Lấy phần tử cuối của mảng
          $target_dir = "../assets/img/".$cate."/";
          //Nơi lưu file khi upload
          unlink($chechSP[0][4]);
          do{
              $newImage = $cate."-".uniqid().".".$ext;
              $target_file = $target_dir . $newImage;
              $check = check_img($target_file);
          }while($check = 0);
          move_uploaded_file($image_link, $target_file);
          update_not_Desc($_POST['id_pd'], $name, $price, $price_sale, $target_file, $date, $quantity, $cate);
      }else{
        update_not_imgAndDesc($_POST['id_pd'], $name, $price, $price_sale, $date, $quantity, $cate);
      }
      }

      header('location: mystore.php');
    }
  }
  if(isset($_POST['add_img'])){
    if(isset($_POST['id_pd'])){
      $image = $_FILES["image"]["name"];
      $image_link = $_FILES["image"]["tmp_name"];
      //Đổi tên file 
      $imageArr = explode(".", $image);//Tạo mảng gồm các phần tử cách nhau sau dâu "."
      $ext = end($imageArr);//Lấy phần tử cuối của mảng
      $newImage = uniqid().".".$ext;
      //Tạo tên file mới: Maloai-random(Chuổi).phần tử cuối (jbg,png,...)
      $target_dir = "../assets/img/detail/";
      //Nơi lưu file khi upload
      $target_file = $target_dir . $newImage;
      //Tên file upload
      do{
          $newImage = uniqid().".".$ext;
          $target_file = $target_dir . $newImage;
          $check = check_img_edit($target_file);
      }while($check = 0);
      move_uploaded_file($image_link, $target_file);
      insert_images($_POST['id_pd'], $target_file);
      header("Location: edit.php?id_pd=". $_POST['id_pd']);
    }
  }
  if(isset($_POST['edit_cate'])){
    if(isset($_POST['id_cate'])){
      $name_cate = $_POST['name_cate'];
      update_cate($name_cate, $_POST['id_cate']);
      header("Location: mystore.php");
    }
  }
  if(isset($_POST['edit_user'])){
    if(isset($_POST['id_user'])){
      $role = $_POST['role'];
      update_user($_POST['id_user'], $role);
      header("Location: team.php");
    }
  }
  if(isset($_POST['edit_bill'])){
    if(isset($_POST['id_bill'])){
      $status = $_POST['status'];
      update_bill($status, $_POST['id_bill']);
      $status = select_bill_id($_POST['id_bill']);
      if ($status[0][3] == "cancelled") {
        $bill_details = select_bill_detail($_POST['id_bill']);
        foreach ($bill_details as $bill){
          $product = products_selectID_pd($bill[4]);
          update_quantity(($product[0][8]+$bill[2]), $bill[4]);
        }
      }
      header("Location: analytics.php");
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
      ?>
      <div class="checkout-address">
        <h3 class="checkout-address-title">
          <span>Edit Products</span>
        </h3>
        <div class="checkout-address-box">
          <form action="edit.php" method="POST" enctype="multipart/form-data">
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
                <div class="checkout-address-input">
                  <label>Day Update</label> <br />
                  <input type="date" name="date" />
                </div>
                <div class="checkout-address-input">
                  <label>Description</label> <br>
                  <textarea
                    class="message"
                    type="text"
                    name="description"
                    id=""
                    placeholder="<?php echo $products[0][5] ?>"
                    rows="7"
                  ></textarea>
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
      <div class="checkout-address">
        <h3 class="checkout-address-title">
          <span>Input Images</span>
        </h3>
        <div class="checkout-address-box">
          <form action="edit.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id_pd" value="<?php echo $products[0][0] ?>">
            <div class="checkout-address-list">
              <div class="checkout-address-item">
                <div class="checkout-address-input">
                  <label>Images</label> <br />
                  <input type="file" name="image" id="avatar-image" />
                </div>
                <div class="checkout-address-input">
                  <label>Products</label> <br />
                  <input type="number" name="product" value="<?php echo $products[0][0] ?>">
                </div>
              </div>
              <div class="checkout-address-item">
                <div class="checkout-address-input">
                  <label>Image Review</label> <br />
                  <img src="" alt="" id="avatar-image-view" />
                </div>
                <div class="checkout-address-input">
                  <input type="submit" value="Add" class="submit" name="add_img"/>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
  <?php }?>
  <?php
    if(isset($_GET['id_cate'])){
      $categories = cate_select_id($_GET['id_cate']);
      ?>
        <div class="checkout-address">
          <h3 class="checkout-address-title">
            <span>Edit Category</span>
          </h3>
          <div class="checkout-address-box">
            <form action="edit.php" method="POST">
              <input type="hidden" name="id_cate" value="<?php echo $categories[0][0] ?>">
              <div class="checkout-address-list">
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Name</label> <br />
                    <input type="text" placeholder="Name" name="name_cate" value="<?php echo $categories[0][1] ?>"/>
                  </div>
                  <div class="checkout-address-input">
                    <input type="submit" value="Edit" class="submit" name="edit_cate" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
  <?php }?>
  <?php
    if(isset($_GET['id_bill'])){
      $bill = select_bill_id($_GET['id_bill']);
      ?>
        <div class="checkout-address">
          <h3 class="checkout-address-title">
            <span>Edit Category</span>
          </h3>
          <div class="checkout-address-box">
            <form action="edit.php" method="POST">
              <input type="hidden" name="id_bill" value="<?php echo $bill[0][0] ?>">
              <div class="checkout-address-list">
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Status</label> <br />
                    <input type="text" placeholder="Name" value="<?php echo $bill[0][3] ?>"/>
                  </div>
                  <div class="checkout-address-input">
                    <label>Update Status</label> <br />
                    <select name="status"> 
                        <option value="waiting">Waiting</option>
                        <option value="preparing">Preparing</option>
                        <option value="delivering">Delivering</option>
                        <option value="success">Success</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                  </div>
                  <div class="checkout-address-input">
                    <input type="submit" value="Edit" class="submit" name="edit_bill" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
  <?php }?>
  <?php
    if(isset($_GET['id_user'])){
      $user = select_userID($_GET['id_user']);
      ?>
      <div class="checkout-address">
          <h3 class="checkout-address-title">
            <span>Edit User</span>
          </h3>
          <div class="checkout-address-box">
            <form action="edit.php" method="POST">
              <input type="hidden" name="id_user" value="<?php echo $user[0][0] ?>">
              <div class="checkout-address-list">
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Name</label> <br />
                    <input type="text" placeholder="Name" value="<?php echo $user[0][1] ?>"/>
                  </div>
                  <div class="checkout-address-input">
                    <label>Role</label> <br />
                    <select name="role"> 
                        <option value="1">User</option>
                        <option value="0">Admin</option>
                    </select>
                  </div>
                  <div class="checkout-address-input">
                    <input type="submit" value="Edit" class="submit" name="edit_user" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
    <?php }?>
</main>
<!-- MAIN -->