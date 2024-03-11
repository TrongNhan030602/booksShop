<!-- Modal sửa hóa đơn -->

<div id="content">
    <div id="product-management-content">
        <form action="" method="post">
            <input type="text" value="hoa_don" name="table" style="display: none;">
            <h2>Chi Tiết Hóa Đơn</h2><br>
            <h4>Thông Tin Khách Hàng</h4>
            <form>
                <div class="form-group">
                    <label for="editCustomerName">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="editCustomerName" name="username"
                        value="<?= $hoa_don -> user_name ?>">
                </div>
                <div class="form-group">
                    <label for="editInvoiceDate">Ngày Mua</label>
                    <input type="datetime" class="form-control" id="editInvoiceDate" name="DateTime"
                        value="<?= $hoa_don ->time_date->format('Y-m-d H:i:s') ?>">
                </div>
                <!-- Danh sách sản phẩm -->
                <div class="product-list" id="productList">
                    <!-- Bảng Chi Tiết Hóa Đơn -->
                    <h4>Sản phẩm của hóa đơn</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên SP</th>
                                <th>Số Lượng</th>
                                <th>Giá Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=1;
                        foreach ($books as $item) : ?>
                            <tr>
                                <td style="width: 5px;"><?= htmlspecialchars($i) ?></td>
                                <td style="width: 70px;"><?= htmlspecialchars($item->name) ?></td>
                                <td style="width: 10px;"><input type="text" class="form-control"
                                        value="<?= htmlspecialchars($item->solg) ?>"></td>
                                <td style="width: 20px;"><input type="text" class="form-control"
                                        value="<?= htmlspecialchars($item->price) ?>"></td>
                            </tr>
                            <?php $i++; 
                    endforeach ?>
                        </tbody>
                    </table>

                    <!-- Tổng tiền của hóa đơn -->
                    <h4>Tổng Tiền: <?= $hoa_don -> tong_tien ?></h4>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-danger" name="action" value="update">Lưu Thay Đổi</button>
                </div>
            </form>

            <form action="" method="post" class="d-flex justify-content-end mr-3">
                <input type="text" value="hoa_don" name="table" style="display: none;">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </form>