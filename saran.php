<?php
session_start();
require "config.php";

if(!isset($_SESSION['monitor_session_id'])){
    header("Location: beranda.php");
    exit;
}

$session_id = $_SESSION['monitor_session_id'];
$namaUser = $_SESSION['name'];

$result = mysqli_query($conn, "
SELECT activity_name, hours, is_productive
FROM monitoring_details
WHERE session_id = '$session_id'
");

if(mysqli_num_rows($result) == 0){
    header("Location: beranda.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Saran Aktivitas</title>

<style>
body{
    font-family:Arial;
    background:#C1F0F6;
    padding:30px;
}

.card{
    background:white;
    max-width:600px;
    margin:auto;
    padding:25px;
    border-radius:15px;
}

.good{color:green;}
.bad{color:red;}
.warning{color:orange;}

button{
    width:100%;
    padding:12px;
    background:#FF8FB1;
    border:none;
    color:white;
    border-radius:20px;
    margin-top:20px;
}
</style>
</head>

<body>

<div class="card">

<h2>💡 Saran Untukmu</h2>
<p>Hai, <?= htmlspecialchars($namaUser) ?> 👋</p>

<hr>

<?php while($item = mysqli_fetch_assoc($result)):

$name = $item['activity_name'];
$hours = $item['hours'];
$productivity = $item['is_productive'];

if ($name == "Tidur") {
    $saran = "Tidur yang cukup sangat penting untuk kesehatan dan konsentrasi. Usahakan tidur antara 7-9 jam setiap malam.";
} elseif ($name == "Sholat") {
    $saran = "Waktu ideal: ±5-10 menit per waktu sholat (±25-50 menit per hari). Lakukan dengan khusyuk dan tepat waktu.";
} elseif ($name == "Mandi") {
    $saran = "Waktu ideal: 10-20 menit per sesi (1-2 kali sehari). Menjaga kebersihan tubuh penting untuk kesehatan.";
} elseif ($name == "Sarapan") {
    $saran = "Waktu ideal: 15-30 menit. Sarapan bergizi membantu meningkatkan energi dan fokus di pagi hari.";
} elseif ($name == "Belajar di Sekolah") {
    $saran = "Waktu ideal: 6-8 jam (sesuai jam sekolah). Manfaatkan waktu belajar dengan fokus dan aktif.";
} elseif ($name == "Istirahat") {
    $saran = "Waktu ideal: 15-60 menit. Istirahat singkat membantu memulihkan energi dan menjaga produktivitas.";
} elseif ($name == "Makan Siang") {
    $saran = "Waktu ideal: 20-30 menit. Konsumsi makanan seimbang agar stamina tetap terjaga.";
} elseif ($name == "Pulang Sekolah") {
    $saran = "Waktu ideal: 15-60 menit (tergantung jarak). Gunakan waktu ini untuk relaksasi ringan.";
} elseif ($name == "Les") {
    $saran = "Waktu ideal: 1-2 jam. Ikuti dengan fokus agar materi semakin dipahami.";
} elseif ($name == "Mengerjakan PR") {
    $saran = "Waktu ideal: 1-2 jam. Kerjakan secara bertahap agar tidak menumpuk.";
} elseif ($name == "Belajar Mandiri") {
    $saran = "Waktu ideal: 30-90 menit. Belajar rutin membantu meningkatkan pemahaman jangka panjang.";
} elseif ($name == "Bermain Game") {
    $saran = "Waktu ideal: 30-60 menit. Batasi waktu agar tidak mengganggu kewajiban lainnya.";
} elseif ($name == "Menonton TV") {
    $saran = "Waktu ideal: 30-60 menit. Gunakan sebagai hiburan, hindari berlebihan.";
} elseif ($name == "Main Media Sosial") {
    $saran = "Waktu ideal: 30-60 menit. Gunakan secara bijak dan hindari scrolling tanpa tujuan.";
} elseif ($name == "Olahraga") {
    $saran = "Waktu ideal: 30-60 menit. Olahraga rutin membantu menjaga kesehatan fisik dan mental.";
} elseif ($name == "Membaca Buku") {
    $saran = "Waktu ideal: 20-45 menit. Membaca rutin meningkatkan wawasan dan konsentrasi.";
} elseif ($name == "Membersihkan Kamar") {
    $saran = "Waktu ideal: 15-30 menit. Kebersihan kamar meningkatkan kenyamanan dan fokus.";
} elseif ($name == "Membantu Orang Tua") {
    $saran = "Waktu ideal: 15-60 menit. Melatih tanggung jawab dan kepedulian dalam keluarga.";
} elseif ($name == "Makan Malam") {
    $saran = "Waktu ideal: 20-30 menit. Hindari makan terlalu larut agar kualitas tidur tetap baik.";
} elseif ($name == "Ngaji") {
    $saran = "Waktu ideal: 20-60 menit. Konsistensi lebih penting daripada durasi panjang.";
} elseif ($name == "Chatting") {
    $saran = "Waktu ideal: 15-45 menit. Jaga komunikasi tanpa mengganggu aktivitas utama.";
} elseif ($name == "Hobi") {
    $saran = "Waktu ideal: 30-90 menit. Hobi membantu menjaga keseimbangan mental.";
} elseif ($name == "Latihan Musik") {
    $saran = "Waktu ideal: 30-60 menit. Latihan rutin meningkatkan kemampuan secara signifikan.";
} elseif ($name == "Latihan Seni") {
    $saran = "Waktu ideal: 30-60 menit. Konsistensi latihan membantu mengembangkan kreativitas.";
} elseif ($name == "Belajar Online") {
    $saran = "Waktu ideal: 30-120 menit. Pastikan fokus dan minim distraksi.";
} elseif ($name == "Persiapan Besok") {
    $saran = "Waktu ideal: 15-30 menit sebelum tidur. Membantu hari esok lebih terorganisir.";
} else {
    $saran = "Atur aktivitas ini secara seimbang dengan estimasi waktu yang proporsional agar tidak mengganggu aktivitas utama.";
}


?>

<p>

<b><?= htmlspecialchars($name) ?> (<?= $hours ?> jam)</b>
<br>

<?php if($productivity == "ya"): ?>
    <span class="good">Sudah produktif 👍</span><br>
<?php else: ?>
    <span class="bad">Belum produktif ⚠️</span><br>
<?php endif; ?>

<?= $saran ?>

</p>
<hr>

<?php endwhile; ?>

<form action="beranda.php">
<button type="submit">Done ✅</button>
</form>

</div>

</body>
</html>