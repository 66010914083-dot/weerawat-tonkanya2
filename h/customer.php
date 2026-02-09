<?php
    session_start();
    echo $_SESSION['a_name'];
    
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login:จัดการลูกค้า</title>
</head>
<body>
    <h1>จัดการลูกค้า</h1>
    <?php echo $_SESSION['a_name'];?>
    <ul>admin"><li>หน้าหลัก</li></a>
        <a href = 'porducts.php'><li>จัดการสินค้า</li></a>
        <a href = 'order.php'><li>จัดการออร์เดอร์</li></a>
        <a href = 'customer.php'><li>จัดการลูกค้า</li></a>
        <a href = "logout.php">ออกจากระบบ</a>
        
    
    
    
    

</body>
</html>