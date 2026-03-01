<?php
session_start();
include "config.php";

$idUser = $_SESSION['id'];

$qSelfMonit = mysqli_query($conn, "
SELECT 
    d.activity_name,
    d.hours,
    d.is_productive
FROM monitoring_sessions s
JOIN monitoring_details d ON d.session_id = s.id
WHERE s.user_id = '$idUser'
");

$qGoal = mysqli_query($conn, "
SELECT *
FROM goal_settings
WHERE user_id = '$idUser'
ORDER BY created_at DESC
LIMIT 1
");

$goal = mysqli_fetch_assoc($qGoal);

$query = mysqli_query($conn, "
SELECT *
FROM selfinstruction_questions
WHERE idUser = '$idUser'
ORDER BY created_at DESC
LIMIT 1
");

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Self Instruction</title>

    <style>
        body{
            font-family: Arial;
            background:#f4f6f9;
            padding:40px;
        }

        .container{
            background:white;
            padding:30px;
            border-radius:10px;
            max-width:800px;
            margin:auto;
        }

        h1{
            text-align:center;
        }

        .box{
            margin-bottom:15px;
        }

        .label{
            font-weight:bold;
        }

        .print-btn{
            margin-top:20px;
            padding:10px 20px;
            background:#007bff;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        @media print {
            .print-btn{
                display:none;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h1>LAPORAN SELF DEVELOPMENT</h1>
        <p><b>Nama:</b> <?= $_SESSION['name']; ?></p>
        <p><b>Tanggal Laporan:</b> <?= date('d M Y'); ?></p>
    </div>


    <!-- ================= SELF MONITORING ================= -->
    <div class="section">
    <div class="section-title">1. Self Monitoring</div>

    <table class="table">
    <tr>
        <th>Aktivitas</th>
        <th>Durasi</th>
        <th>Status</th>
    </tr>

    <?php while($monit = mysqli_fetch_assoc($qSelfMonit)): ?>
    <tr>
        <td><?= $monit['activity_name']; ?></td>
        <td><?= $monit['hours']; ?> Jam</td>
        <td><?= $monit['is_productive'] == 'ya' ? 'Produktif' : 'Tidak Produktif'; ?></td>
    </tr>
    <?php endwhile; ?>

    </table>
    </div>


    <!-- ================= GOAL SETTING ================= -->
    <div class="section">
    <div class="section-title">2. Goal Setting</div>

    <?php if($goal): ?>

    <div class="box">
        <div class="label">Aktivitas Target:</div>
        <div><?= $goal['aktivitas']; ?></div>
    </div>

    <div class="box">
        <div class="label">Bentuk Aktivitas:</div>
        <div><?= $goal['bentuk_aktivitas']; ?></div>
    </div>

    <div class="box">
        <div class="label">Perilaku:</div>
        <div><?= $goal['perilaku']; ?></div>
    </div>

    <div class="box">
        <div class="label">Bentuk Perilaku:</div>
        <div><?= $goal['bentuk_perilaku']; ?></div>
    </div>

    <div class="box">
        <div class="label">Hambatan:</div>
        <div><?= $goal['hambatan']; ?></div>
    </div>

    <div class="box">
        <div class="label">Usaha:</div>
        <div><?= $goal['usaha']; ?></div>
    </div>

    <h4>Dampak Positif</h4>

    <div class="box">
        <div class="label">Untuk Diri:</div>
        <div><?= $goal['positif_diri']; ?></div>
    </div>

    <div class="box">
        <div class="label">Untuk Keluarga:</div>
        <div><?= $goal['positif_keluarga']; ?></div>
    </div>

    <div class="box">
        <div class="label">Untuk Sekolah:</div>
        <div><?= $goal['positif_sekolah']; ?></div>
    </div>

    <h4>Dampak Negatif</h4>

    <div class="box">
        <div class="label">Untuk Diri:</div>
        <div><?= $goal['negatif_diri']; ?></div>
    </div>

    <div class="box">
        <div class="label">Untuk Keluarga:</div>
        <div><?= $goal['negatif_keluarga']; ?></div>
    </div>

    <div class="box">
        <div class="label">Untuk Sekolah:</div>
        <div><?= $goal['negatif_sekolah']; ?></div>
    </div>

    <h4>Review</h4>

    <div class="box">
        <div class="label">Review Awal:</div>
        <div><?= $goal['review_awal']; ?></div>
    </div>

    <div class="box">
        <div class="label">Review Kedua:</div>
        <div><?= $goal['review_kedua']; ?></div>
    </div>

    <div class="box">
        <div class="label">Review Akhir:</div>
        <div><?= $goal['review_akhir']; ?></div>
    </div>

    <?php else: ?>
    <div class="box">
        <i>Belum ada goal setting.</i>
    </div>
    <?php endif; ?>

    </div>


    <!-- ================= SELF INSTRUCTION ================= -->
    <div class="section page-break">
    <div class="section-title">3. Self Instruction</div>

    <div class="box">
        <div class="label">Pertanyaan 1:</div>
        <div><?= $data['pertanyaanPertama']; ?></div>
    </div>

    <div class="box">
        <div class="label">Pertanyaan 2:</div>
        <div><?= $data['pertanyaanKedua']; ?></div>
    </div>

    <div class="box">
        <div class="label">Pertanyaan 3:</div>
        <div><?= $data['pertanyaanKetiga']; ?></div>
    </div>

    <div class="box">
        <div class="label">Pertanyaan 4:</div>
        <div><?= $data['pertanyaanKeempat']; ?></div>
    </div>

    <div class="box">
        <div class="label">Pertanyaan 5:</div>
        <div><?= $data['pertanyaanKelima']; ?></div>
    </div>

    </div>


    <button class="print-btn" onclick="window.print()">Print / Save PDF</button>

</div>

</body>
</html>