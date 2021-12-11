<div id="side-nav" class="side-nav">
	<p class="side-nav-logo">
		<span>BeU</span><img class="header__logo-img" src="assets/img/logo-ori-1-rmbg.jpg" alt="">Store
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
	<li class="side-nav-item side-nav--active">
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
		<span class="manage-header1">Khách hàng</span>
		<span class="manage-header2 deactive-header">Nhân viên</span>
	</div>
	<div class="manage-content-wrap manage-content1">
		<div class="grid__column-12">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 15%;">
					<col style="width: 15%;">
					<col style="width: 20%;">
					<col style="width: 10%;">
					<col style="width: 25%;">
					<col style="width: 15%;">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Tên tài khoản</th>
					<th class="manage-content-list-header">Mật khẩu</th>
					<th class="manage-content-list-header">Họ tên</th>
					<th class="manage-content-list-header">Số điện thoại</th>
					<th class="manage-content-list-header">Email</th>
					<th class="manage-content-list-header">DOB</th>
				</tr>
				<?php
					$sql_get_user_account = mysqli_query($con, "select TaiKhoanKH, HoTenKH, SoDienThoai, Email, DOB from khachhang ");
					while($row_get_user_account = mysqli_fetch_array($sql_get_user_account)){
				?>
				<tr class="manage-content-list">
					<td class="manage-content-list-header">
						<?php echo $row_get_user_account['TaiKhoanKH'] ?>
					</td>
					<td class="manage-content-list-header">
						<button>Reset Password</button>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_user_account['HoTenKH'] ?>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_user_account['SoDienThoai'] ?>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_user_account['Email'] ?>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_user_account['DOB'] ?>
					</td>
				</tr>
				<?php
					}
				?>
			</table>
			<div class="manage-footer">
				<button onclick="activeModal(0)" class="manage-btn">Thêm khách hàng</button>
			</div>
		</div>
	</div>
	<div class="manage-content-wrap deactive-manage manage-content2">
		<div class="grid__column-12">
			<table class="manage-content-table">
				<colgroup>
					<col style="width: 15%;">
					<col style="width: 15%;">
					<col style="width: 20%;">
					<col style="width: 10%;">
					<col style="width: 25%;">
					<col style="width: 15%;">
				</colgroup>
				<tr class="manage-content-list">
					<th class="manage-content-list-header">Tên tài khoản</th>
					<th class="manage-content-list-header">Mật khẩu</th>
					<th class="manage-content-list-header">Họ tên</th>
					<th class="manage-content-list-header">Chức vụ</th>
					<th class="manage-content-list-header">Địa chỉ</th>
					<th class="manage-content-list-header">Số điện thoại</th>
				</tr>
				<?php
					$sql_get_staff_account = mysqli_query($con, "select TaiKhoanNV, HoTenNV, ChucVu, DiaChi, SoDienThoai from nhanvien ");
					while($row_get_staff_account = mysqli_fetch_array($sql_get_staff_account)){
				?>
				<tr class="manage-content-list">
					<td class="manage-content-list-header">
						<?php echo $row_get_staff_account['TaiKhoanNV'] ?>
					</td>
					<td class="manage-content-list-header">
						<?php
							if($row_get_staff_account['ChucVu']!='0' && $row_get_staff_account['ChucVu']!='1'){
						?>
						<button onclick="reset_staff_password('<?php echo $row_get_staff_account['TaiKhoanNV'] ?>')">Reset Password</button>
						<?php
							}
						?>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_staff_account['HoTenNV'] ?>
					</td>
					<td class="manage-content-list-header">
						<?php
							switch ($row_get_staff_account['ChucVu']) {
								case 0:
								echo 'Hệ Thống';
								break;
								case 1:
								echo 'Admin';
								break;
								default:
								echo 'Nhân viên';
								break;
							}
						?>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_staff_account['DiaChi'] ?>
					</td>
					<td class="manage-content-list-header">
						<?php echo $row_get_staff_account['SoDienThoai'] ?>
					</td>
				</tr>
				<?php
					}
				?>
			</table>
			<div class="manage-footer">
				<button onclick="activeModal(1)" class="manage-btn">Thêm nhân viên</button>
			</div>
		</div>
	</div>
</div>

<div id="manage-main-modal">
	<!-- Modal layout -->
	<!-- modal--active -->
	<div class="modal">
		<!-- modal__overlay--active -->
		<div class="modal__overlay"></div>
		<div class="modal__body">

			<!-- add customer form -->
			<!-- auth-form--active -->
			<div class="auth-form">
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">Thêm khách hàng</h3>
					</div>

					<div class="auth-form__form">
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Tên tài khoản" required>
							<input type="text" class="auth-form__input" placeholder="Họ và tên" required>
						</div>
						<div class="auth-form__group">
							<input type="password" class="auth-form__input" placeholder="Mật khẩu" required>
							<input type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="auth-form__group">
							<input type="tel" class="auth-form__input" placeholder="Số điện thoại" required><input type="date" class="auth-form__input" placeholder="" required>
						</div>
						<div class="auth-form__group">
							<input type="email" class="auth-form__input" placeholder="Email" required>
							<input type="text" class="auth-form__input" placeholder="Địa chỉ">
						</div>
					</div>

					<div class="auth-form__aside">
						<p class="auth-form__policy-text">
							Bằng việc đăng kí, bạn đã đồng ý với chúng tôi về
							<a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
							<a href="" class="auth-form__text-link">Chính sách bảo mật</a>
						</p>
					</div>

					<div class="auth-form__controls">
						<button onclick="deactiveModal(0)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
						<button class="btn btn--primary">ĐĂNG KÝ</button>
					</div>
				</div>
			</div>

			<!-- add staff form -->
			<!-- auth-form--active -->
			<div class="auth-form">
				<div class="auth-form__container">
					<div class="auth-form__header">
						<h3 class="auth-form__heading">Thêm nhân viên</h3>
					</div>

					<div class="auth-form__form">
						<div class="auth-form__group">
							<input type="text" class="auth-form__input" placeholder="Tên tài khoản" required>
							<input type="text" class="auth-form__input" placeholder="Họ và tên" required>
						</div>
						<div class="auth-form__group">
							<input type="password" class="auth-form__input" placeholder="Mật khẩu của bạn" required>
							<input type="password" class="auth-form__input" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="auth-form__group">
							<input type="tel" class="auth-form__input" placeholder="Số điện thoại" required><input type="date" class="auth-form__input" placeholder="" required>
						</div>
						<div class="auth-form__group">
							<input type="number" min="1" max="3" step="1" class="auth-form__input" placeholder="Chức vụ (1-3)" required>
							<input type="email" class="auth-form__input" placeholder="Email của bạn" required>
						</div>
					</div>

					<div class="auth-form__aside">
						<p class="auth-form__policy-text">
							Bằng việc đăng kí, bạn đã đồng ý với chúng tôi về
							<a href="" class="auth-form__text-link">Điều khoản dịch vụ</a> &
							<a href="" class="auth-form__text-link">Chính sách bảo mật</a>
						</p>
					</div>

					<div class="auth-form__controls">
						<button onclick="deactiveModal(1)" class="btn btn--normal auth-form__controls-back">TRỞ LẠI</button>
						<button class="btn btn--primary">ĐĂNG KÝ</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>