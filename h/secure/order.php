<?php
    session_start();
    // แนะนำว่าควรสร้างไฟล์ check_login.php ไว้ตรวจสอบ session ทุกครั้ง
    if(!isset($_SESSION['a_id'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการออร์เดอร์: <?php echo $_SESSION['a_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f4f7f6; }
        .sidebar { min-height: 100vh; background: linear-gradient(180deg, #4e73df 0%, #224abe 100%); color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,.8); margin-bottom: 8px; border-radius: 5px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: rgba(255,255,255,.2); }
        .main-content { padding: 25px; }
        .order-table { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .status-pill { padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: bold; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
            <div class="text-center mb-4">
                <i class="bi bi-receipt fs-1"></i>
                <h5 class="mt-2 text-uppercase">Store Admin</h5>
                <hr>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="index2.php"><i class="bi bi-house-door me-2"></i> หน้าหลัก</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-cart3 me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link active" href="order.php"><i class="bi bi-receipt me-2"></i> จัดการออร์เดอร์</a></li>
                <li class="nav-item"><a class="nav-link" href="customer.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <li class="nav-item mt-4"><a class="nav-link text-warning" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h2 class="fw-bold"><i class="bi bi-receipt-cutoff text-primary me-2"></i>จัดการออร์เดอร์</h2>
                <div class="text-muted">ผู้ใช้งาน: <span class="badge bg-light text-dark shadow-sm px-3 py-2"><?php echo $_SESSION['a_name']; ?></span></div>
            </div>

            <div class="order-table border">
                <div class="p-3 bg-white border-bottom">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="mb-0">รายการคำสั่งซื้อล่าสุด</h5>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-outline-primary btn-sm"><i class="bi bi-printer me-1"></i> พิมพ์รายงาน</button>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">เลขที่ออร์เดอร์</th>
                                <th>ชื่อลูกค้า</th>
                                <th>วันที่สั่งซื้อ</th>
                                <th>ยอดรวม</th>
                                <th>สถานะ</th>
                                <th class="text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 fw-bold">#ORD-001</td>
                                <td>คุณวีรวัฒน์</td>
                                <td>03 ก.พ. 2026</td>
                                <td class="text-primary fw-bold">฿1,500.00</td>
                                <td><span class="status-pill bg-success text-white">ชำระเงินแล้ว</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 fw-bold">#ORD-002</td>
                                <td>คุณสมชาย</td>
                                <td>03 ก.พ. 2026</td>
                                <td class="text-primary fw-bold">฿850.00</td>
                                <td><span class="status-pill bg-warning text-dark">รอการตรวจสอบ</span></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>