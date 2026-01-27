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

    
    if($count > 0){
        for($i = 1; $i <= $count; $i++){
            echo $i . ". " . $name . "<br>"; 
        }
    } else {
        echo "กดตัวเลขที่มากกว่า 0";
    }
}
?>

</body>
</html>