<div class="grid wide cart__session">
    <div class="row ">
        <div class="col l-12 c-12 m-12">
            <div class="cart__header">
                <h1 class="cart__heading">Shopping Cart</h1>
                <ul class="cart__navbar">
                    <li class="cart__navbar-item"><a class="cart__navbar-item-link" href="index.php"> Home</a></li>
                    <li class="cart__navbar-item">Cart</li>
                </ul>
            </div>

        </div>
    </div>
    <!--  Cart content-->

    <div class="row">
        <!--Cart section start-->
        <div class=" col l-12 c-12 m-12">
            <div class=" cart__content">
                <!-- Cart Table -->
                <div class="cart__content-table">
                    <?php 
                        // Kiểm tra xem giỏ hàng có sản phẩm không
                        if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                    ?>
                    <table class="cart__table ">
                        <thead class="cart__table-thead">
                            <tr>
                                <th class="cart__table-thumbnail">Image</th>
                                <th class="cart__table-title">Product</th>
                                <th class="cart__table-price">Price</th>
                                <th class="cart__table-quantity">Quantity</th>
                                <th class="cart__table-subtotal">Total</th>
                                <th class="cart__table-remove">Remove</th>
                            </tr>
                            <hr class="cart__table-thead-hr">
                        </thead>
                        <tbody>
                            <?php 
                                if(isset($_SESSION['giohang']) && is_array($_SESSION['giohang'])){
                                    $i=0;
                                    foreach ($_SESSION['giohang'] as $item) {
                                        extract($item);
                                        $tt=$price*$soluong;
                                        $linkdel ="index.php?pg=delcart&ind=".$i;
                                        echo '<tr class="cart__table-thead-tr">
                                                <td class="cart__table-thumbnail"><a href="#"><img
                                                    src="/public/assets/img/img_product/'.htmlspecialchars($img).'.jpg" alt="Product"></a>
                                                </td>
                                                <td class="cart__table-title"><a href="#">'.htmlspecialchars($name).'</a></td>
                                                <td class="cart__table-price"><span>'.htmlspecialchars(number_format($price,0,",",".")).'đ</span></td>
                                                <td class="cart__table-quantity">
                                                    <div class="cart__table-qty">
                                                        <button class="minus-btn qtybtn" onclick="decreaseQuantity(this)">-</button>
                                                        <input class="amount-input quantity" type="number" value="'.htmlspecialchars($soluong).'" min="1" readonly>
                                                        <button class="plus-btn qtybtn" onclick="increaseQuantity(this)">+</button>
                                                    </div>
                                                </td>
                                                <td class="cart__table-subtotal"><span>'.htmlspecialchars(number_format($tt,0,",",".")).'đ</span></td>
                                                <td class="cart__table-remove">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="viewcart">
                                                        <input type="hidden" name="del_cart">
                                                        <input type="hidden" name="stt" value="'.$i.'">
                                                        <button type="submit" class="cart__table-remove-btn"><i class="fa-regular fa-trash-can"></i></button>
                                                    </form>
                                                </td>
                                            </tr>';
                                            $i++;                              

                                    }
                                   
                                }  
                                
                                

                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="cart__footer">
                                <td colspan="4" class="cart__footer-title">
                                    <h4 style="line-height: 45px;">Tổng:</h4>
                                </td>
                                <td class="cart__footer-sum-value text-center">
                                    <h4 style="line-height: 45px;">0đ</h4>
                                </td>
                                <td class="text-center cart__footer-checkout">
                                    <div class="cart__footer-summary">
                                        <form action="" method="post">
                                            <button type="submit" class="cart__checkout-btn btn" name="pay">Thanh
                                                toán</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php 
                        } else {
                            echo '<h1 class="text-center" style="color:red">Giỏ hàng đang trống!</h1>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--Cart  end-->
    </div>
</div>
<script src="/../public/assets/js/viewcart.js"></script>