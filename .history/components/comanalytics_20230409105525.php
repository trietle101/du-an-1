<?php
    require '../PDO/pdo.php';
    require '../PDO/products.php';
    require '../PDO/images.php';
    require '../PDO/cate.php';
    require '../PDO/user.php';
    require '../PDO/bill.php';
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
                <a class="active" href="#">Analytics</a>
              </li>
            </ul>
          </div>
          <div class="dropdown">
            <div class="dropdown__select">
            <span class="dropdown__selected">Date</span>
            <i class="fa fa-caret-down dropdown__caret"></i>
            </div>
            <ul class="dropdown__list">
              <?php
                for($i = 1; $i <=12 ; $i++){
                  ?>
                  <a
                    href="<?php echo './analytics.php?date='.$i ?>"
                    class="dropdown__item dropdown__text"
                    >Month <?php echo $i ?></a
                  >
                <?php }?>
            </ul>
          </div>
        </div>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Bill</h3>
              <i class="bx bx-search"></i>
              <i class="bx bx-filter"></i>
            </div>
            <table>
              <thead>
                <tr>
                  <th>ID_Bill</th>
                  <th>Name_user</th>
                  <th>Total</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    if(isset($_GET['date'])){
                      $date = selectBillMonth($_GET['date']);
                      foreach($bills as $item){
                        $users = select_userID($item[5]);
                        $view = './bill.php?id_bill='.$item[0];
                        $edit = './edit.php?id_bill='.$item[0];
                        $remove = './bill.php?id_bill='.$item[0];

                        ?>
                        <tr>
                            <td>
                                <p><?php echo $item[0] ?></p>
                            </td>
                            <td>
                                <p><?php echo $users[0][1] ?></p>
                            </td>
                            <td>
                                <p>$<?php echo $item[1] ?></p>
                            </td>
                            <td>
                                <p><?php echo $item[2] ?></p>
                            </td>
                            <td>
                                <p><?php echo $item[4] ?></p>
                            </td>
                            <td>
                                <p><span class="status <?php echo $item[3] ?>"><?php echo $item[3] ?></span></p>
                            </td>
                            <td>
                                <a href="<?php echo $view ?>" class="edit">
                                <i class="fas fa-search"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $edit ?>" class="edit" <?php 
                                if($item[3] == 'cancelled'){
                                  echo 'style="opacity: 0.5; pointer-events: none;"';
                                }
                                  ?> 
                                >
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
                  <?php }?>
                <?php
                    $bills = select_bill();
                    foreach($bills as $item){
                        $users = select_userID($item[5]);
                        $view = './bill.php?id_bill='.$item[0];
                        $edit = './edit.php?id_bill='.$item[0];
                        $remove = './bill.php?id_bill='.$item[0];

                        ?>
                        <tr>
                            <td>
                                <p><?php echo $item[0] ?></p>
                            </td>
                            <td>
                                <p><?php echo $users[0][1] ?></p>
                            </td>
                            <td>
                                <p>$<?php echo $item[1] ?></p>
                            </td>
                            <td>
                                <p><?php echo $item[2] ?></p>
                            </td>
                            <td>
                                <p><?php echo $item[4] ?></p>
                            </td>
                            <td>
                                <p><span class="status <?php echo $item[3] ?>"><?php echo $item[3] ?></span></p>
                            </td>
                            <td>
                                <a href="<?php echo $view ?>" class="edit">
                                <i class="fas fa-search"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $edit ?>" class="edit" <?php 
                                if($item[3] == 'cancelled'){
                                  echo 'style="opacity: 0.5; pointer-events: none;"';
                                }
                                  ?> 
                                >
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
      </main>
      <!-- MAIN -->