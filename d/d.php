<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>ฟอร์มสมัครสมาชิก - จักริน อินทราราม(ก้อง) (ChatGPT)</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">ฟอร์มสมัครสมาชิก(ChatGPT)</h3>
                    <small>จักริน อินทราราม (ก้อง)</small>
                </div>

                <div class="card-body">

                    <form method="post" action="">

                        <div class="mb-3">
                            <label class="form-label">ชื่อ-สกุล *</label>
                            <input type="text" class="form-control" name="fullname" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">เบอร์โทร *</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">ความสูง (ซม.) *</label>
                            <input type="number" class="form-control" name="height" step="5" min="100" max="250" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">สีที่ชอบ</label><br>
                            <input type="color" class="form-control form-control-color" name="color" value="#000000">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">สาขาวิชา</label>
                            <select class="form-select" name="major">
                                <option value="การบัญชี">การบัญชี</option>
                                <option value="การจัดการ">การจัดการ</option>
                                <option value="การตลาด">การตลาด</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="Submit" class="btn btn-success">สมัครสมาชิก</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="button" class="btn btn-info text-white" onclick="window.location='http://www.msu.ac.th'">Go to MSU</button>
                            <button type="button" class="btn btn-dark" onclick="window.print()">พิมพ์</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap 5.3 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
if(isset($_POST['Submit'])){
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $height = $_POST['height'];
    $color = $_POST['color'];
    $major = $_POST['major'];

    echo "<div class='container mt-4'>";
    echo "<div class='alert alert-primary'><h4>ข้อมูลที่ส่งมา</h4>";
    echo "ชื่อ-นามสกุล: $fullname<br>";
    echo "เบอร์โทร: $phone<br>";
    echo "ความสูง: $height ซม.<br>";
    echo "สีที่ชอบ: $color <div style='width:40px;height:20px;background:$color;margin:5px 0;'></div><br>";
    echo "สาขาวิชา: $major<br>";
    echo "</div></div>";
}
?>
</body>
</html>
