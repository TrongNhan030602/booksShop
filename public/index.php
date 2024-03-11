<?php
require_once __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . "/../src/templates/catelog.php";

$book = new APP\book($pdo);
$catelogs = get_catelog();
//(1) Phần xử lý chọn Sách để hiển thị
if (!isset($_POST['catelog'])) {// Khi chưa chọn theo danh mục
    $activeCategory = '';
    $books = $book->getAllProducts(); // Mặc định
    if (isset($_POST['popular'])) {
        $books = $book->SORT_popular();
    } elseif (isset($_POST['new'])) {
        $books = $book->SORT_new();
    } elseif (isset($_POST['hot'])) {
        $books = $book->SORT_hot();
    } elseif (isset($_POST['sort_desc'])) {
        $books = $book->SORT_price_DESC();
    } elseif (isset($_POST['sort'])) {
        $books = $book->SORT_price();
    } elseif (isset($_POST['search'])) {
        $books = $book->searchByName($_POST['search']);
    }
} 
else { // Khi đã chọn theo danh mục
    $activeCategory = $_POST['catelog'];
    $books = $book->getProductsbyDM($activeCategory);
} 


// (2) Phần addToCart - CheckOut
if (isset($_POST['btn-add-cart'])  && isset($_SESSION['user_name'])) {// AddToCart
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $soluong = $_POST['soluong'];
    $price = $_POST['price'];
    $trung = 0;
    $sp = ["id" => $id, "img" => $img, "name" => $name, "price" => $price, "soluong" => $soluong];
    $_SESSION['giohang'][] = $sp;
} 
elseif (isset($_POST['pay_products']) && isset($_SESSION['user_name'])) {// Khi tiến hành Đặt hàng
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $currentTime =  new DateTime();
    $currentTime = $currentTime->format("Y-m-d H:i:s");
    $user = new APP\user($pdo);
    $user = $user->user_theo_name($_SESSION['user_name']);
    $HD = new APP\hoa_don($pdo);
    $result = $HD->add_HD($user->ID,$currentTime,$_SESSION['giohang'],$address,$phone);// Thêm hóa đơn
    if ($result) {
        echo "<script> alert('Bạn đã đặt hàng thành công.');</script>";
    } else {
        echo "<script> alert('Đặt hàng không thành công.');</script>";
    }
    unset($_SESSION['giohang']);

}

//(3) Phần Xem và chỉnh sửa giỏ hàng
if (isset($_POST['viewcart']) && isset($_SESSION['user_name']) ) {
    if (isset($_POST['del_cart'])) {// Xóa
        $stt = $_POST['stt'];
        array_splice($_SESSION['giohang'], $stt, 1);
    }
    $user_name = $_SESSION['user_name'];
    require_once __DIR__ . '/../src/templates/headerlogin.php';
    require_once __DIR__ . '/../src/templates/viewcart.php';

}
elseif (isset($_POST['pay']) && isset($_SESSION['user_name'])) {// Chuyển sang trang checkOut
    $user = new APP\user($pdo);
    $user = $user->user_theo_name($_SESSION['user_name']);
    require_once __DIR__ . '/../src/templates/pay.php';
    
}
else { // Khi chưa thực hiện thao tác nào (giao diện trang chủ)
    $dm = showDm($catelogs, $activeCategory);
    if (!isset($_SESSION['user_name'])) {
        require_once __DIR__ . '/../src/templates/headerlogout.php';
    } else {
        $user_name = $_SESSION['user_name'];
        require_once __DIR__ . '/../src/templates/headerlogin.php';
    } 
   
    require_once __DIR__ . "/../src/templates/phan_trang.php";
    require_once __DIR__ . "/../src/templates/content.php";
    require_once __DIR__ . '/../src/templates/footer.php';
}
