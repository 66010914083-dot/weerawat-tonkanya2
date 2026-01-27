<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการสมัครงาน - Sunny Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <style>
        body {
            font-family: "Prompt", sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            /* พื้นหลังเคลื่อนไหวแบบ Aurora */
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glassmorphism Card (กระจกฝ้า) */
        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            max-width: 800px;
            width: 90%;
            overflow: hidden;
            position: relative;
            animation: slideIn 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        @keyframes slideIn {
            from { transform: translateY(50px) scale(0.9); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }

        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        /* วงกลมตกแต่งใน header */
        .circle-decor {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .success-icon-box {
            width: 100px;
            height: 100px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7); }
            70% { box-shadow: 0 0 0 20px rgba(255, 255, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 255, 255, 0); }
        }

        .success-icon-box i {
            font-size: 50px;
            background: -webkit-linear-gradient(#667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .content-section {
            padding: 40px;
        }

        .info-group {
            background: white;
            border-radius: 15px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
            border-left: 5px solid #764ba2;
        }

        .info-group:hover {
            transform: translateY(-5px);
        }

        .label-text {
            font-size: 13px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .value-text {
            font-size: 18px;
            color: #333;
            font-weight: 500;
        }

        .btn-home {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 40px;
            color: white;
            font-weight: bold;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(118, 75, 162, 0.4);
            transition: all 0.3s;
        }

        .btn-home:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(118, 75, 162, 0.6);
            color: white;
        }

        /* สำหรับหน้า Error */
        .error-card {
            text-align: center;
            padding: 60px 20px;
        }
    </style>
</head>
<body>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>

    <div class="glass-card">
        <div class="header-section">
            <div class="circle-decor" style="width: 200px; height: 200px; top: -50px; left: -50px;"></div>
            <div class="circle-decor" style="width: 150px; height: 150px; bottom: -30px; right: -30px;"></div>
            
            <div class="success-icon-box">
                <i class="fas fa-check"></i>
            </div>
            <h2 class="fw-bold m-0">สมัครงานสำเร็จ!</h2>
            <p class="m-0 mt-2 opacity-75">ข้อมูลของคุณถูกส่งเข้าสู่ระบบของเราเรียบร้อยแล้ว</p>
        </div>

        <div class="content-section">
            <div class="row g-4">
                
                <div class="col-md-6">
                    <div class="info-group">
                        <div class="label-text"><i class="fas fa-user me-2"></i>ผู้สมัคร</div>
                        <div class="value-text">
                            <?php echo htmlspecialchars($_POST['prefix']) . " " . htmlspecialchars($_POST['fullname']); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-group">
                        <div class="label-text"><i class="fas fa-briefcase me-2"></i>ตำแหน่ง</div>
                        <div class="value-text text-primary">
                            <?php echo htmlspecialchars($_POST['position']); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-group">
                        <div class="label-text"><i class="fas fa-graduation-cap me-2"></i>วุฒิการศึกษา</div>
                        <div class="value-text"><?php echo htmlspecialchars($_POST['education']); ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="info-group">
                        <div class="label-text"><i class="fas fa-calendar-alt me-2"></i>วันเดือนปีเกิด</div>
                        <div class="value-text"><?php echo htmlspecialchars($_POST['dob']); ?></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="info-group">
                        <div class="label-text"><i class="fas fa-star me-2"></i>ความสามารถพิเศษ</div>
                        <div class="value-text">
                            <?php echo empty($_POST['skills']) ? "-" : nl2br(htmlspecialchars($_POST['skills'])); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="javascript:history.back()" class="btn btn-home">
                    <i class="fas fa-arrow-left me-2"></i> กลับหน้าหลัก
                </a>
            </div>
        </div>
    </div>

    <script>
        // ยิงพลุเมื่อโหลดหน้าเสร็จ
        window.addEventListener('load', () => {
            var duration = 3 * 1000;
            var animationEnd = Date.now() + duration;
            var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            var interval = setInterval(function() {
                var timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                var particleCount = 50 * (timeLeft / duration);
                // ยิงจากซ้ายและขวา
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
            }, 250);
        });
    </script>

<?php else: ?>

    <div class="glass-card error-card">
        <div style="font-size: 80px; color: #ff6b6b; margin-bottom: 20px;">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <h2 class="fw-bold text-danger">ไม่พบข้อมูลการสมัคร</h2>
        <p class="text-muted mb-4">กรุณากรอกข้อมูลจากหน้าแบบฟอร์มให้ครบถ้วน</p>
        <a href="javascript:history.back()" class="btn btn-outline-danger rounded-pill px-4">
            กลับไปหน้าฟอร์ม
        </a>
    </div>

<?php endif; ?>

</body>
</html>