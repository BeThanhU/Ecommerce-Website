<?php
	include_once('db/connect.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Web bán hàng</title>
		<link rel="stylesheet" href="./assets/css/base.css">
		<link rel="stylesheet" href="./assets/css/main.css">
		<link rel="stylesheet" href="./assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
	</head>

	<body>
		<script src="./main.js"></script>


		<!-- BEM -->
		<div class="app">
		<?php 
			include("include/topbar.php");
		?>

		<div class="app__container">
			<div class="grid">
				<div class="grid__row app_content">
					<div class="grid__column-8 cart__info">
						<form>
							<ul class="cart-list">
								<li class="cart-item">
									<div class="cart-item-left">
										<input class="cart-item-checkbox" type="checkbox" name="">
										<div class="img-wrap">
											<img class="cart-item-img" src="./assets/img/amd-ryzen-5-3600.png" alt="">
										</div>
										<div class="cart-item-content">
											<span class="cart-item-name">Chip AMD Ryzen 5 3600 Chip AMD Ryzen 5 3600 Chip AMD Ryzen 5 3600 Chip AMD Ryzen 5 3600 Chip AMD Ryzen 5 3600 Chip AMD Ryzen 5 3600</span>
											<span class="cart-item-category">Loại sản phẩm: Chipset AMD</span>
										</div>
									</div>
									<div class="cart-item-middle">
										<span class="cart-item-price">5590000</span>
										<div class="cart-item-wrap">
											<i class="cart-item-middle-icon far fa-heart"></i>
											<i class="cart-item-middle-icon far fa-trash-alt"></i>
										</div>
									</div>
									<div class="cart-item-right">
										<div class="cart-item-counter">
											<button onmousedown="mouseDown_dec()" onmouseup="mouseUp()" onmouseleave="mouseLeave()" class="btn-adjust-amount">-</button>
											<input id="input-amount" value="1" class="input-amount"></input>
											<button onmousedown="mouseDown_inc(<?php echo number_format($row_chitiet['SoLuongHang']) ?>)" onmouseup="mouseUp()" onmouseleave="mouseLeave()" class="btn-adjust-amount">+</button>
										</div>
									</div>
								</li>
							</ul>
						</form>
					</div>
					<div class="grid__column-4">
						<div class="cart__info">
							<span class="cart__location-header">Địa điểm</span>
							<div class="cart__location">
								<i class="cart__location-icon fas fa-map-marker-alt"></i>
								<span class="cart__location-label">Cần Thơ, Quận Bình Thủy, Phường Bùi Hữu Nghĩa</span>
							</div>
						</div>
						<div class="cart__info">
							<div class="cart__bill">
								<span class="cart__bill-header">Thông tin đơn hàng</span>
								<div class="cart__bill-price">
									<span class="cart__bill-price-label">Tạm tính</span>
									<span>0đ</span>
								</div>
								<div class="cart__bill-price">
									<span class="cart__bill-price-label">Phí giao hàng</span>
									<span>0đ</span>
								</div>
								<div>
									<input class="cart__bill-coupon-input"type="text" placeholder="Mã giảm giá">
								</div>
								<div class="cart__bill-price">
									<span class="cart__bill-total-label">Tổng cộng</span>
									<span class="cart__bill-total-price">0đ</span>
								</div>
								<span class="cart__bill-noti">Đã bao gồm VAT(nếu có)</span>
								<button onclick="" class="cart__bill-btn-accept">Xác nhận giỏ hàng</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php 
			include("include/footbar.php");
		?>
	</body>
</html>