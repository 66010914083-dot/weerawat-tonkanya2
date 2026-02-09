<?php
    session_start();
    unset( $_SESSION['a_name']);
    unset($_SESSION['a_id']);
    echo"<script>";
    echo"window.location='index.php';";
    echo"</script>";
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login: วีรวัฒน์ ต้นกันยา</title>
</head>
<body>
    <h1>หน้าหลัก : วีรวัฒน์ ต้นกันยา</h1>
    <a href = "logout.php"> ออกจากระบบ</a>

</body>
</html>