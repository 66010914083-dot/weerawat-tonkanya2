<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<h1>วีรวัฒน์ ต้นกันยา(โบ๊ท)</h1>
<form method="post" action="">
กรอกตัวเลข<input type="number" name="a"auto autofocus required>
<button type="submit" name="Submit">OK</button>
<hr>

<?php
if(isset($_POST['Submit'])){
    
    $count = $_POST['a'];    
    $name = "วีรวัฒน์ ต้นกันยา"; 
    $imagePath = "3.jpg"; 

    if($count > 0){
        echo "<h3>ผลลัพธ์:</h3>"; 
        for($i = 1; $i <= $count; $i++){
            echo $i . ". " . $name . " "; 
            echo "<img src='" . $imagePath . "' alt='รูปโปรไฟล์' width='250' height='250'>";
            echo "<br>"; 
        }
    } else {
        echo "<p style='color: red;'>กรุณากรอกตัวเลขที่มากกว่า 0</p>"; 
    }
}
?>

</body>
</html>