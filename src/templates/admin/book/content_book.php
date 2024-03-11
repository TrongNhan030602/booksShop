<div id="content">
    <div id="product-management-content">
        <h2>Quản lý sản phẩm</h2>
        <!-- Button để mở modal thêm sản phẩm -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addProductModal">
            <i class="fas fa-plus"></i> Add
        </button>

        <!-- Danh sách sản phẩm -->
        <div class="product-list" id="productList">
            <h3>Danh Sách Sản Phẩm</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Thể Loại</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    
                    <?php $i=1; foreach ($books as $item) : ?>
                        <tr>
                            <td style="max-width: 30px"><?= $i ?></td>
                            <td style="max-width: 50px"><?= htmlspecialchars($item->name) ?></td>
                            <td><img src="/../public/assets/img/img_product/<?= htmlspecialchars($item->img) ?>.jpg" alt="img"
                                    style="max-width: 50px; max-height: 50px;"></td>
                            <td style="max-width: 50px"><?= htmlspecialchars($item->ten_dm) ?></td>
                            <td style="max-width: 50px"><?= htmlspecialchars(number_format($item->price,0,",",".")) . ' VND' ?></td>
                            <td><?= htmlspecialchars($item->hang_ton) ?></td>
                            <td>
                            <form action="" method="POSt">
                                <input type="text" value="book" name="table"style="display: none;">
                                    <input type="text" name="ID_book" value="<?= htmlspecialchars($item->id) ?>" style="display: none;">
                                <button class="btn btn-warning" data-toggle="modal" name="action" value="model_update" type="submit"
                                    data-target="#editUserModal">Sửa/ Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        <!-- Modal thêm sản phẩm -->
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Thêm Sản Phẩm Mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form thêm sản phẩm -->
                        <form method="POST" action="">
                            <input type="text" name="table" value="book" style="display: none;">
                            <input type="text" name="action" value="add" style="display: none;">
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputProductName" name="tenSP"
                                    placeholder="Nhập tên sản phẩm" required>
                            </div>
                            <div class="form-group">
                                <input type="number" min="0" class="form-control" name="price"
                                    placeholder="Giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <input type="number" min="0" class="form-control" name="oldprice"
                                    placeholder="Giá củ sản phẩm">
                            </div>
                            <div class="form-group">
                                <input type="number" min="0" class="form-control" name="solg"
                                    placeholder="Số lượng">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="nameAuthor" placeholder="Tên tác giả">
                            </div>
                            <div class="form-group">
                                <label for="topic-name" class="col-form-label">Hình ảnh</label>
                                <input type="file" name="img" class="col-form-label" id="">
                            </div>
                            <div class="form-group">
                                <label for="topic-name" class="col-form-label">Mô tả</label>
                                <textarea name="mota" id="" cols="30" rows="5" style="width:100%; border:1px #CCC solid"
                                    class="col-form-label"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="type" class="col-form-label">Chọn loại sách:</label>
                                <select class="form-control select2" name="type">
                                    <option value="1">Sách giáo khoa</option>
                                    <option value="2">Sách khoa học</option>
                                    <option value="3">Tiểu thuyết, truyện tranh</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>