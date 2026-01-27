<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ยอดขายแต่ละประเทศ</title>
<style>
    table { border-collapse: collapse; width: 40%; }
    th { background-color: #f2f2f2; text-align: left; }
    th, td { padding: 8px; border: 1px solid #ddd; }
    .total-row { background-color: #eee; font-weight: bold; }
</style>
</head>

<body>
<h1>สรุปยอดขายแต่ละประเทศ</h1>

<table>
    <tr>
        <th>Country</th>
        <th>Total_Sales</th>
    </tr>

<?php
include_once("connectDB.php"); 


$sql = "SELECT p_country, SUM(p_amount) AS Total_Sales 
        FROM `popsupermarket` 
        GROUP BY p_country 
        ORDER BY p_country ASC";

$rs = mysqli_query($conn, $sql);
$grand_total = 0;

while ($data = mysqli_fetch_assoc($rs)) {
    $grand_total += $data['Total_Sales'];
?>
    <tr>
        <td><?php echo $data['p_country']; ?></td>
        <td align="right"><?php echo number_format($data['Total_Sales'], 0); ?></td>
    </tr>
<?php
}
?>
    <tr class="total-row">
        <td>ยอดรวมทั้งหมด</td>
        <td align="right"><?php echo number_format($grand_total, 0); ?></td>
    </tr>
</table>

</body>
</html>