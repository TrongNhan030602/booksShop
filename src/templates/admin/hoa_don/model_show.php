
<div id="content">
        <div id="product-management-content">
            <h2>Chi Tiết Hóa Đơn</h2><br>
            <!-- Button để mở modal thêm sản phẩm -->
            <h4>Thông Tin Khách Hàng</h4>
            <br>
            <p><strong>Tên Khách Hàng: </strong> <?= htmlspecialchars($hoa_don -> user_name) ?></p>
            <p><strong>Địa chỉ: </strong> <?= htmlspecialchars($hoa_don ->address) ?></p>
            <p><strong>Số điện thoại: </strong> <?= htmlspecialchars($hoa_don ->phone) ?></p>
            <p><strong>Ngày Mua: </strong> <?= htmlspecialchars($hoa_don ->time_date->format('Y-m-d H:i:s')) ?></p>

            <!-- Danh sách sản phẩm -->
            <div class="product-list" id="productList">
                <!-- Bảng Chi Tiết Hóa Đơn -->
                <h4>Sản phẩm của hóa đơn</h4>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên SP</th>
                            <th>Số Lượng</th>
                            <th>Giá Tiền</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $i=1;
                        foreach ($books as $item) : ?>
                        <tr>
                            <td style="width: 5px;"><?= htmlspecialchars($i) ?></td>
                            <td style="width: 70px;"><?= htmlspecialchars($item->name) ?></td>
                            <td style="width: 10px;"><?= htmlspecialchars($item->solg) ?></td>
                            <td style="width: 20px;"><?= htmlspecialchars(number_format($item->price,0,",",".")) ?></td>
                            <td class="font-weight-bold" style="width: 20px;"><?= htmlspecialchars(number_format($item->price*$item->solg,0,",",".")) ?></td>
                        </tr>
                        <?php $i++; 
                    endforeach ?>
                    </tbody>
                </table>

                <!-- Tổng tiền của hóa đơn -->
                <h4><strong>Tổng Tiền:</strong> <?= (number_format($hoa_don -> tong_tien,0,",",".")) .' <span class="text-success">VND</span>'?></h4>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input type="text" value="hoa_don" name="table" style="display: none;">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </form>
            </div>