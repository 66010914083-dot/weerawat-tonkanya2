<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Premium Dashboard - Pop Supermarket</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.85);
            --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        body { 
            font-family: 'Kanit', sans-serif; 
            background: var(--gradient-bg);
            min-height: 100vh;
            padding: 40px 0;
        }
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            padding: 30px;
        }
        .table {
            border-radius: 15px;
            overflow: hidden;
        }
        .product-img {
            width: 50px; height: 50px;
            object-fit: cover;
            border-radius: 12px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .product-img:hover { transform: scale(2.5); z-index: 999; position: relative; }
        .badge-cat { background: #764ba2; color: white; border-radius: 30px; padding: 5px 15px; }
        .total-box {
            background: #fff;
            border-left: 5px solid #764ba2;
            padding: 15px;
            border-radius: 10px;
        }
        h1 { font-weight: 600; color: #fff; text-shadow: 2px 2px 4px rgba(0,0,0,0.3); }
    </style>
</head>

<body>
<div class="container animate__animated animate__fadeIn">
    <header class="text-center mb-5">
        <h1>✨ วีรวัฒน์ ต้นกันยา โบ๊ท ✨</h1>
        <p class="text-white-50">Pop Supermarket Management System</p>
    </header>

    <div class="glass-card">
        <table id="myTable" class="table table-hover align-middle w-100">
            <thead>
                <tr>
                    <th class="text-secondary">ID</th>
                    <th>รูป</th>
                    <th>ชื่อสินค้า</th>
                    <th>ประเภท</th>
                    <th>วันที่</th>
                    <th>ประเทศ</th>
                    <th class="text-end">จำนวนเงิน</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("connectDB.php"); 
                $sql = "SELECT * FROM `popsupermarket` "; //
                $rs = mysqli_query($conn, $sql); //
                $total = 0;
                while ($data = mysqli_fetch_assoc($rs)) { //
                    $total += $data['p_amount']; //
                ?>
                <tr>
                    <td class="text-muted"><?php echo $data['p_order_id']; ?></td>
                    <td>
                        <img src="<?php echo $data['p_product_name'];?>.jpg" 
                             class="product-img shadow-sm"
                             onerror="this.src='https://ui-avatars.com/api/?name=<?php echo urlencode($data['p_product_name']); ?>&background=random'">
                    </td>
                    <td class="fw-bold"><?php echo $data['p_product_name']; ?></td>
                    <td><span class="badge-cat"><?php echo $data['p_category']; ?></span></td>
                    <td><?php echo date('d M Y', strtotime($data['p_date'])); ?></td>
                    <td>📍 <?php echo $data['p_country']; ?></td>
                    <td class="text-end fw-bold text-dark">
                        ฿<?php echo number_format($data['p_amount'], 2); ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="row mt-4 align-items-center">
            <div class="col-md-6">
                <p class="text-muted mb-0">* ข้อมูลอัปเดตล่าสุดจากระบบ Database</p>
            </div>
            <div class="col-md-6">
                <div class="total-box shadow-sm text-end">
                    <span class="text-secondary small d-block">ยอดรวมทั้งหมด</span>
                    <span class="h3 mb-0 text-primary">฿ <?php echo number_format($total, 2); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/th.json"
            },
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50]
        });
    });
</script>
</body>
</html>