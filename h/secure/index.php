<?php
session_start();
include_once("connectDB.php");

if (isset($_POST['submit'])) {
    $user = $_POST['auser'];
    $pwd  = $_POST['apwd'];

    $stmt = $conn->prepare("SELECT a_id, a_name, a_password FROM admin WHERE a_username = ? LIMIT 1");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $data = $result->fetch_assoc();
        if (password_verify($pwd, $data['a_password'])) {
            session_regenerate_id();
            $_SESSION['a_id']   = $data['a_id'];
            $_SESSION['a_name'] = $data['a_name'];
            header("Location: index2.php"); // ใช้ header แทน script เพื่อความรวดเร็ว
            exit();
        } else {
            $error_msg = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error_msg = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login: วีรวัฒน์ ต้นกันยา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100 vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
        }
        .btn-login {
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card login-card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-dark">เข้าสู่ระบบหลังบ้าน</h3>
                    <p class="text-muted">วีรวัฒน์ ต้นกันยา</p>
                </div>

                <?php if (isset($error_msg)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error_msg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" name="auser" class="form-control form-control-lg" placeholder="Username" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">รหัสผ่าน</label>
                        <input type="password" name="apwd" class="form-control form-control-lg" placeholder="Password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="submit" class="btn btn-primary btn-login text-white">
                            LOGIN
                        </button>
                    </div>
                </form>
            </div>
            <div class="text-center mt-3 text-white-50">
                <small>&copy; 2026 All Rights Reserved</small>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>