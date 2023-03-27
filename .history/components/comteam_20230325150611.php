<?php
  require '../PDO/pdo.php';
  require '../PDO/products.php';
  require '../PDO/images.php';
  require '../PDO/cate.php';
  require '../PDO/user.php';
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
            
          ?>
          <tr>
            <td>
              <p>1</p>
            </td>
            <td>
              <p>Tran Toan</p>
            </td>
            <td>
              <p>+84393511801</p>
            </td>
            <td>
              <p>tttoan1801@gmail.com</p>
            </td>
            <td>
              <p>1</p>
            </td>
            <td>
              <a href="" class="edit">
                <i class="fas fa-tools"></i>
              </a>
            </td>
            <td>
              <a href="" class="edit">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>