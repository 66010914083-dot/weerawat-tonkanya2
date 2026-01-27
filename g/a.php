<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>วีรวัฒน์ ต้นกันยา โบ๊ท</h1>

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

//$sql = "SELECT * FROM popsupermarket WHERE p_country = 'Sweden' AND p_category='Vegetables' ORDER BY 'p_product_name' ASC";
$sql = "SELECT * FROM `popsupermarket` " ;
//$sql = "SELECT * FROM popsupermarket WHERE p_country = 'Sweden' ORDER BY 'p_product_name' ASC";
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
    <td align="right"><?php echo $data['p_amount']; ?></td>
	<td><img src="<?php echo $data['p_product_name'];?>.jpg" width="55"></td>
</tr>
<?php
}
?>
<tr>
	<td>ไม่บอกแกหรอกนะ</td>
    <td>ไม่บอกแกหรอกนะ</td>
    <td>ไม่บอกแกหรอกนะ</td>
    <td>ไม่บอกแกหรอกนะ</td>
    <td>ไม่บอกแกหรอกนะ</td>
    <td><b><?php echo number_format($total,0);?></b></td>
</tr>
</table>
</body>
</html>
