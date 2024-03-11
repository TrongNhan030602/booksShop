
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom styles -->
    <!-- JS -->
    <script src="../public/assets/js/admin.js"></script>
    <link rel="icon" href="../public/assets/img/books.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../public/assets/css/admin.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/public/logout.php" class="logout_btn">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="sidebar">
        <div id="sidebar-title">
            <h3><i class="fas fa-chart-pie"></i> TN - shop</h3>
        </div>
        <form action="" method="post">
            <button type="submit" value="book" name="table" class="sidebar-item btn btn-primary my-3 ml-3 ">
                <i class="fas fa-box"></i> Quản lý sản phẩm </button>
            <button type="submit" value="user" name="table" class="sidebar-item btn btn-primary my-3 ml-3">
                <i class="fas fa-users"></i> Quản lý thành viên </button>
            <button type="submit" value="hoa_don" name="table" class="sidebar-item btn btn-primary my-3 ml-3">
                <i class="fas fa-file-invoice"></i> Quản lý hóa đơn </button>
        </form>
    </div>