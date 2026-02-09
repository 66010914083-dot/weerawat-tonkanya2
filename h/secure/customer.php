<?php
    session_start();
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
    <title>จัดการลูกค้า: <?php echo $_SESSION['a_name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f0f2f5; }
        .sidebar { min-height: 100vh; background: linear-gradient(180deg, #4e73df 0%, #224abe 100%); color: white; }
        .sidebar .nav-link { color: rgba(255,255,255,.8); margin-bottom: 8px; border-radius: 5px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { color: white; background: rgba(255,255,255,.2); }
        .main-content { padding: 25px; }
        .customer-card { border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .avatar-circle {
            width: 40px; height: 40px; background: #e9ecef;
            display: flex; align-items: center; justify-content: center;
            border-radius: 50%; font-weight: bold; color: #4e73df;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3 shadow">
            <div class="text-center mb-4">
                <i class="bi bi-people-fill fs-1"></i>
                <h5 class="mt-2 fw-bold">ADMIN SYSTEM</h5>
                <hr>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="index2.php"><i class="bi bi-house-door me-2"></i> หน้าหลัก</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php"><i class="bi bi-cart3 me-2"></i> จัดการสินค้า</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php"><i class="bi bi-receipt me-2"></i> จัดการออร์เดอร์</a></li>
                <li class="nav-item"><a class="nav-link active" href="customer.php"><i class="bi bi-people me-2"></i> จัดการลูกค้า</a></li>
                <li class="nav-item mt-4"><hr><a class="nav-link text-warning" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> ออกจากระบบ</a></li>
            </ul>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold mb-0 text-dark">จัดการข้อมูลลูกค้า</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ol>
                    </nav>
                </div>
                <button class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="bi bi-person-plus-fill me-2"></i>เพิ่มลูกค้าใหม่
                </button>
            </div>

            <div class="card customer-card">
                <div class="card-body p-0">
                    <div class="p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">รายชื่อลูกค้าทั้งหมด</h5>
                        <div class="input-group style='width: 250px;'">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control border-start-0" placeholder="ค้นหาลูกค้า...">
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">ชื่อ-นามสกุล</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>ยอดซื้อสะสม</th>
                                    <th class="text-center">จัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle me-3">วต</div>
                                            <div>
                                                <div class="fw-bold">วีรวัฒน์ ต้นกันยา</div>
                                                <small class="text-muted">ID: #CUST-99</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>weerawat@example.com</td>
                                    <td>081-234-5678</td>
                                    <td class="fw-bold text-success">฿15,200</td>
                                    <td class="text-center">
                                        <div class="btn-group shadow-sm">
                                            <button class="btn btn-white btn-sm border"><i class="bi bi-pencil text-primary"></i></button>
                                            <button class="btn btn-white btn-sm border"><i class="bi bi-trash text-danger"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>