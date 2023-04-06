<?php
    require '../PDO/pdo.php';
    require '../PDO/products.php';
    require '../PDO/images.php';
    require '../PDO/cate.php';
    require '../PDO/user.php';
    require '../PDO/bill.php';
    if(isset($_SESSION['id_user'])){
      $user = select_userID($_SESSION['id_user']);
    }
    if(isset($_POST['update_pass'])){
      if(isset($_POST['id_user'])){
        $pass = $_POST['pass'];
        $newPass = $_POST['new_pass'];
        $rePass = $_POST['re_pass'];
        $checkPass = select_userID($_POST['id_user']);
        if($pass == '' || $newPass == '' || $rePass == ''){
          $err = 'Do not leave blank';
        }else{
          if($checkPass[0][3] !=  $pass && $pass != ''){
            $err = 'Incorrect password';
          }else{
            if($newPass == $rePass){
              updatePassword($_SESSION['id_user'], $newPass);
              $cp = 'Change password successfully';
            }else{
              $err = 'New password does not match';
            }
          }
        }
      }
    }
    if(isset($_POST['update-info'])){
      if(isset($_POST['id_user'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        if($name == '' || $phone == ''){
          $err = 'Do not leave blank';
        }else{
          update_info($name, $phone, $_POST['id_user']);
          $cp = 'Change password successfully';
          $_SESSION['name'] = $name;
          header('location: ./profile.php');
          header("Refresh:0");
          die();
        }
      }
    }
?>
<div class="header-banner">
          <div class="container">
            <h1 class="banner-title">Profile</h1>
          </div>
        </div>
      </div>
    </header>
    <section class="contact">
      <div class="container">
        <?php
          if(isset($_GET['title']) && $_GET['title'] == 'infomation'){
            ?>
            <div class="profile-info">
              <form action="profile.php?title=infomation" method="post" class="profile-form">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                <div class="profile-infomation">
                  <label>Name</label><br>
                  <input class="name" type="text" name="name" value="<?php echo $user[0][1] ?>" />
                </div>
                <div class="profile-infomation">
                  <label>Phone</label><br>
                  <input
                    class="phone"
                    type="number"
                    name="phone"
                    value="<?php echo $user[0][4] ?>"
                  />
                </div>
                <?php
                  if(isset($err)){
                    echo '<p class="err">'.$err.'</p>';
                  }
                  if(isset($cp)){
                    echo '<p class="complete">'.$cp.'</p>';
                  }
                ?>
                <button name="update-info" type="submit">Save</button>
              </form>
            </div>
          <?php }elseif(isset($_GET['title']) && $_GET['title'] == 'password'){
            ?>
            <div class="profile-info">
              <form action="profile.php?title=password" method="post" class="profile-form">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                <div class="profile-infomation">
                  <label>Password</label><br>
                  <input class="name" type="password" name="pass" placeholder="Password" />
                </div>
                <div class="profile-infomation">
                  <label>New Password</label><br>
                  <input
                    class="email"
                    type="password"
                    name="new_pass"
                    placeholder="New Password"
                  />
                </div>
                <div class="profile-infomation">
                  <label>Re Password</label><br>
                  <input
                    class="phone"
                    type="password"
                    name="re_pass"
                    placeholder="Re Password"
                  />
                </div>
                <?php
                  if(isset($err)){
                    echo '<p class="err">'.$err.'</p>';
                  }
                  if(isset($cp)){
                    echo '<p class="complete">'.$cp.'</p>';
                  }
                ?>
                <button name="update_pass" type="submit">Save</button>
                <a href="./profile.php" class="profile-comback">ComeBack</a>
              </form>
            </div>
          <?php }elseif(isset($_GET['title']) && $_GET['title'] == 'history'){
            ?>
            <div class="table-data">
                <div class="order">
                  <table>
                    <thead>
                      <tr>
                        <th>Name Product</th>
                        <th>Image Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date Order</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $bills = bill_user($_SESSION['id_user']);
                        foreach ($bills as $bill){
                          $bill_detail = select_bill_detail($bill[0]);
                          foreach ($bill_detail as $item){
                            $product =products_selectID_pd($item[4]);
                            ?>
                              <tr>
                                <td><?php echo $product[0][1] ?></td>
                                <td><img src="<?php echo $product[0][4] ?>" alt=""></td>
                                <td><?php echo $item[2] ?></td>
                                <td>$<?php echo $item[1] ?></td>
                                <td><?php echo $bill[4] ?></td>
                                <td><?php echo $bill[3] ?></td>
                              </tr>
                          <?php }?>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
			        </div>
              <div class="profile-center">
                <a href="./profile.php" class="profile-comback">ComeBack</a>
              </div>
          <?php } else{
            ?>
            <div class="contact-center">
              <img src="./img/user.png" alt="" class="profile-img">
              <div class="contact-detail">
                <div class="profile-item">
                <i class="fa-solid fa-info fa-xl"></i>
                <div class="contact-text">
                    <h4>Name</h4>
                    <p>
                    <?php echo $user[0][1] ?>
                    </p>
                </div>
                </div>
                <div class="profile-item">
                <i class="fa-solid fa-phone fa-xl"></i>
                <div class="contact-text">
                    <h4>Phone</h4>
                    <p>(+84) <?php echo $user[0][4] ?></p>
                </div>
                </div>
                <div class="profile-item">
                <i class="fa-solid fa-envelope fa-xl"></i>
                <div class="contact-text">
                    <h4>Email</h4>
                    <p><?php echo $user[0][2] ?></p>
                </div>
                </div>
                <ul class="profile-item">
                    <li class="profile-list">
                        <a href="./profile.php?title=infomation" class="profile-link">Information</a>
                    </li>
                    <li class="profile-list">
                        <a href="./profile.php?title=history" class="profile-link">Order history</a>
                    </li>
                    <li class="profile-list">
                        <a href="./profile.php?title=password" class="profile-link">Password</a>
                    </li>
                </ul>
              </div>
            </div>
          <?php }?>
      </div>
    </section>