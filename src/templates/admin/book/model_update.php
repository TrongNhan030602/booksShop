
<div id="content">
    <div id="product-management-content">
        <h2>Cập Nhật Sản Phẩm</h2>
        <form method="post" action="">
            <input type="text" value="book" name="table" style="display: none;"> <!--Chọn bảng-->
            <input type="text" value="update" name="action" style="display: none;"><!--Chọn thao tác-->
            <input type="text" value="<?= htmlspecialchars($book->id) ?>" name="ID_BOOK" style="display: none;">
            <div class="form-group">
                <label for="inputEditProductName">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="inputEditProductName" placeholder="Nhập tên sản phẩm"
                    name="tenSP" value="<?= htmlspecialchars($book->name) ?>" required><!--Giá dc gửi đi-->
            <div class="form-group">
                <label for="inputEditPrice">Giá sản phẩm:</label>
                <input type="number" min="0" class="form-control" id="inputEditPrice" placeholder="Nhập giá sản phẩm"
                   name="price" value="<?= htmlspecialchars($book->price) ?>" required>
            </div>
            <div class="form-group">
                <label for="inputEditOldQuanty">Số lượng sản phẩm:</label>
                <input type="number" min="0" class="form-control" id="inputEditOldQuanty"
                   name="solg" value="<?= htmlspecialchars($book->hang_ton) ?>" placeholder="Nhập giá số lượng sản phẩm" required>
            </div>
            <div class="form-group">
                <label for="inputEditAuthor">Tên tác giả:</label>
                <input type="text" class="form-control" id="inputEditAuthor" placeholder="Nhập tên tác giả"
                   name="nameAuthor" value="<?= htmlspecialchars($book->author) ?>" required>
            </div>
            <div class="form-group">
                <label for="type" class="col-form-label">Chọn loại sách:</label>
                <select class="form-control" name="type">
                    <option value="1">Sách giáo khoa</option>
                    <option value="2">Sách khoa học</option>
                    <option value="3">Tiểu thuyết, truyện tranh</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            </div>
        </form>
        <form action="" method="POST" class="d-flex justify-content-end mr-3" >
            <input type="text" value="book" name="table" style="display: none;">
            <input type="text" value="<?= htmlspecialchars($book->id) ?>" name="ID_BOOK" style="display: none;">
            <button type="submit" class="btn btn-danger" name="action" value="delete">Xác nhận xóa</button><br>
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </form>
    </div>
</div>