<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>วีรวัฒน์ ต้นกันยา โบ๊ท</h1>

<form method="get">
    
    <input type="text" name="keyword" placeholder="หาเอาเด้อ"
           value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
    <button type="submit">ค้นหา</button>
</form>
<br>

<table border="1">
<tr>
    <th>Order</th>
    <th>สินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>วันที่</th>
    <th>ประเทศ</th>
    <th>จำนวนเงิน</th>
    <th>รูป</th>
</tr>

<?php
include_once("connectDB.php"); 

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

if ($keyword != "") {
    $sql = "SELECT * FROM popsupermarket 
            WHERE p_product_name LIKE '%$keyword%'
               OR p_country LIKE '%$keyword%'
               OR p_category LIKE '%$keyword%'";
} else {
    $sql = "SELECT * FROM popsupermarket";
}

$rs = mysqli_query($conn, $sql);
$total = 0;

while ($data = mysqli_fetch_assoc($rs)) {
    $total += $data['p_amount'];
?>
<tr>
    <td><?php echo $data['p_order_id']; ?></td>
    <td><?php echo $data['p_product_name']; ?></td>
    <td><?php echo $data['p_category']; ?></td>
    <td><?php echo $data['p_date']; ?></td>
    <td><?php echo $data['p_country']; ?></td>
    <td align="right"><?php echo number_format($data['p_amount'],0); ?></td>
    <td>
        <img src="<?php echo $data['p_product_name']; ?>.jpg" width="55">
    </td>
</tr>
<?php } ?>

<tr>
    <td colspan="5" align="right"><b>รวมทั้งหมด</b></td>
    <td align="right"><b><?php echo number_format($total,0); ?></b></td>
    <td></td>
</tr>

</table>
</body>
</html>
