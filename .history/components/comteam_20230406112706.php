<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
  require '../PDO/user.php';
  if(isset($_GET['id_user'])){
    delete_user($_GET['id_user']);
  }
?>
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
          <a class="active" href="#">Team</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="table-data">
    <div class="order">
      <div class="head">
        <h3>User</h3>
        <i class="bx bx-search"></i>
        <i class="bx bx-filter"></i>
      </div>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $users = select_userAll();
            foreach ($users as $item){
              $edit = './edit.php?id_user=' . $item[0];
              $remove = './team.php?id_user=' . $item[0];
              ?>
                <tr>
                  <td>
                    <p><?php echo $item[0] ?></p>
                  </td>
                  <td>
                    <p><?php echo $item[1] ?></p>
                  </td>
                  <td>
                    <p>+84<?php echo $item[4] ?></p>
                  </td>
                  <td>
                    <p><?php echo $item[2] ?></p>
                  </td>
                  <td>
                    <p><?php echo $item[6] ?></p>
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
</main>