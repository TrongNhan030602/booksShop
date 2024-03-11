<?php

function connect_db(){
    $servername = 'localhost';
    $dbname = 'ct271';
    $username = 'root';
    $password = '';


    try {
        $pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = 'Không thể kết nối đến CSDL';
        $reason = $e->getMessage();
        include 'show_error.php';
        exit();
    }

    return $pdo;
}

function get_all($sql){
    $pdo = connect_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);  // Đặt kq trả về là 1 mảng   
    $data = $stmt->fetchAll();
    $pdo = NULL;
    return $data;
}



