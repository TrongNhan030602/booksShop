<div id="content">

<div id="invoice-management-content" >
            <h2>Quản lý hóa đơn</h2>
            <div class="invoice-list" id="invoiceList">
                <h3>Danh Sách Hóa Đơn</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ngày tạo</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="invoiceTableBody">
                        <?php $i=1; foreach($hoa_dons as $item):?>
                        <!-- Dữ liệu hóa đơn sẽ được hiển thị ở đây -->
                        <tr>
                            <td><?= $i?></td>
                            <td><?= htmlspecialchars($item ->time_date->format('Y-m-d H:i:s')) ?></td>
                            <td><?= htmlspecialchars($item -> user_name) ?></td>
                            <td><?= htmlspecialchars(number_format($item -> tong_tien,0,",",".")). ' VND'?></td>
                            <td><form action="" method="post">
                            <input type="text" value="hoa_don" name="table"style="display: none;">
                                    <input type="text" name="id_hd" value="<?= htmlspecialchars($item->ID) ?>" style="display: none;">
                                <button class="btn btn-info" name="action" value="model_show">Xem</button>
                            </form>
                            </td>
                        </tr>
                        <?php $i++; endforeach ;?>
                    </tbody>
                </table>
            </div>

        </div>
