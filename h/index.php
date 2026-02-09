<?php
    session_start();
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
    <h1>เข้าสู่ระบบหลังบ้าน : วีรวัฒน์ ต้นกันยา</h1>
<form method="post"action="">
    Username <input type="text"name="auser"autofocus require><br>
    Password <input type="password"name="apwd"require><br>
    <button type="submit"name="submit">Login</button>
</form>

<?php
    if(isset($_POST['submit'])){
        include_once("connectDB.php");
        $sql = "SELECT * FROM admin WHERE a_username ='{$_POST['auser']}' AND a_password ='{$_POST['apwd']}'LIMIT 1";
        $rs = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($rs);

        if ($num==1){


            $data = mysqli_fetch_array($rs);
            $_SESSION['a_id']=$data['a_id'];
            $_SESSION['a_name']=$data['a_name'];
            echo"<script>";
            echo"window.location='index2.php';";
            echo"</script>";

        }else{
            echo"<script>";
            echo"alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');";
            echo"</script>";
        }
    }

    
    
    
    
    
    //unset($_SESSION['name']);
    //unset($_SESSION['nickname']);
?>

</body>
</html>