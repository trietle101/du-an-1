<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';

  if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $price_sale = $_POST['price_sale'];
    $desc = $_POST['desc'];
    $quantity = $_POST['quantity'];
    $cate = $_POST['cate'];

    $image = $_FILES["image"]["name"];
    $image_link = $_FILES["image"]["tmp_name"];
    //Đổi tên file 
    $imageArr = explode(".", $image);//Tạo mảng gồm các phần tử cách nhau sau dâu "."
    $ext = end($imageArr);//Lấy phần tử cuối của mảng
    $newImage = $cate."-".uniqid().".".$ext;
    //Tạo tên file mới: Maloai-random(Chuổi).phần tử cuối (jbg,png,...)
    $target_dir = "../assets/img/".$cate."/";
    //Nơi lưu file khi upload
    $target_file = $target_dir . $newImage;
    //Tên file upload
    do{
        $newImage = $cate."-".uniqid().".".$ext;
        $target_file = $target_dir . $newImage;
        $check = check_img($target_file);
    }while($check = 0);
    move_uploaded_file($image_link, $target_file);
    insert_products($name, $price, $price_sale, $target_file, $desc, $quantity, $cate);
  }
  if(isset($_POST['add-cate'])){
    $name_cate = $_POST['name_cate'];
    insert_cate($name_cate);
  }
  if(isset($_GET['id_pd'])){
    delete_product($_GET['id_pd']);
  }
  if(isset($_GET['id_cate'])){
    delete_cate($_GET['id_cate']);
  }
  if(isset($_GET['id_image'])){
    delete_img($_GET['id_image']);
  }
?>
<!-- MAIN -->
<main>
        <div class="head-title">
          <div class="left">
            <h1>My Store</h1>
            <ul class="breadcrumb">
              <li>
                <a href="#">Dashboard</a>
              </li>
              <li><i class="bx bx-chevron-right"></i></li>
              <li>
                <a class="active" href="#">My Store</a>
              </li>
            </ul>
          </div>
          <div class="dropdown">
            <div class="dropdown__select">
              <span class="dropdown__selected">Shorting By</span>
              <i class="fa fa-caret-down dropdown__caret"></i>
            </div>
            <ul class="dropdown__list">
              <?php

              ?>
              <a
                href="<?php echo './mystore.php?title=product' ?>"
                class="dropdown__item dropdown__text"
                >Products</a
              >
              <a
                href="<?php echo './mystore.php?title=cate' ?>"
                class="dropdown__item dropdown__text"
                >Category</a
              >
              <a
                href="<?php echo './mystore.php?title=image' ?>"
                class="dropdown__item dropdown__text"
                >Image</a
              >
            </ul>
          </div>
        </div>
        <?php
          $count_pd = count(products_selectAll());
          $count_cate = count(cate_selectAll());
          if(!isset($_GET['title'])){
            ?>
            <ul class="box-info">
				<li>
        <i class='bx bxl-product-hunt'></i>
					<span class="text">
						<h3><?php echo $count_pd ?></h3>
						<p>Product</p>
					</span>
				</li>
				<li>
        <i class='bx bxs-category' ></i>
					<span class="text">
						<h3><?php echo $count_cate ?></h3>
						<p>Category</p>
					</span>
				</li>
			</ul>
          <?php }?>
<!-- Product -->
        <?php
          if(isset($_GET['title']) && $_GET['title'] == 'product'){
            ?>
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>Products</h3>
                  <i class="bx bx-search"></i>
                  <i class="bx bx-filter"></i>
                </div>
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Date Upload</th>
                      <th>Date Update</th>
                      <th>Price</th>
                      <th>Reduced price</th>
                      <th>Quantity</th>
                      <th>Cate</th>
                      <th>Edit</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $products = products_selectAll();
                      foreach($products as $item){
                        $edit = './edit.php?id_pd=' . $item[0];
                        $remove = './mystore.php?id_pd=' . $item[0];
                        ?>
                        <tr>
                      <td>
                        <p><?php echo $item[0] ?></p>
                      </td>
                      <td>
                        <img src="<?php echo $item[4] ?>" alt="" />
                      </td>
                      <td><?php echo $item[1] ?></td>
                      <td><?php echo $item[6] ?></td>
                      <td><?php echo $item[7] ?></td>
                      <td><?php echo $item[3] ?></td>
                      <td><?php echo $item[2] ?></td>
                      <td><?php echo $item[8] ?></td>
                      <td><?php echo $item[9] ?></td>
                      <td>
                        <a href="<?php echo $edit  ?>" class="edit">
                          <i class="fas fa-tools"></i>
                        </a>
                      </td>
                      <td>
                        <a href="<?php echo $remove ?>" class="edit">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                      <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="checkout-address">
              <h3 class="checkout-address-title">
                <span>Input Products</span>
              </h3>
              <div class="checkout-address-box">
                <form action="mystore.php" method="POST" enctype="multipart/form-data">
                  <div class="checkout-address-list">
                    <div class="checkout-address-item">
                      <div class="checkout-address-input">
                        <label>Name</label> <br>
                        <input type="text" placeholder="Name" name="name">
                      </div>
                      <div class="checkout-address-input">
                        <label>Price</label> <br>
                        <input type="number" placeholder="$" name="price_sale">
                      </div>
                      <div class="checkout-address-input">
                        <label>Reduced Price</label> <br>
                        <input type="number" placeholder="$" name="price">
                      </div>
                      <div class="checkout-address-input">
                        <label>Description</label> <br>
                        <textarea
                          class="message"
                          type="text"
                          name="desc"
                          id=""
                          placeholder="Description..."
                          rows="7"
                        ></textarea>
                      </div>
                    </div>
                    <div class="checkout-address-item">
                      <div class="checkout-address-input">
                        <label>Quantity</label> <br>
                      <input type="number" placeholder="+123" name="quantity">
                      </div>
                      <div class="checkout-address-input">
                        <label>Category</label> <br>
                        <select name="cate">
                          <?php
                            $categories = cate_selectAll();
                            foreach($categories as $item){
                              ?>
                          <option value="<?php echo $item[0] ?>"><?php echo $item[1] ?></option>
                            <?php }?>
                        </select>
                      </div>
                      <div class="checkout-address-input">
                        <label>Images</label> <br>
                      <input type="file" name="image" id="avatar" accept="image/*" >
                      </div>
                      <div class="checkout-address-input">
                        <label>Image Review</label> <br>
                        <img src="" alt="" id="avatar-view">
                      </div>
                      <div class="checkout-address-input">
                        <input type="submit" value="Add" class="submit" name="insert">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        <?php }?>
<!-- Product -->
<!-- Category -->
        <?php
          if(isset($_GET['title']) && $_GET['title'] == 'cate'){
            ?>
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>Categorys</h3>
                  <i class="bx bx-search"></i>
                  <i class="bx bx-filter"></i>
                </div>
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $categories = cate_selectAll();
                      foreach( $categories as $item){
                        $edit = './edit.php?id_cate=' . $item[0];
                        $remove = './mystore.php?id_cate=' . $item[0];
                        ?>
                        <tr>
                          <td>
                            <p><?php echo $item[0] ?></p>
                          </td>
                          <td>
                            <p><?php echo $item[1] ?></p>
                          </td>
                          <td>
                            <a href="<?php echo $edit ?>" class="edit">
                              <i class="fas fa-tools"></i>
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo $remove ?>" class="edit">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="checkout-address">
              <h3 class="checkout-address-title">
                <span>Input Category</span>
              </h3>
              <div class="checkout-address-box">
                <form action="mystore.php" method="POST">
                  <div class="checkout-address-list">
                    <div class="checkout-address-item">
                      <div class="checkout-address-input">
                        <label>Name</label> <br>
                        <input type="text" placeholder="Name" name="name_cate">
                      </div>
                      <div class="checkout-address-input">
                        <input type="submit" value="Add" class="submit" name="add-cate">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        <?php }?>
<!-- Category -->
<!-- Images -->
        <?php
          if(isset($_GET['title']) && $_GET['title'] == 'image'){
            ?>
            <div class="table-data">
              <div class="order">
                <div class="head">
                  <h3>Images</h3>
                  <i class="bx bx-search"></i>
                  <i class="bx bx-filter"></i>
                </div>
                <table>
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Images</th>
                      <th>ID_PD</th>
                      <th>Edit</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $images = select_imgALL();
                      foreach($images as $item){
                        $remove = './mystore.php?id_image=' . $item[0];
                        ?>
                        <tr>
                          <td>
                            <p><?php echo $item[0] ?></p>
                          </td>
                          <td>
                            <img src="<?php echo $item[1] ?>" alt="" />
                          </td>
                          <td>
                            <p><?php echo $item[2] ?></p>
                          </td>
                          <td>
                            <a href="" class="edit">
                              <i class="fas fa-tools"></i>
                            </a>
                          </td>
                          <td>
                            <a href="<?php echo $remove  ?>" class="edit">
                              <i class="fas fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
        <?php }?>
<!-- Images -->
</main>
<!-- MAIN -->