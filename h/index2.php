<?php
    include_once("chek_login.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard: วีรวัฒน์ ต้นกันยา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f4f7f6;
        }
        .navbar-brand {
            font-weight: 600;
        }
        .main-content {
            padding-top: 50px;
        }
        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index2.php">
                <i class="bi bi-speedometer2 me-2"></i> Admin System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index2.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">จัดการสินค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php">จัดการออร์เดอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customer.php">จัดการลูกค้า</a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <span class="nav-link text-light me-3">
                        <i class="bi bi-person-circle"></i> <?php echo $_SESSION['a_name']; ?>
                    </span>
                    <a class="btn btn-outline-danger btn-sm" href="logout.php">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container main-content">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="fw-bold">หน้าหลัก - Dashboard</h2>
                <hr>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-white bg-primary">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-box-seam fs-1 mb-2"></i>
                        <h5>จัดการสินค้า</h5>
                        <a href="products.php" class="btn btn-light btn-sm mt-2">เข้าใช้งาน</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-white bg-success">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-cart-check fs-1 mb-2"></i>
                        <h5>จัดการออร์เดอร์</h5>
                        <a href="order.php" class="btn btn-light btn-sm mt-2">เข้าใช้งาน</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-white bg-info">
                    <div class="card-body p-4 text-center">
                        <i class="bi bi-people fs-1 mb-2"></i>
                        <h5>จัดการลูกค้า</h5>
                        <a href="customer.php" class="btn btn-light btn-sm mt-2">เข้าใช้งาน</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>