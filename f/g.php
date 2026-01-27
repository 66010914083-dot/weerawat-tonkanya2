<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วีรวัฒน์ ต้นกันยา</title>
</head>

<body>
<h1>วีรวัฒน์ ต้นกันยา()</h1>
<form method="post" action="">
แม่สูตรคูณ<input type="number" name="a"auto autofocus required>
<button type="submit" name="Submit">OK</button>
<hr>

<?php
if(isset($_POST['Submit'])){
    
    $m = $_POST['a']; 
    echo "<h3>แม่สูตรคูณแม่ $m</h3>";

    
    for($i = 1; $i <= 12; $i++){
        $result = $m * $i; 
        echo "{$m} x {$i} = {$result} <br>";
    }
}
?>
</body>
</html>