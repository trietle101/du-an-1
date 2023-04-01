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
        </div>

        <div class="table-data">
          <div class="order">
            <div class="head">
              <h3>Bill Details</h3>
              <i class="bx bx-search"></i>
              <i class="bx bx-filter"></i>
            </div>
            <table>
              <thead>
                <tr>
                  <th>ID Detail</th>
                  <th>Total</th>
                  <th>Quantity</th>
                  <th>Name Products</th>
                  <th>Image Products</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $billDetail = select_bill_detail($_GET['id_bill']);
                    foreach($billDetail as $item){
                        $product = products_selectID_pd($item[4])
                        ?>
                        <tr>
                            <td>
                                <p><?php echo $item[0] ?></p>
                            </td>
                            <td>
                                <p>$<?php echo $item[1] ?></p>
                            </td>
                            <td>
                                <p><?php echo $item[2] ?></p>
                            </td>
                            <td>
                                <p><?php echo $product[0][1] ?></p>
                            </td>
                            <td>
                                <img src="<?php echo $product[0][4] ?>" alt="" />
                            </td>
                            <td>
                                <a href="" class="edit">
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