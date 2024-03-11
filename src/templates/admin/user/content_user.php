<div id="content">
 <!-- Quản lý thành viên -->
 <div id="user-management-content">
            <h2>Quản lý thành viên</h2>
            <!-- Thêm các thành phần quản lý thành viên tại đây -->
            <!-- Button để mở modal thêm thành viên -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUserModal">
                <i class="fas fa-plus"></i> Add
            </button>
            <!-- Danh sách thành viên -->
            <div class="user-list" id="userList">
                <h3>Danh Sách Thành Viên</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Username</th>
                            <th>Useremail</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                    <?php $i=1; foreach ($users as $item) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= htmlspecialchars($item->username)?></td>
                            <td><?= htmlspecialchars($item->user_email)?></td>
                            <td><?= $item->role ? 'admin' : 'member' ;?></td>
                            <td>
                                <form action="" method="POST">
                                <input type="text" value="user" name="table"style="display: none;">
                                    <input type="text" name="ID_user" value="<?= htmlspecialchars($item->ID) ?>" style="display: none;">
                                <button class="btn btn-warning" data-toggle="modal" name="action" value="model_update" type="submit"
                                    data-target="#editUserModal">Sửa/Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++; endforeach;?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- Modal thêm thành viên -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Thêm Thành Viên Mới</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form thêm thành viên -->
                        <form method="post" action="">
                            <input type="text" value="user" name="table" style="display: none;">
                            <input type="text" value="add" name="action" style="display: none;">
                            <div class="form-group">
                                <label for="inputUsername">Username</label>
                                <input type="text" class="form-control" id="inputUsername" name="user_name"
                                    placeholder="Nhập tên đăng nhập" required>
                            </div>
                            <div class="form-group">
                                <label for="inputUsername">UserEmail</label>
                                <input type="text" class="form-control" id="inputUsername" name="user_email"
                                    placeholder="Nhập email người dùng" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="user_pass"
                                    placeholder="Nhập mật khẩu" required>
                            </div>
                            <!-- <div class="form-check">
                                <input type="checkbox" value="1" class="form-check-input" id="inputRole">
                                <label class="form-check-label" for="inputRole">Quyền Admin</label>
                            </div> -->

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" name="add-user-btn" class="btn btn-primary">Thêm Thành
                                    Viên</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        

        <!-- Modal xóa thành viên -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel"
            aria-hidden="true">
            <!-- Nội dung Modal -->
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteProductModalLabel">Xóa thành viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa thành viên này?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger">Xóa</button>
                    </div>
                </div>
            </div>
        </div>