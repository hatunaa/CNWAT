<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./style.css">
	<title>Document</title>
</head>

<body>
	<main class="row">
		<div class="left-bar col-xs-12 col-md-3">
			<div class="search-section">
				<div class="search-title">Tìm kiếm</div>
				<div class="search-box clearfix">
					<input type="text" class="search-input" name="search_input" id="">
					<button class="search-btn">Tìm</button>
				</div>
			</div>
			<div class="filter-section">
				<div class="filter-section-title">Bộ lọc sản phẩm</div>
				<div class="filter-options">
					<div class="filter-options-name">Giá tiền</div><!--&#160; la ky tu space-->
					<div class="filter-option"><input type="radio" name="price_range" value="5">&#160;0 Tr - 10 Tr</div>
					<div class="filter-option"><input type="radio" name="price_range" value="15">&#160;10 Tr - 20 Tr
					</div>
					<div class="filter-option"><input type="radio" name="price_range" value="25">&#160;20 Tr - 30Tr
					</div>
					<div class="filter-option"><input type="radio" name="price_range" value="35">&#160;30 Tr - 40 Tr
					</div>
				</div>
				<div class="filter-options">
					<div class="filter-options-name">Hãng sản xuất</div>
					<div class="filter-option"><input type="radio" name="brand" value="dell">&#160;Dell</div>
				</div>

			</div>
		</div>
		<div class="product-section col-xs-12 col-md-6">
			<div class="product-header">
				<div class="product-order">
					<div class="product-order-label">Sắp xếp theo</div>
					<select name="produc_order">
						<option value="lastest">Mới nhất</option>
						<option value="ascending">Giá tăng dần</option>
						<option value="descending">Giá giảm dần</option>
					</select>
				</div>
			</div>
			<div class="product-list">
				<div class="product-item row">
					<div class="col-xs-12 col-md-4">
						<img src="./img/laptop1.jpeg" class="product-img" alt="">
					</div>
					<div class="product-item-detail col-xs-12 col-md-8">
						<div class="product-name">Laptop Dell Inspiron 15 3520 WTPRT</div>
						<div class="product-views">Lượt xem: 446</div>
						<div class="product-description">CPU Intel Core i5 1135G7 và card tích hợp NVIDIA GeForce MX550
							2 GB cân mọi tác vụ học tập, văn phòng và chỉnh sửa hình ảnh 2D, 3D đơn giản
							RAM 8 GB DDR4 cho phép bạn chạy đồng thời nhiều chương trình mà không lag, giật</div>
						<div style="padding: 0 16px;display:grid;grid-template-columns: 40px auto;">
							<div class="product-price-title">Gia</div>
							<div class="product-price-value">:&#160;
								<?php echo number_format(8000000, 0, ',', '.') . ' VND'; ?>
							</div>
							<div class="product-store-title">Kho</div>
							<div class="product-store-value">:&#160;
								350-352 Võ Văn Kiệt, Phường Cô Giang, Quận 1, Thành phố Hồ Chí Minh, Việt Nam.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right-bar col-xs-12 col-md-3" style="padding: 8px 24px;">
			<div style="margin-bottom:24px;">
				<input type="button" style="width:100%;" value="Xem giỏ hàng">
			</div>

			<div class="login-partner-title">Đăng nhập PARTNER</div>

			<label for="p-username" class="parner-login-lable">Tài khoản</label>
			<input type="text" name="p_username" id="p-username">

			<label for="p-password" class="parner-login-lable">Mật khẩu</label>
			<input type="password" name="p_password" id="p-password">

			<input type="button" value="Gửi" id="parner-login-send-btn" class="btn-black">
			<a href="#" class="parner-login-link">Bạn quên password ?</a>
			<a href="#" class="parner-login-link">Đăng ký</a>

		</div>
	</main>

</body>

</html>
