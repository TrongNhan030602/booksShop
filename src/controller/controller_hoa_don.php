<?php
    require_once __DIR__ . '/../bootstrap.php';
    $pdo = connect_db();
    $hoa_don = new APP\hoa_don($pdo);
    $hoa_dons = $hoa_don->hoa_don_all();
    if(isset($_POST['id_hd']) && isset($_POST['action'])){
        $id_hd = $_POST['id_hd'];
        $action = $_POST['action'];
        $hoa_don = $hoa_don->hoa_don_theo_ID($id_hd);
        $book = new APP\book($pdo);
        $books = $book->book_theo_ID_HD($id_hd);
        if ($action == 'model_show')
            require_once __DIR__ . '/../templates/admin/hoa_don/model_show.php';
        elseif($action == 'model_update')
            require_once __DIR__ . '/../templates/admin/hoa_don/model_update.php';
        
    }
    else{
        require_once __DIR__ . '/../templates/admin/hoa_don/content_hoa_don.php';
    }
