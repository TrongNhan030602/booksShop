<?php
namespace APP;
use PDO;

class book {
    private PDO $connection;
    public int $id;
    public string $name;
    public int $price;
    public string $img;
    public string $mota;
    public int $view;
    public int $id_dm;
    public string $author;
    public int $old_price;
    public string $ten_dm;
    public string $sort_name;
    public int $hang_ton;
    public int $solg;

    public function __construct(PDO $connection){
        $this->connection = $connection;
    }

    // Lấy tất cả sản phẩm từ cơ sở dữ liệu
    public function getAllProducts(): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm
                ORDER BY a.id';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }
    
     // Hàm thêm sản phẩm
     public function themSanPham(string $ten,int $gia,string $anh,string $moTa,int $idDanhMuc,string $tacGia,int $soLuong,int $giaCu) :bool {
        // Câu truy vấn SQL để thêm sản phẩm mới
        $sql = 'INSERT INTO sanpham (name, price, img, mota, id_dm, author, quantity, old_price) 
                VALUES (:ten, :gia, :anh, :moTa, :idDanhMuc, :tacGia, :soLuong, :giaCu)';

        // Chuẩn bị câu truy vấn SQL
        $statement = $this->connection->prepare($sql);

        // Gắn các tham số
        $statement->bindParam(':ten', $ten);
        $statement->bindParam(':gia', $gia);
        $statement->bindParam(':anh', $anh);
        $statement->bindParam(':moTa', $moTa);
        $statement->bindParam(':idDanhMuc', $idDanhMuc);
        $statement->bindParam(':tacGia', $tacGia);
        $statement->bindParam(':soLuong', $soLuong);
        $statement->bindParam(':giaCu', $giaCu);

        // Thực hiện câu truy vấn
        $ketQua = $statement->execute();

        return $ketQua;
    }

    // Hàm cập nhật sản phẩm
    public function Update(int $id, string $ten,int $gia, int $idDanhMuc,string $tacGia,int $soLuong) :bool {
        // Câu truy vấn SQL để thêm sản phẩm mới
        $sql = 'UPDATE sanpham 
                SET name= :ten, price = :gia, id_dm = :idDanhMuc, author = :tacGia, quantity = :soLuong 
                WHERE id = :id';

        // Chuẩn bị câu truy vấn SQL
        $statement = $this->connection->prepare($sql);

        // Gắn các tham số
        $statement->bindParam(':id', $id);
        $statement->bindParam(':ten', $ten);
        $statement->bindParam(':gia', $gia);
        $statement->bindParam(':idDanhMuc', $idDanhMuc);
        $statement->bindParam(':tacGia', $tacGia);
        $statement->bindParam(':soLuong', $soLuong);

        // Thực hiện câu truy vấn
        $ketQua = $statement->execute();

        return $ketQua;
    }

    // Hàm xóa sản phẩm
    public function delete(int $id): bool {
        $sql = 'DELETE FROM sanpham WHERE id = :id';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':id', $id);
        $ketQua = $statement->execute();
    
        return $ketQua;
    }
    // Hàm tìm kiếm sản phẩm theo tên
    public function searchByName($book_name): array {
        $sql = 'SELECT a.id, a.name, a.price, a.img, a.view, a.author, a.old_price, a.quantity, b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a
                LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm = b.id_dm AND a.name LIKE :name';
        $statement = $this->connection->prepare($sql);
        
        // Sử dụng bindValue thay vì bindParam
        $statement->bindValue(':name', '%' . $book_name . '%', PDO::PARAM_STR);
        
        $statement->execute();
        
        $books = [];
        
        while ($row = $statement->fetch()) {
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold'] == null) ? 0 : $row['sold'];
            $books[] = $book;
        }
    
        return $books;
    }
    // Hàm tìm kiếm sản phẩm theo ID
    public function searchById($id): book {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.quantity,b.name_dm
                FROM sanpham a, danhmuc b
                WHERE a.id_dm =b.id_dm and a.id = :ID;
                ORDER BY a.id';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['ID' => $id]);
        $row = $statement->fetch();
        $book = new book($this->connection);
        $book->id = $row['id'];
        $book->name = $row['name'];
        $book->price = $row['price'];
        $book->img = $row['img'];
        $book->view = $row['view'];
        $book->author = $row['author'];
        $book->hang_ton = $row['quantity'];
        $book->ten_dm = $row['name_dm'];
        return $book;
    }

    // Các hàm lấy/sắp xếp sản phẩm 
    //Theo danh mục
    public function getProductsbyDM($sort_name): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold,b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm and b.sort_name like :sort_name
                ORDER BY a.id';
        $statement = $this->connection->prepare($sql);
        $statement->execute([':sort_name' => $sort_name]);
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->sort_name = $row['sort_name'];
            $book->ten_dm = $row['name_dm'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }
    // Theo ID hóa đơn
    public function book_theo_ID_HD(int $id_hd) : array {
        $sql = 'SELECT a.id_hd,b.name,b.price,a.solg 
                FROM info_hoa_don a, sanpham b 
                WHERE a.ID_SP=b.id and a.id_hd = :id_hd 
                ORDER BY a.id_hd';
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id_hd' => $id_hd]);
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->solg = $row['solg'];
            $books[] = $book;
        };
        return $books;
    }
    // Theo phổ biến (xem nhiều).
    public function SORT_popular(): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm
                ORDER BY a.view DESC';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }
    // Theo mới nhất(id lớn nhất)
    public function SORT_new(): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm
                ORDER BY a.id DESC';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }
    // Theo mua nhiều nhất(sold)
    public function SORT_hot(): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm
                ORDER BY c.sold DESC';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }
    // Theo Giá cao đến thấp
    public function SORT_price_DESC(): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm
                ORDER BY a.price DESC';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }
    // Theo giá thấp đến cao
    public function SORT_price(): array {
        $sql = 'SELECT a.id,a.name,a.price,a.img,a.view,a.author, a.old_price, a.quantity,b.name_dm, b.id_dm, c.sold, b.sort_name
                FROM sanpham a LEFT OUTER JOIN so_luong_sach_da_ban c ON c.id = a.id, danhmuc b
                WHERE a.id_dm =b.id_dm
                ORDER BY a.price';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $books =[];
        while ( $row = $statement->fetch()){
            $book = new book($this->connection);
            $book->id = $row['id'];
            $book->name = $row['name'];
            $book->price = $row['price'];
            $book->img = $row['img'];
            $book->view = $row['view'];
            $book->author = $row['author'];
            $book->hang_ton = $row['quantity'];
            $book->ten_dm = $row['name_dm'];
            $book->sort_name = $row['sort_name'];
            $book->id_dm = $row['id_dm'];
            $book->old_price = $row['old_price'];
            $book->solg = ($row['sold']==null) ? 0 : $row['sold'];
            $books[] = $book;
        };
        return $books;
    }


   
}