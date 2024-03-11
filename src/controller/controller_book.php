<?php
    require_once __DIR__ . '/../bootstrap.php';
    $pdo = connect_db();
    $book = new APP\book($pdo);
    $books = $book->getAllProducts();

    if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action =='add'){
            $kq = $book->themSanPham($_POST['tenSP'],$_POST['price'],$_POST['img'],$_POST['mota'], $_POST['type'], $_POST['nameAuthor'],$_POST['solg'],$_POST['oldprice']);
            if ($kq){ echo "<script> alert('Sản phẩm được thêm thành công.');</script>";}
            else{echo "<script> alert('Sản phẩm được thêm không thành công.');</script>";}
        }
        elseif($action =='model_update'&& isset($_POST['ID_book'])){
            $ID = $_POST['ID_book'];
            $book = $book ->searchById($ID);
            require_once __DIR__ . '/../templates/admin/book/model_update.php';
        }else if($action =='update'){
            $kq = $book->Update($_POST['ID_BOOK'],$_POST['tenSP'],$_POST['price'], $_POST['type'], $_POST['nameAuthor'],$_POST['solg']);
            if ($kq){ echo "<script> alert('Sản phẩm được cập nhật thành công.');</script>";}
            else{echo "<script> alert('Sản phẩm được cập nhật không thành công.');</script>";}
        }else if($action =='delete'){
            $kq = $book->delete($_POST['ID_BOOK']);
            if ($kq){ echo "<script> alert('Sản phẩm được xóa thành công.');</script>";}
            else{echo "<script> alert('Sản phẩm xóa không thành công.');</script>";}
        }
    }
    else require_once __DIR__ . '/../templates/admin/book/content_book.php';?>