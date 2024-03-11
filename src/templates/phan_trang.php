<?php
$sanPhamTrenMotTrang = 10;
$tongSoSanPham = count($books); 
$tongSoTrang = ceil($tongSoSanPham / $sanPhamTrenMotTrang);//Làm tròn lên


$trangHienTai = isset($_GET['trang']) ? $_GET['trang'] : 1;

// Đảm bảo trang hiện tại nằm trong phạm vi hợp lý
$trangHienTai = max(1, min($tongSoTrang, $trangHienTai));

// Tính vị trí bắt đầu và kết thúc của sản phẩm trên trang hiện tại
$batDau = ($trangHienTai - 1) * $sanPhamTrenMotTrang;
$ketThuc = $batDau + $sanPhamTrenMotTrang;

// Lấy chỉ mục sản phẩm từ mảng dựa trên trang hiện tại
$sanPhamHienThi = array_slice($books, $batDau, $sanPhamTrenMotTrang);

// Hiển thị các liên kết phân trang
$pagination ='<ul class="pagination home-product__pagination">
                 <li class="pagination-item">';

if ($trangHienTai > 1) {
    $pagination.= '<a href="?trang='.($trangHienTai - 1).'" class="pagination-item__link">
                <i class="pagination-item__icon fas fa-angle-left"></i>
            </a>';
} else {
    $pagination.='<span class="pagination-item__link pagination-item__link--disabled">
                <i class="pagination-item__icon fas fa-angle-left"></i>
            </span>';
}
echo '</li>';
for ($i = 1; $i <= $tongSoTrang; $i++) {
    $activeClass = ($i == $trangHienTai) ? 'pagination-item--active' : '';
    $pagination.= "<li class='pagination-item $activeClass'>
            <a class='pagination-item__link' href='?trang=$i'>
            $i
            </a>
        </li>
        ";
}
echo '<li class="pagination-item">';
if ($trangHienTai < $tongSoTrang) {
    $pagination.='<a href="?trang='.($trangHienTai + 1).'" class="pagination-item__link">
            <i class="pagination-item__icon fas fa-angle-right"></i>
        </a>';
} else {
    $pagination.='<span class="pagination-item__link pagination-item__link--disabled">
            <i class="pagination-item__icon fas fa-angle-right"></i>
        </span>';
}
$pagination.='</li>
</ul>';
?>
