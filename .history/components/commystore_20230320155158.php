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
                href="<?php echo './mystore?title=product' ?>"
                class="dropdown__item dropdown__text"
                >Products</a
              >
              <a
                href="<?php echo '../mystore?title=cate' ?>"
                class="dropdown__item dropdown__text"
                >Category</a
              >
              <a
                href="<?php echo './mystore?title=image' ?>"
                class="dropdown__item dropdown__text"
                >Image</a
              >
            </ul>
          </div>
        </div>
<!-- Product -->
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
                  <tr>
                    <td>
                      <p>1</p>
                    </td>
                    <td>
                      <img src="../assets/img/Emo/item.png" alt="" />
                    </td>
                    <td>Emo</td>
                    <td>01-10-2021</td>
                    <td>01-10-2021</td>
                    <td>$199.99</td>
                    <td>$159.99</td>
                    <td>10</td>
                    <td>Emo</td>
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
          <div class="checkout-address">
            <h3 class="checkout-address-title">
              <span>Input Products</span>
            </h3>
            <div class="checkout-address-box">
              <form action="#">
                <div class="checkout-address-list">
                  <div class="checkout-address-item">
                    <div class="checkout-address-input">
                      <label>Name</label> <br>
                      <input type="text" placeholder="Name">
                    </div>
                    <div class="checkout-address-input">
                      <label>Price</label> <br>
                      <input type="number" placeholder="$">
                    </div>
                    <div class="checkout-address-input">
                      <label>Reduced Price</label> <br>
                      <input type="number" placeholder="$">
                    </div>
                    <div class="checkout-address-input">
                      <label>Description</label> <br>
                      <textarea
                        class="message"
                        type="text"
                        name=""
                        id=""
                        placeholder="Description..."
                        rows="7"
                      ></textarea>
                    </div>
                  </div>
                  <div class="checkout-address-item">
                    <div class="checkout-address-input">
                      <label>Quantity</label> <br>
                    <input type="number" placeholder="+123">
                    </div>
                    <div class="checkout-address-input">
                      <label>Category</label> <br>
                      <select name="cate">
                        <option value="">Emo</option>
                        <option value="">Emo</option>
                        <option value="">Emo</option>
                      </select>
                    </div>
                    <div class="checkout-address-input">
                      <label>Images</label> <br>
                    <input type="file" name="image" id="avatar">
                    </div>
                    <div class="checkout-address-input">
                      <label>Image Review</label> <br>
                      <img src="" alt="" id="avatar-view">
                    </div>
                    <div class="checkout-address-input">
                      <input type="submit" value="Add" class="submit">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
<!-- Product -->
<!-- Category -->
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
                  <tr>
                    <td>
                      <p>1</p>
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
          <div class="checkout-address">
            <h3 class="checkout-address-title">
              <span>Input Category</span>
            </h3>
            <div class="checkout-address-box">
              <form action="#">
                <div class="checkout-address-list">
                  <div class="checkout-address-item">
                    <div class="checkout-address-input">
                      <label>Name</label> <br>
                      <input type="text" placeholder="Name">
                    </div>
                    <div class="checkout-address-input">
                      <input type="submit" value="Add" class="submit">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
<!-- Category -->
<!-- Images -->
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
                <tr>
                  <td>
                    <p>1</p>
                  </td>
                  <td>
                    <img src="../assets/img/Emo/item.png" alt="" />
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
        <div class="checkout-address">
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
                    <select name="cate">
                      <option value="">Emo</option>
                      <option value="">Emo</option>
                      <option value="">Emo</option>
                    </select>
                  </div>
                </div>
                <div class="checkout-address-item">
                  <div class="checkout-address-input">
                    <label>Image Review</label> <br />
                    <img src="" alt="" id="avatar-view" />
                  </div>
                  <div class="checkout-address-input">
                    <input type="submit" value="Add" class="submit" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
<!-- Images -->
</main>
<!-- MAIN -->