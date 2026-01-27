<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sales Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    :root {
        --primary: #4f46e5;
        --bg: #f1f5f9;
    }

    body { 
        font-family: 'Kanit', sans-serif; 
        background-color: var(--bg);
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .header { width: 100%; max-width: 1100px; margin-bottom: 20px; }
    h1 { margin: 0; font-size: 24px; color: #1e293b; }

    /* ปรับ Layout ให้ยืดหยุ่น */
    .dashboard-container {
        display: flex;
        gap: 20px;
        width: 100%;
        max-width: 1100px;
        flex-wrap: wrap; /* รองรับมือถือ */
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        flex: 1; /* ให้ยืดหยุ่นเท่ากัน */
        min-width: 320px;
        display: flex;
        flex-direction: column;
    }

    /* ตารางขนาดพอดี */
    table { width: 100%; border-collapse: collapse; font-size: 14px; }
    th { text-align: left; padding: 12px 8px; border-bottom: 2px solid #e2e8f0; color: #64748b; }
    td { padding: 10px 8px; border-bottom: 1px solid #f1f5f9; }
    
    .total-row { background-color: #f8fafc; font-weight: bold; }

    /* คุมความสูงกราฟให้เท่ากับตารางโดยประมาณ */
    .chart-wrapper {
        position: relative;
        height: 350px; /* ล็อคความสูงให้พอดีสายตา */
        width: 100%;
    }

    select {
        padding: 4px 8px;
        border-radius: 6px;
        border: 1px solid #cbd5e1;
        font-family: 'Kanit';
    }
</style>
</head>

<body>

<div class="header">
    <h1>🚀 ระบบวิเคราะห์ยอดขาย (Sales Dashboard)</h1>
</div>

<?php
include_once("connectDB.php"); 
$sql = "SELECT p_country, SUM(p_amount) AS Total_Sales 
        FROM `popsupermarket` 
        GROUP BY p_country 
        ORDER BY Total_Sales DESC";
$rs = mysqli_query($conn, $sql);
$countries = []; $sales = []; $grand_total = 0;

while ($data = mysqli_fetch_assoc($rs)) {
    $countries[] = $data['p_country'];
    $sales[] = (float)$data['Total_Sales'];
    $grand_total += $data['Total_Sales'];
}
?>

<div class="dashboard-container">
    <div class="card">
        <h3 style="margin: 0 0 15px 0; font-size: 18px;">📋 สรุปข้อมูลรายประเทศ</h3>
        <table>
            <thead>
                <tr>
                    <th>ประเทศ</th>
                    <th style="text-align:right">ยอดขายรวม (฿)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($countries as $index => $name): ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td align="right"><?php echo number_format($sales[$index]); ?></td>
                </tr>
                <?php endforeach; ?>
                <tr class="total-row">
                    <td>รวมทั้งสิ้น</td>
                    <td align="right" style="color:var(--primary)"><?php echo number_format($grand_total); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="card">
        <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
            <h3 style="margin: 0; font-size: 18px;">📊 แผนภูมิเปรียบเทียบ</h3>
            <select id="typeSelector" onchange="changeChart()">
                <option value="bar">กราฟแท่ง</option>
                <option value="doughnut">กราฟวงกลม</option>
                <option value="line">กราฟเส้น</option>
            </select>
        </div>
        <div class="chart-wrapper">
            <canvas id="salesChart"></canvas>
        </div>
    </div>
</div>

<script>
let salesChart;
const data = {
    labels: <?php echo json_encode($countries); ?>,
    datasets: [{

        label: 'ยอดขายรายประเทศ',
        data: <?php echo json_encode($sales); ?>,
        backgroundColor: [
            '#4f46e5', '#7c3aed', '#db2777', '#ea580c', '#16a34a', '#2563eb'
        ],
        borderWidth: 0,
        borderRadius: 5,
        tension: 0.3
    }]
};

function render(type) {
    if (salesChart) salesChart.destroy();
    const ctx = document.getElementById('salesChart').getContext('2d');
    salesChart = new Chart(ctx, {
        type: type,
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: (type === 'doughnut'), position: 'bottom' }
            },
            scales: type === 'doughnut' ? {} : {
                y: { beginAtZero: true },
                x: { grid: { display: false } }
            }
        }
    });
}

function changeChart() {
    render(document.getElementById('typeSelector').value);
}

render('bar'); // เริ่มต้นด้วยกราฟแท่ง
</script>

</body>
</html>