<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>วีรวัฒน์ ต้นกันยา</title>
</head>
<body>
    <h1>d.php</h1>

    <?php
    unset($_SESSION['name']);
    unset($_SESSION['nickname']);
    ?>
</body>
</html>
