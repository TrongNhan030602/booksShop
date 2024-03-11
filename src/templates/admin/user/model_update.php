<div id="content">
    <!-- Quản lý thành viên -->
    <div id="user-management-content">
        <h2>Cập Nhật Thành Viên</h2>
        <!-- Thêm các thành phần quản lý thành viên tại đây -->
        <form action="" method="POST">
            <input type="text" value="user" name="table" style="display: none;">
            <input type="text" value="update" name="action" style="display: none;">
            <input type="text" value="<?= htmlspecialchars($user->ID) ?>" name="ID" style="display: none;">
            <div class="form-group">
                <label for="inputEditUsername">Username</label>
                <input type="text" class="form-control" id="inputEditUsername" placeholder="Nhập tên đăng nhập" name="username"
                    value="<?= htmlspecialchars($user->username)?>" required>
            </div>
            <div class="form-group">
                <label for="inputEditEmail">Email</label>
                <input type="Email" class="form-control" id="inputEditEmail" placeholder="Nhập email" name="user_email"
                    value="<?= htmlspecialchars($user->user_email)?>" required>
            </div>
            <div class="form-group">
                <label for="inputEditPasswordOld">Mật khẩu cũ</label>
                <input type="Password" class="form-control" id="inputEditPasswordOld" placeholder="Nhập mật khẩu cũ" name="old_pass"
                    required>
            </div>
            <div class="form-group">
                <label for="inputEditPassword">Mật khẩu mới</label>
                <input type="Password" class="form-control" id="inputPassword" placeholder="Nhập mật khẩu mới" name="new_pass"
                    required>
            </div>
            <div class="form-group">
                <label for="inputEditRole">Role</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="inputEditRole" name="role">
                    <label class="form-check-label" for="inputEditRole">Quyền Admin</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            </div>
        </form>
        <form action="" method="post" class="d-flex justify-content-end mr-3">
            <input type="text" value="user" name="table" style="display: none;">
            <input type="text" value="<?= htmlspecialchars($user->ID) ?>" name="ID" style="display: none;">
            <button type="submit" class="btn btn-danger" name="action" value="delete">Xác nhận xóa</button><br>
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </form>
    </div>

</div>