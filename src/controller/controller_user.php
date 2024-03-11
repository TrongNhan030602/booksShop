<?php
require_once __DIR__ . '/../bootstrap.php';
$pdo = connect_db();
$user = new APP\user($pdo);

if (isset($_POST['ID_user'])) {
    $ID_user = $_POST['ID_user'];
    $user = $user->user_theo_ID($ID_user);
    require_once __DIR__ . '/../templates/admin/user/model_update.php';
} elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $ID = $_POST['ID'];

    // Thực hiện hành động xóa 
    $deleteResult = $user->delete($ID);

    // Hiển thị thông báo dựa trên kết quả của hoạt động xóa
    if ($deleteResult) {
        echo "<script> alert('Người dùng đã bị xóa thành công.');</script>";
    } else {
        echo "<script> alert('Không thể xóa người dùng.');</script>";
    }
}elseif (isset($_POST['action']) && $_POST['action'] == 'add') {
    $name = $_POST['user_name'];
    $password = $_POST['user_pass'];
    $email = $_POST['user_email'];
    $success = $user->add_user(username:$name, user_pass:$password, user_email:$email);
    if($success == 1){
      echo '<script>alert("Đăng ký thành công.");</script>';
    }
    else if($success == -1) { echo '<script>alert("Email đã bị trùng.");</script>';} 
    else if($success == 0) { echo '<script>alert("User name đã bị trùng.");</script>';} 
}elseif (isset($_POST['action']) && $_POST['action'] == 'update') {
        // Xử lý dữ liệu từ biểu mẫu cập nhật ở đây
        $ID = $_POST['ID'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $role = isset($_POST['role']) ? 1 : 0; // Kiểm tra nếu người dùng chọn quyền admin
    
        // Gọi hàm update_user
        $updateResult = $user->update_user($ID, $username, $user_email, $old_pass, $new_pass,$role);
    if ($updateResult) {
        echo "<script> alert('Cập nhật thông tin người dùng thành công.');</script>";
    } else {
        echo "<script> alert('Không thể cập nhật thông tin người dùng.');</script>";
    }
}
 
else {
    $users = $user->user_all();
    require_once __DIR__ . '/../templates/admin/user/content_user.php';
}
?>
