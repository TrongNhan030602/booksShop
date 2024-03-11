<?php
namespace APP;
use PDO;

class user
{
    private PDO $connection;

    public int $ID;
    public string $username;
    public string $user_email;
    public string $user_pass;
    public string $role;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function check_admin($username): bool
    {
        $sql = 'SELECT role FROM user WHERE user_name = :username';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['username' => $username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem người dùng có tồn tại và có quyền admin không
        if ($user['role'] == 1) {
            return true; // Người dùng có quyền admin
        } else {
            return false; // Người dùng không có quyền admin hoặc không tồn tại
        }
    }

    public function check_user_name($username, $user_pass): bool
    {
        $sql = 'SELECT * FROM user WHERE user_name = :username';
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'username' => $username
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        // Kiểm tra xem có người dùng với tên người dùng đã cho không và kiểm tra mật khẩu
        if ($user !== false && md5($user_pass ) == $user['user_pass'] ) {
            return true; // Tên người dùng và mật khẩu khớp
        } else {
            return false; // Tên người dùng không tồn tại hoặc mật khẩu không khớp
        }
    }

    // Hàm Add User 
    public function add_user($username, $user_email, $user_pass): int
    {
        // Kiểm tra xem tên người dùng đã tồn tại chưa
        if ($this->is_username_exists($username)) {
            return 0; // Tên người dùng đã tồn tại
        }

        // Kiểm tra xem email đã tồn tại chưa
        if ($this->is_email_exists($user_email)) {
            return -1; // Email đã tồn tại
        }

        // Câu lệnh SQL để chèn một người dùng mới
        $sql = 'INSERT INTO user (user_name, user_email, user_pass) VALUES (:username, :user_email, :user_pass)';

        // Chuẩn bị câu lệnh SQL
        $statement = $this->connection->prepare($sql);

        // Thực thi câu lệnh SQL với các tham số đã được cung cấp
        $result = $statement->execute([
            'username' => $username,
            'user_email' => $user_email,
            'user_pass' => md5($user_pass)
        ]);

        // Kiểm tra xem thêm người dùng có thành công không
        return $result;
    }

    // Hàm Kiểm tra xem tên người dùng đã tồn tại chưa
    private function is_username_exists($username): bool
    {
        $sql = 'SELECT COUNT(*) FROM user WHERE user_name = :username';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['username' => $username]);
        $count = $statement->fetchColumn();

        return $count > 0;
    }

    // Hàm Kiểm tra xem email đã tồn tại chưa
    private function is_email_exists($user_email): bool
    {
        $sql = 'SELECT COUNT(*) FROM user WHERE user_email = :user_email';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['user_email' => $user_email]);
        $count = $statement->fetchColumn();

        return $count > 0;
    }


    // Hàm Update User
    
    public function update_user($ID, $username, $user_email, $old_pass, $new_pass, $role): bool
    {
        try {
            // Kiểm tra mật khẩu cũ trước khi cập nhật
            if ($this->check_old_password($ID, $old_pass)) {
                // Câu lệnh SQL để cập nhật thông tin người dùng
                $sql = 'UPDATE user SET user_name = :username, user_email = :user_email, user_pass = :new_pass, role = :role WHERE ID = :ID';

                $statement = $this->connection->prepare($sql);

                $statement->bindParam(':ID', $ID, PDO::PARAM_INT);
                $statement->bindParam(':username', $username, PDO::PARAM_STR);
                $statement->bindParam(':user_email', $user_email, PDO::PARAM_STR);
                $hashed_password = md5($new_pass);
                $statement->bindParam(':new_pass', $hashed_password, PDO::PARAM_STR);
                $statement->bindParam(':role', $role, PDO::PARAM_STR);

                // Thực thi câu lệnh SQL và kiểm tra kết quả
                $result = $statement->execute();

                // Kiểm tra xem cập nhật có thành công không
                return $result;
            } else {
                // Mật khẩu cũ không khớp
                return false;
            }
        } catch ( \PDOException $e) {
            error_log('Lỗi cơ sở dữ liệu: ' . $e->getMessage());
            return false;
        }
    }

    // Hàm kiểm tra password đã tồn tại chưa 
    private function check_old_password($ID, $old_pass): bool
    {
        // Lấy mật khẩu cũ từ database
        $sql = 'SELECT user_pass FROM user WHERE ID = :ID';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':ID', $ID, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch();

        // Kiểm tra mật khẩu cũ
        return md5($old_pass) == $row['user_pass'];
    }
    // Hàm Delete User
    public function delete($user_id): bool
    {
        $sql = 'DELETE FROM user WHERE id = :user_id';
        $statement = $this->connection->prepare($sql);

        // Bind giá trị của user_id và thực thi câu lệnh SQL
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result = $statement->execute();

        return $result;
    }

    // Các hàm Select User
    public function user_all(): array
    {
        $sql = 'SELECT * FROM user';
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        $users = [];
        while ($row = $statement->fetch()) {
            $user = new user($this->connection);
            $user->ID = $row['id'];
            $user->user_email = $row['user_email'];
            $user->username = $row['user_name'];
            $user->role = $row['role'];
            $users[] = $user;
        };

        return $users;
    }
    public function user_theo_ID(int $ID_user): user
    {
        $sql = 'SELECT * FROM user WHERE id = :ID_user';
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'ID_user' => $ID_user
        ]);

        $row = $statement->fetch();
        $user = new user($this->connection);
        $user->ID = $row['id'];
        $user->user_email = $row['user_email'];
        $user->username = $row['user_name'];
        $user->role = $row['role'];


        return $user;
    }

    public function user_theo_name(string $user_name): user
    {
        $sql = 'SELECT * FROM user WHERE user_name = :user_name';
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'user_name' => $user_name
        ]);

        $row = $statement->fetch();
        $user = new user($this->connection);
        $user->ID = $row['id'];
        $user->user_email = $row['user_email'];
        $user->username = $row['user_name'];
        $user->role = $row['role'];


        return $user;
    }
    
}
