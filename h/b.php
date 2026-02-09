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
    <h1>b.php</h1>

    <?php
    echo $_SESSION['name'] . "<br>";
    echo $_SESSION['nickname'] . "<br>";
    ?>
</body>
</html>