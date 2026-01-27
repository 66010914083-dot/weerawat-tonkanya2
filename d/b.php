<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>จักริน อินทราราม(ก้อง)</title>
</head>

<body>
<h1>ฟอร์มสมัครสมาชิก -- จักริน อินทราราม(ก้อง)</h1>

<form method="post" action="">

ชื่อ-สกุล<input type="text" name="fullname" required autofocus> *<br>
เบอร์โทร<input type="text" name="phone" required> * <br>
ความสูง<input type="number" step="5" name="height" min="100" max="250" required>ซม. * <br>
สีที่ชอบ<input type="color" name="color"><br>

สาขาวิชา
<select name="major">
	<option value="การบัญชี">การบัญชี</option>>
    <option value="การจัดการ">การจัดการ</option>>
    <option value="การตลาด">การตลาด</option>>
    <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>>
</select><br>

<!--<input type="submit" name="Submit" value="สมัครสมาชิก">-->
<button type="submit" name="Submit">สมัครสมาชิก</button><br>
<button type="reset">Reset</button><br>
<button type"button" onClick="window.location='http://www.msu.ac.th';">Go to MSU</button>
<button type"button" onClick="window.print();">พิมพ์</button>

</form>
<hr>

<?php
if(isset($_POST['Submit'])){
	$fullname = $_POST['fullname'];
	$phone = $_POST['phone'];
	$height = $_POST['height'];
	$color = $_POST['color'];
	$major = $_POST['major'];

	echo"ชื่อ-นามสกุล ".$_POST['fullname']."<br>";
	echo"เบอร์โทร ".$_POST['phone']."<br>";
	echo"ความสูง ".$_POST['height']." ซม.<br>";
	echo"สีที่ชอบ ".$_POST['color']."<div style='background:{$color}'> . </div>br>";
	echo"สาขาวิชา ".$_POST['major']."<br>";
	
}
?>


</body>
</html>
