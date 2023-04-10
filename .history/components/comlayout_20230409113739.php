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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
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
									href="<?php echo './layout.php?date='.$i ?>"
									class="dropdown__item dropdown__text"
									>Month <?php echo $i ?></a
								>
							<?php }?>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<?php
					if(isset($_GET['date'])){
						?>
						<li>
							<i class='bx bxs-calendar-check' ></i>
							<span class="text">
								<h3><?php echo $oder = count(selectBillMonth($_GET['date'])) ?></h3>
								<p>New Order</p>
							</span>
						</li>
						<li>
							<i class='bx bxs-group' ></i>
							<span class="text">
								<h3><?php echo $user = count(select_userAll()) ?></h3>
								<p>Visitors</p>
							</span>
						</li>
						<li>
							<i class='bx bxs-dollar-circle' ></i>
							<span class="text">
								<h3>$
									<?php
										$total_price = 0;
										$totals = selectBillThisMointh();
										for ($i = 0; $i < count($totals); $i++) {
											if ($totals[$i][3] == "cancelled") {
												$total_price = $total_price;
											}else{
												$total_price +=$totals[$i][1];
											}
										}
										echo $total_price;
									?>
								</h3>
								<p>Total Sales</p>
							</span>
						</li>
						<li>
							<i class='bx bxs-dollar-circle' ></i>
							<span class="text">
								<h3>$
									<?php
										$total_price = 0;
										$totals = selectBillMonth($_GET['date']);
										for ($i = 0; $i < count($totals); $i++) {
											if ($totals[$i][3] == "cancelled") {
												$total_price = $total_price;
											}else{
												$total_price +=$totals[$i][1];
											}
										}
										echo $total_price;
									?>
								</h3>
								<p>Total Month</p>
							</span>
						</li>
					<?php }else{
						?>
							<li>
								<i class='bx bxs-calendar-check' ></i>
								<span class="text">
									<h3><?php echo $oder = count(selectBillThisMointh()) ?></h3>
									<p>New Order</p>
								</span>
							</li>
							<li>
								<i class='bx bxs-group' ></i>
								<span class="text">
									<h3><?php echo $user = count(select_userAll()) ?></h3>
									<p>Visitors</p>
								</span>
							</li>
							<li>
								<i class='bx bxs-dollar-circle' ></i>
								<span class="text">
									<h3>$
										<?php
											$total_price = 0;
											$totals = selectBillThisMointh();
											for ($i = 0; $i < count($totals); $i++) {
												if ($totals[$i][3] == "cancelled") {
													$total_price = $total_price;
												}else{
													$total_price +=$totals[$i][1];
												}
											}
											echo $total_price;
										?>
									</h3>
									<p>Total Sales</p>
								</span>
							</li>
							<li>
								<i class='bx bxs-dollar-circle' ></i>
								<span class="text">
									<h3>$
										<?php
											$total_price = 0;
											$totals = selectBillThisMointh();
											for ($i = 0; $i < count($totals); $i++) {
												if ($totals[$i][3] == "cancelled") {
													$total_price = $total_price;
												}else{
													$total_price +=$totals[$i][1];
												}
											}
											echo $total_price;
										?>
									</h3>
									<p>Total Month</p>
								</span>
							</li>
					<?php }?>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
								if(isset($_GET['date'])){
									$bills = selectBillMonth($_GET['date']);
								foreach($bills as $item){
									$users = select_userID($item[5]);
									?>
								<tr>
									<td>
										<p><?php echo $users[0][1] ?></p>
									</td>
									<td><?php echo $item[4] ?></td>
									<td>
										<span class="status <?php echo $item[3] ?>"><?php echo $item[3] ?></span>
									</td>
								</tr>
							<?php }?>
								<?php }else{
									$bills = selectBillThisMointh();
									foreach($bills as $item){
										$users = select_userID($item[5]);
										?>
									<tr>
										<td>
											<p><?php echo $users[0][1] ?></p>
										</td>
										<td><?php echo $item[4] ?></td>
										<td>
											<span class="status <?php echo $item[3] ?>"><?php echo $item[3] ?></span>
										</td>
									</tr>
								<?php }?>
									<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->