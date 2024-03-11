<?php
require_once __DIR__ . '/../src/bootstrap.php';
$pdo = connect_db();
$user = new APP\user($pdo);
if (!$user->check_admin($_SESSION['user_name'])) {
    header('location: login.php');
    exit();
}
require_once __DIR__ . '/../src/templates/admin/header_admin.php';

if (isset($_POST['table'])) {
    $table = $_POST['table'];
    require_once __DIR__ . '/../src/controller/controller_' . $table . '.php';
}

require_once __DIR__ . '/../src/templates/admin/footer.php';
