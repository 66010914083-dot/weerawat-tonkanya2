<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>วีรวัฒน์ ต้นกันยา (โบ๊ท) - แบบฟอร์มสมัครสมาชิก</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Prompt', sans-serif;
            /* สีพื้นหลังแบบไล่เฉด (Gradient) */
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            /* หรือลองสีนี้ (เขียวฟ้าสดใส) */
            /* background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%); */
            
            /* กำหนดให้ความสูงเต็มจอเสมอ เพื่อให้ Gradient สวยงาม */
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .color-preview {
            width: 30px;
            height: 30px;
            display: inline-block;
            border-radius: 50%;
            vertical-align: middle;
            border: 2px solid #dee2e6;
            margin-left: 10px;
        }
        .card {
            /* ทำให้การ์ดโปร่งแสงเล็กน้อย (Glassmorphism effect) */
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="py-5">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-white text-center py-4 rounded-top-4 border-bottom-0">
                    <h2 class="mb-1 text-primary fw-bold">ฟอร์มสมัครสมาชิก</h2>
                    <p class="text-secondary mb-0">วีรวัฒน์ ต้นกันยา (โบ๊ท)</p>
                </div>
                
                <div class="card-body p-4 p-md-5 pt-0">
                    <form method="post" action="">
                        
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="fullname" class="form-label fw-bold text-dark">ชื่อ-สกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" id="fullname" name="fullname" placeholder="ระบุชื่อและนามสกุล" required autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-bold text-dark">เบอร์โทร <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" id="phone" name="phone" placeholder="0xx-xxx-xxxx" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="height" class="form-label fw-bold text-dark">ความสูง (ซม.) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control bg-light" id="height" name="height" step="5" min="100" max="250" placeholder="100-250" required>
                            </div>
                            <div class="col-md-6">
                                <label for="color" class="form-label fw-bold text-dark">สีที่ชอบ</label>
                                <input type="color" class="form-control form-control-color w-100 bg-light" id="color" name="color" value="#563d7c" title="เลือกสีที่ชอบ">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="major" class="form-label fw-bold text-dark">สาขาวิชา</label>
                            <select class="form-select bg-light" id="major" name="major">
                                <option value="การบัญชี">การบัญชี</option>
                                <option value="การจัดการ">การจัดการ</option>
                                <option value="การตลาด">การตลาด</option>
                                <option value="คอมพิวเตอร์ธุรกิจ">คอมพิวเตอร์ธุรกิจ</option>
                            </select>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <button type="submit" name="Submit" class="btn btn-primary px-4 shadow-sm fw-bold">
                                <i class="bi bi-send-fill me-1"></i> สมัครสมาชิก
                            </button>
                            <button type="reset" class="btn btn-warning px-4 shadow-sm text-dark fw-bold">
                                <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                            </button>
                            <button type="button" class="btn btn-info text-white shadow-sm fw-bold" onClick="window.location='http://www.msu.ac.th';">
                                <i class="bi bi-globe me-1"></i> Go to MSU
                            </button>
                            <button type="button" class="btn btn-dark shadow-sm fw-bold" onClick="window.print();">
                                <i class="bi bi-printer-fill me-1"></i> พิมพ์
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <?php
            if(isset($_POST['Submit'])){
                $fullname = htmlspecialchars($_POST['fullname']);
                $phone = htmlspecialchars($_POST['phone']);
                $height = htmlspecialchars($_POST['height']);
                $color = htmlspecialchars($_POST['color']);
                $major = htmlspecialchars($_POST['major']);

                echo '
                <div class="alert alert-light mt-4 shadow-lg rounded-4 border-0" role="alert">
                    <h4 class="alert-heading text-success border-bottom pb-2"><i class="bi bi-check-circle-fill"></i> บันทึกข้อมูลสำเร็จ</h4>
                    <div class="row mt-3 text-dark">
                        <div class="col-md-6 mb-2"><strong>ชื่อ-นามสกุล:</strong> '.$fullname.'</div>
                        <div class="col-md-6 mb-2"><strong>เบอร์โทร:</strong> '.$phone.'</div>
                        <div class="col-md-6 mb-2"><strong>ความสูง:</strong> '.$height.' ซม.</div>
                        <div class="col-md-6 mb-2 d-flex align-items-center">
                            <strong>สีที่ชอบ:</strong> 
                            <span class="ms-2">'.$color.'</span>
                            <span class="color-preview shadow-sm" style="background-color:'.$color.';"></span>
                        </div>
                        <div class="col-12"><strong>สาขาวิชา:</strong> <span class="badge bg-primary">'.$major.'</span></div>
                    </div>
                </div>
                ';
            }
            ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>