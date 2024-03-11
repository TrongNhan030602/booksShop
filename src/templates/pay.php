<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>TN-shop Pay</title>
    <link rel="icon" href="../public/assets/img/books.png" type="image/x-icon">
    <link rel="stylesheet" href="/../public/assets/css/pay.css">

</head>

<body>

    <header>
        <h1> Thanh toán sản phẩm </h1>
        <h4><a href="" class="back-home-link">Home </a>- Checkout</h4>
    </header>

    <div class="container">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <!-- Checkout Form -->
                <div class="checkout-form">
                    <h2 class="mb-4">Thông tin khách hàng <i class="fas fa-user"></i></h2>
                    <input type="hidden" name="ID_user" value="<?= htmlspecialchars($user->ID)?>">
                        <div class="form-group">
                            <label for="fullName"><i class="fas fa-user text-primary"></i> Người đặt hàng:</label>
                            <input type="text" class="form-control" id="fullName" value="<?= htmlspecialchars($user->username)?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope text-primary"></i> Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->user_email)?>" required disabled>
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="fas fa-phone text-primary"></i> SĐT:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="phone"><i class="fas fa-map-marker-alt text-primary"></i> Địa chỉ</label>
                            <input type="text" class="form-control" id="phone" name="address" required>
                        </div>
                        <div class="form-group">
                            <label for="shippingMethod"><i class="fas fa-truck text-primary"></i> Phương thức giao hàng:</label>
                            <select class="form-control" id="shippingMethod" name="shippingMethod">
                                <option value="standard">Giao hàng tiêu chuẩn</option>
                                <option value="express">Giao hàng nhanh</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="paymentMethod"><i class="fas fa-credit-card text-primary"></i> Phương thức thanh
                                toán:</label>
                            <select class="form-control" id="paymentMethod" name="paymentMethod">
                                <option value="creditCard">Thẻ tín dụng</option>
                                <option value="paypal">PayPal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="notes"><i class="fas fa-comment text-primary"></i> Ghi chú đơn hàng:</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3"
                                placeholder="Nhập ghi chú (nếu có)"></textarea>
                        </div>
                </div>

            </div>

            <div class="col-md-6">
                <!-- Product List -->
                <div class="product-list">
                    <h2 class="mb-4">Giỏ hàng <i class="fas fa-shopping-cart"></i></h2>
                    <ul>
                    <?php $sum=0; 
                        foreach ($_SESSION['giohang'] as $item):
                        extract($item);?>
                        <input type="hidden" name="ID" value="<?= htmlspecialchars($id)?>">
                        <input type="hidden" name="ID" value="<?= htmlspecialchars($soLuong)?>">
                        <li><?= htmlspecialchars($soluong)?> - <?= htmlspecialchars($name)?> - <?=htmlspecialchars(number_format($price * $soluong,0,",","."))?>VNĐ <i class="fas fa-check-circle text-success"></i></li>
                    <?php $sum +=  $soluong *$price;
                        endforeach ?>
                    </ul>
                    <div class="total-price text-success"><strong class="text-primary">Tổng hóa đơn:</strong> <?=htmlspecialchars(number_format($sum,0,",","."))?> VNĐ</div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success place-order-btn" name="pay_products" style="margin-bottom: 12px;">
            <i class="fas fa-check"></i> Đặt hàng</button>
        </form>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>