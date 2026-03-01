<?php
session_start();

require "config.php";

$session_id = $_SESSION['monitor_session_id'] ?? 0;

$result = mysqli_query($conn, "
SELECT id, activity_name 
FROM monitoring_details
WHERE session_id = '$session_id'
");

/* Proteksi login */
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

/* Ambil aktivitas dari DB menggunakan session_id */
$activities = [];
if($session_id){
    $res = mysqli_query($conn, "
        SELECT activity_name, hours 
        FROM monitoring_details
        WHERE session_id = '$session_id'
    ");

    while($row = mysqli_fetch_assoc($res)){
        $activities[$row['activity_name']] = $row['hours'];
    }
}

if(empty($activities)){
    echo "Belum ada aktivitas untuk hari ini.";
    exit;
}

$namaUser = $_SESSION['name'] ?? "User";
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Evaluasi Aktivitas</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#FFD6E8;
    padding:30px;
}

.card{
    background:white;
    max-width:600px;
    margin:auto;
    padding:25px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.item{
    margin:20px 0;
    padding:10px;
    border-bottom:1px solid #eee;
}

.item b{
    display:block;
    margin-bottom:8px;
}

label{
    margin-right:15px;
}

button{
    width:100%;
    padding:12px;
    background:#7ED957;
    border:none;
    color:white;
    border-radius:20px;
    margin-top:20px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#6BCB4E;
}
</style>
</head>

<body>

<div class="card">

<h2>📋 Evaluasi Aktivitas</h2>
<p>Halo, <?= htmlspecialchars($namaUser); ?> 👋</p>
<p>Silakan tentukan apakah aktivitas berikut produktif atau tidak.</p>

<form method="POST" action="save_answer.php">

<?php while($row = mysqli_fetch_assoc($result)): ?>

<input type="hidden" 
name="detail_id[]" 
value="<?= $row['id']; ?>">

<b><?= htmlspecialchars($row['activity_name']); ?></b>

<label>
<input type="radio" name="answer[<?= $row['id']; ?>]" value="ya" required>
Produktif
</label>

<label>
<input type="radio" name="answer[<?= $row['id']; ?>]" value="tidak">
Tidak Produktif
</label>

<br />

<?php endwhile; ?>

<button type="submit">Next ➡️</button>

</form>

</div>

</body>
</html>