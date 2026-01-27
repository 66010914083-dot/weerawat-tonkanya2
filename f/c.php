<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>วีรวัฒน์ ต้นกันยา</title>
</head>

<body>
<h1>วีรวัฒน์ ต้นกันยา()</h1>
<form method="post" action="">
กรอกตัวเลข<input type="number" name="a"auto autofocus required>
<button type="submit" name="Submit">OK</button>
<hr>

<?php
if(isset($_POST['Submit'])){
    
    $score = $_POST['a'];

    
    if ($score > 100 || $score < 0) {
        echo "กรุณากรอกคะแนนระหว่าง 0 - 100";
    } 
    
    else if ($score >= 80) {
        echo "คะแนน $score ได้เกรด: A";
    } else if ($score >= 70) {
        echo "คะแนน $score ได้เกรด: B";
    } else if ($score >= 60) {
        echo "คะแนน $score ได้เกรด: C";
    } else if ($score >= 50) { 
        echo "คะแนน $score ได้เกรด: D";
    } else {
        echo "คะแนน $score ได้เกรด: F";
    }
}
?>
</body>
</html>