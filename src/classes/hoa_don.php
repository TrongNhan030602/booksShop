<?php

namespace APP;

use PDO;
use DateTime;

class hoa_don
{
    private PDO $connection;

    public int $ID;
    public DateTime $time_date;
    public int $idUser;
    public string $user_name;
    public string $address;
    public string $phone;
    public int $tong_tien;
    public array $list_books;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    // Lấy tất cả Hóa Đơn
    public function hoa_don_all(): array
    {
        $sql = 'SELECT a.id_hd, b.time_date, a.tong_tien, c.user_name
                FROM hoa_don_view a, hoa_don b, user c 
                WHERE a.id_hd = b.id_hd and c.id=b.ID_user
                ORDER BY a.id_hd';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $hoadon_ds = [];
        while ($row = $statement->fetch()) {
            $hoadon = new hoa_don($this->connection);
            $hoadon->ID = $row['id_hd'];
            $hoadon->time_date = new DateTime($row['time_date']);
            $hoadon->tong_tien = $row['tong_tien'];
            $hoadon->user_name = $row['user_name'];
            $hoadon_ds[] = $hoadon;
        };
        return $hoadon_ds;
    }

    // Lấy hóa đơn theo ID
    public function hoa_don_theo_ID(int $id_hd): hoa_don
    {
        $sql = 'SELECT *
                FROM hoa_don_view a, hoa_don b, user c
                WHERE a.id_hd = b.id_hd and c.id=b.ID_user and b.id_hd = :id_hd
                ORDER BY a.id_hd';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id_hd' => $id_hd]);
        $row = $statement->fetch();
        $hoadon = new hoa_don($this->connection);
        $hoadon->ID = $row['id_hd'];
        $hoadon->time_date = new DateTime($row['time_date']);
        $hoadon->tong_tien = $row['tong_tien'];
        $hoadon->address = $row['address'];
        $hoadon->user_name = $row['user_name'];
        $hoadon->phone = $row['phone'];
        return $hoadon;
    }

    // Thêm hóa đơn (khi người dùng Thanh toán)
    public function add_HD(int $idUser, string $DateTime, array $list_books, string $address, string $phone): bool
    {
        // Tạo một hóa đơn mới
        $sql_insert_hoadon = 'INSERT INTO hoa_don (ID_user, address, time_date, phone) VALUES (:ID_user, :address, :time_date, :phone)';
        $statement_insert_hoadon = $this->connection->prepare($sql_insert_hoadon);
        $statement_insert_hoadon->bindParam(':ID_user', $idUser, PDO::PARAM_INT);
        $statement_insert_hoadon->bindParam(':address', $address, PDO::PARAM_STR);
        $statement_insert_hoadon->bindParam(':time_date', $DateTime, PDO::PARAM_STR);
        $statement_insert_hoadon->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result_insert_hoadon = $statement_insert_hoadon->execute();
    
        if (!$result_insert_hoadon) {
            // Xử lý lỗi khi thêm hóa đơn
            return false;
        }
    
        // Lấy ID của hóa đơn vừa thêm
        $id_hd = $this->connection->lastInsertId();
    
        // Thêm sách vào chi tiết hóa đơn
        $sql_insert_chitiet = 'INSERT INTO info_hoa_don (id_hd, ID_SP, solg) VALUES (:id_hd, :ID_SP, :solg)';
        $statement_insert_chitiet = $this->connection->prepare($sql_insert_chitiet);
    
        foreach ($list_books as $book) {
            $result_insert_chitiet = $statement_insert_chitiet->execute([
                ':id_hd' => $id_hd,
                ':ID_SP' => $book['id'],
                ':solg' => $book['soluong'],
            ]);
    
            if (!$result_insert_chitiet) {
                // Xử lý lỗi khi thêm chi tiết hóa đơn
                return false;
            }
        }
    
        return true;
    }
    
}
