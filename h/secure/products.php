<?php
    include_once("chek_login.php");
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการสินค้า: <?php echo $_SESSION['a_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #4e73df 0%, #224abe 100%);
            color: white;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.8);
            margin-bottom: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,.1);
        }
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,.2);
            font-weight: bold;
        }
        .main-content {
            padding: 20px;
        }
        .user-badge {
            background: white;
            padding: 5px 15px;
            border-radius: 50px;
            color: #4e73df;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="text-center mb-4">
                <i class="bi bi-box-seam fs-1"></i>
                <h5 class="mt-2">Admin Panel</h5>
                <hr>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="index2.php">
                        <i class="bi bi-house-door me-2"></i> หน้าหลัก
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">
                        <i class="bi bi-cart3 me-2"></i> จัดการสินค้า
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order.php">
                        <i class="bi bi-receipt me-2"></i> จัดการออร์เดอร์
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customer.php">
                        <i class="bi bi-people me-2"></i> จัดการลูกค้า
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <hr>
                    <a class="nav-link text-warning" href="logout.php">
                        <i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ
                    </a>
                </li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-dark font-weight-bold">จัดการสินค้า</h1>
                <div class="user-badge shadow-sm">
                    <i class="bi bi-person-circle me-1"></i>
                    <?php echo $_SESSION['a_name']; ?>
                </div>
            </div>

            <div class="card shadow-sm border-0 p-4">
                <div class="card-body">
                    <h5 class="card-title text-primary">ยินดีต้อนรับเข้าสู่ระบบจัดการ</h5>
                    <p class="card-text text-muted">เลือกเมนูด้านซ้ายเพื่อเริ่มต้นจัดการข้อมูลร้านค้าของคุณ</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-primary text-white mb-3">
                                <div class="card-body">
                                    <h6>สินค้าทั้งหมด</h6>
                                    <h3>150 รายการ</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-success text-white mb-3">
                                <div class="card-body">
                                    <h6>ออร์เดอร์วันนี้</h6>
                                    <h3>12 ออร์เดอร์</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>