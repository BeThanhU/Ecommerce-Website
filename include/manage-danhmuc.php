<?php 
	$sql_product = mysqli_query($con, 'select * from hanghoa order by daban desc limit 3;');
	$sql_total_sale_else = mysqli_query($con, 'select sum(daban) from hanghoa where daban<(select daban from hanghoa order by daban desc limit 1 OFFSET 2)');
	$row_total_sale_else = mysqli_fetch_array($sql_total_sale_else);

	$topsale_product_1 = mysqli_fetch_array(mysqli_query($con, 'select daban, TenHH from hanghoa order by daban desc limit 1 OFFSET 0'));
	$topsale_product_2 = mysqli_fetch_array(mysqli_query($con, 'select daban, TenHH from hanghoa order by daban desc limit 1 OFFSET 1'));
	$topsale_product_3 = mysqli_fetch_array(mysqli_query($con, 'select daban, TenHH from hanghoa order by daban desc limit 1 OFFSET 2'));
?>

<div id="side-nav" class="side-nav">
	<p class="side-nav-logo">
		<span>BeU</span><img class="header__logo-img" src="assets/img/logo-ori-1-rmbg.jpg" alt="">Store
	</p>
	<li class="side-nav-item side-nav--active">
		<a href="trangquantri.php" class="side-nav-link">
			<i class="fas fa-tachometer-alt side-nav-icon"></i>
			&nbsp;
			<span>Danh mục</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=khachhang" class="side-nav-link">
			<i class="fas fa-users side-nav-icon"></i>
			&nbsp;
			<span>Quản lý khách hàng</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=diachi" class="side-nav-link">
			<i class="fas fa-street-view side-nav-icon"></i>
			&nbsp;
			<span>Quản lý địa chỉ</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=hanghoa" class="side-nav-link">
			<i class="fas fa-list side-nav-icon"></i>
			&nbsp;
			<span>Quản lý hàng hóa</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=donhang" class="side-nav-link">
			<i class="fas fa-receipt side-nav-icon"></i>
			&nbsp;
			<span>Quản lý đơn hàng</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="?quanly=taikhoan" class="side-nav-link">
			<i class="fas fa-user side-nav-icon"></i>
			&nbsp;
			<span>Quản lý tài khoản</span>
		</a>
	</li>
	<li class="side-nav-item">
		<a href="./trangquantri.php?status=logout" class="side-nav-link">
			<i class="fas fa-sign-out-alt side-nav-icon"></i>
			&nbsp;
			<span name="btn_staff_logout">LogOut</span>
		</a>
	</li>
</div>

<div id="manage-main-body">
	<div class="manage-head">
		<div class="grid__column-6">
			<span class="manage-head-nav">&#9776; Dashboard</span>
			<span class="manage-head-nav2">&#9776; Dashboard</span>
		</div>

		<div class="grid__column-6">
			<div class="manage-head-profile">
				<img src="./assets/img/avt.png" alt="" class="manage-head-profile-img">
				<?php
					$sql_get_staff_account = mysqli_query($con, "select HoTenNV, ChucVu from nhanvien where TaiKhoanNV='".$_SESSION['stafflogin']."'");
					$row_get_staff_account = mysqli_fetch_array($sql_get_staff_account);
					if($row_get_staff_account){
				?>
					<p>
						<?php echo $row_get_staff_account['HoTenNV'] ?>
						<span>
							<?php switch($row_get_staff_account['ChucVu']){
								case 0:
								echo 'Hệ Thống';
								break;
								case 1: 
								echo 'Admin';
								break;
								default:
								echo 'Nhân viên';
								} 
							?>
						</span>
					</p>
				<?php
					}
				?>
			</div>
		</div>

		<div class="manage-clear-fix"></div>
	</div>
	<div class="statistic-wrap">
		<?php
			$sql_get_number_customer = mysqli_query($con, "select count(MSKH) from khachhang;");
			$sql_get_number_product = mysqli_query($con, "select count(MSHH) from hanghoa;");
			$sql_get_number_billdone = mysqli_query($con, "select count(SoDonDH) from dathang where TrangThaiDH=1;");
			$sql_get_number_billprocessing = mysqli_query($con, "select count(SoDonDH) from dathang where TrangThaiDH!=1;");

			$row_get_number_customer = mysqli_fetch_array($sql_get_number_customer);
			$row_get_number_product = mysqli_fetch_array($sql_get_number_product);
			$row_get_number_billdone = mysqli_fetch_array($sql_get_number_billdone);
			$row_get_number_billprocessing = mysqli_fetch_array($sql_get_number_billprocessing);
		?>
		<div class="grid__column-3">
			<div class="statistic-box">
				<p><?php echo $row_get_number_customer['count(MSKH)'] ?><br><span>Khách</span></p>
				<i class="statistic-box-icon fas fa-users"></i>
			</div>
		</div>
		<div class="grid__column-3">
			<div class="statistic-box">
				<p><?php echo $row_get_number_product['count(MSHH)'] ?><br><span>Sản phẩm</span></p>
				<i class="statistic-box-icon fas fa-boxes"></i>
			</div>
		</div>
		<div class="grid__column-3">
			<div class="statistic-box">
				<p><?php echo $row_get_number_billdone['count(SoDonDH)'] ?><br><span>Đơn đã bán</span></p>
				<i class="statistic-box-icon fas fa-dolly-flatbed"></i>
			</div>
		</div>
		<div class="grid__column-3">
			<div class="statistic-box">
				<p><?php echo $row_get_number_billprocessing['count(SoDonDH)'] ?><br><span>Đơn chờ</span></p>
				<i class="statistic-box-icon fas fa-receipt"></i>
			</div>
		</div>

		<div class="manage-clear-fix"></div>
	</div>

	<div class="manage-content-wrap">
		<div class="grid__column-7">
			<div class="manage-content-box">
				<p>Sản phẩm bán chạy nhất <span>Xem tất cả</span></p>
				<br>
				<table class="manage-content-table">
					<colgroup>
						<col style="width: 55%">
						<col style="width: 15%">
						<col style="width: 15%">
						<col style="width: 15%">
					</colgroup>
					<tr class="manage-content-list">
						<th class="manage-content-list-header">Tên sản phẩm</th>
						<th class="manage-content-list-header">Hãng</th>
						<th class="manage-content-list-header">Nơi SX</th>
						<th class="manage-content-list-header">Đã bán</th>
					</tr>
					<?php 
						while($row_product = mysqli_fetch_array($sql_product)){
					?>
						<tr class="manage-content-list">
							<td class="manage-content-list-item"><?php echo $row_product['TenHH'] ?></td>
							<td class="manage-content-list-item"><?php echo $row_product['HangHangHoa'] ?></td>
							<td class="manage-content-list-item"><?php echo $row_product['NoiSXHangHoa'] ?></td>
							<td class="manage-content-list-item"><?php echo $row_product['DaBan'] ?></td>
						</tr>
					<?php 
						}
					?>
					<tr class="manage-content-list">
						<td class="manage-content-list-item">Các sản phẩm khác</td>
						<td class="manage-content-list-item">...</td>
						<td class="manage-content-list-item">...</td>
						<td class="manage-content-list-item">
							<?php echo $row_total_sale_else['sum(daban)'] ?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="grid__column-5">
			<div class="manage-content-box">
				<p>Tổng số lượng bán</p>
				<div id="chart">
					<script>renderChart(
						<?php
							echo $topsale_product_1['daban'].", ";
							echo $topsale_product_2['daban'].", ";
							echo $topsale_product_3['daban'].", ";
							echo $row_total_sale_else['sum(daban)'].", ";
							echo "'".$topsale_product_1['TenHH']."', ";
							echo "'".$topsale_product_2['TenHH']."', ";
							echo "'".$topsale_product_3['TenHH']."', ";
							echo "'".'Sản phẩm khác'."'";
							echo ");";
						?>
					</script>
				</div>
			</div>
		</div>
		<div class="manage-clear-fix"></div>
	</div>
</div>