<?php
	$sql_address = mysqli_query($con, 'select HoTenKH, TenCongTy, SoDienThoai, DiaChi from khachhang kh, diachikh dc where kh.MSKH = dc.MSKH;');
?>

<div id="side-nav" class="side-nav">
	<p class="side-nav-logo">
		<span>BeU</span><img class="header__logo-img" src="../Process/assets/img/logo-ori-1-rmbg.jpg" alt="">Store
	</p>
	<li class="side-nav-item">
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
	<li class="side-nav-item side-nav--active">
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
		<a onclick="staffLogOut()" class="side-nav-link">
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
				<img src="../Process/assets/img/avt.png" alt="" class="manage-head-profile-img">
				<?php
					$sql_get_staff_account = mysqli_query($con, "select HoTenNV from nhanvien where TaiKhoanNV='".$_SESSION['staff_login']."'");
					$row_get_staff_account = mysqli_fetch_array($sql_get_staff_account);
					if($row_get_staff_account){
				?>
					<p><?php echo $row_get_staff_account['HoTenNV'] ?><span>Software Engineer</span></p>
				<?php
					}
				?>
			</div>
		</div>

		<div class="manage-clear-fix"></div>
	</div>

	<div>
		<span class="manage-header">Danh sách địa chỉ</span>
	</div>
	<div class="manage-content-wrap">
		<div class="grid__column-12">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 20%;">
					<col style="width: 20%;">
					<col style="width: 20%;">
					<col style="width: 40%;">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Tên khách hàng</th>
					<th class="manage-content-list-header">Tên Công ty</th>
					<th class="manage-content-list-header">Số điện thoại</th>
					<th class="manage-content-list-header">Địa chỉ</th>
				</tr>
				<?php
					while($row_address = mysqli_fetch_array($sql_address)){
				?>
					<tr class="manage-content-list">
						<td class="manage-content-list-item"><?php echo $row_address['HoTenKH'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['TenCongTy'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['SoDienThoai'] ?></td>
						<td class="manage-content-list-item"><?php echo $row_address['DiaChi'] ?></td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</div>