<?php
require_once "connectDB.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: index.html");
  exit;
}

// กัน XSS ตอนแสดงผล
function e($s){ return htmlspecialchars($s ?? "", ENT_QUOTES, "UTF-8"); }

// รับค่า + trim
$position   = trim($_POST["position"] ?? "");
$prefix     = trim($_POST["prefix"] ?? "");
$fullname   = trim($_POST["fullname"] ?? "");
$dob        = trim($_POST["dob"] ?? "");
$education  = trim($_POST["education"] ?? "");
$skills     = trim($_POST["skills"] ?? "");
$experience = trim($_POST["experience"] ?? "");

// ตรวจขั้นต่ำ (กันค่าว่าง)
$errors = [];
if ($position === "")  $errors[] = "กรุณาเลือกตำแหน่งงาน";
if ($prefix === "")    $errors[] = "กรุณาเลือกคำนำหน้า";
if ($fullname === "")  $errors[] = "กรุณากรอกชื่อ-นามสกุล";
if ($dob === "")       $errors[] = "กรุณาเลือกวันเดือนปีเกิด";
if ($education === "") $errors[] = "กรุณาเลือกระดับการศึกษา";

// ถ้าไม่มี error -> บันทึกลงฐานข้อมูล
$saved = false;
$insert_id = null;

if (count($errors) === 0) {
  $sql = "INSERT INTO job (position, prefix, fullname, dob, education, skills, experience)
          VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssssss", $position, $prefix, $fullname, $dob, $education, $skills, $experience);
  $stmt->execute();

  $saved = true;
  $insert_id = $conn->insert_id;
  $stmt->close();
}

$dob_show = $dob;
if ($dob !== "") {
  $ts = strtotime($dob);
  if ($ts) $dob_show = date("d/m/Y", $ts);
}
?>
<!doctype html>
<html lang="th">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>สรุปใบสมัครงาน</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
          <h1 class="h5 mb-0">สรุปใบสมัครงาน</h1>
        </div>

        <div class="card-body">
          <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
              <div class="fw-semibold mb-2">ส่งข้อมูลไม่สำเร็จ</div>
              <ul class="mb-0">
                <?php foreach ($errors as $er): ?>
                  <li><?= e($er) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php else: ?>
            <div class="alert alert-success">
              ✅ บันทึกลงฐานข้อมูลสำเร็จ
              <?php if ($insert_id): ?>
                <span class="ms-2">(รหัสใบสมัคร #<?= e($insert_id) ?>)</span>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 bg-white border rounded">
                <div class="text-muted small">ตำแหน่งที่สมัคร</div>
                <div class="fw-semibold"><?= e($position) ?: "-" ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 bg-white border rounded">
                <div class="text-muted small">ชื่อ - นามสกุล</div>
                <div class="fw-semibold"><?= e(trim($prefix." ".$fullname)) ?: "-" ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 bg-white border rounded">
                <div class="text-muted small">วันเดือนปีเกิด</div>
                <div class="fw-semibold"><?= e($dob_show) ?: "-" ?></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 bg-white border rounded">
                <div class="text-muted small">ระดับการศึกษา</div>
                <div class="fw-semibold"><?= e($education) ?: "-" ?></div>
              </div>
            </div>

            <div class="col-12">
              <div class="p-3 bg-white border rounded">
                <div class="text-muted small">ความสามารถพิเศษ / ทักษะ</div>
                <div class="fw-semibold" style="white-space: pre-wrap;"><?= e($skills) ?: "-" ?></div>
              </div>
            </div>

            <div class="col-12">
              <div class="p-3 bg-white border rounded">
                <div class="text-muted small">ประสบการณ์ทำงานที่ผ่านมา</div>
                <div class="fw-semibold" style="white-space: pre-wrap;"><?= e($experience) ?: "-" ?></div>
              </div>
            </div>
          </div>

          <div class="d-flex gap-2 justify-content-center mt-4">
            <a href="index.html" class="btn btn-outline-secondary">ย้อนกลับ</a>
            <a href="admin.php" class="btn btn-outline-primary">ดูรายชื่อผู้สมัคร</a>
            <button class="btn btn-primary" onclick="window.print()">พิมพ์</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
cdn.jsdelivr.net