<?php
session_start();
require 'config.php';
/* Proteksi login */
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

/* Ambil data user dari session dan database */
$nama = $_SESSION['name'] ?? "User";

$q = mysqli_query($conn, "select * from users where username = '$nama'");

$d = mysqli_fetch_assoc($q);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #FFF8DC; /* kuning lembut ala nailong */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.card {
    background: #FFEB85; /* kuning agak terang */
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    max-width: 400px;
    width: 100%;
}

.card h2 {
    text-align: center;
    color: #333;
    margin-bottom: 25px;
}

.item {
    margin: 10px 0;
    font-size: 16px;
}

.item b {
    display: inline-block;
    width: 100px;
}

.edit-btn {
    display: block;
    text-align: center;
    margin-top: 25px;
    padding: 12px;
    background: #FFD700; /* kuning cerah */
    color: #333;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.edit-btn:hover {
    background: #FFC700;
}

</style>
</head>
<body>

<div class="card">
    <h2>Profil Saya</h2>

    <div class="item"><b>Nama:</b> <?= htmlspecialchars($nama); ?></div>
    <div class="item"><b>Email:</b> <?= htmlspecialchars($d['email']); ?></div>
    <div class="item"><b>Kelas:</b> <?= htmlspecialchars($d['kelas']); ?></div>
    <div class="item"><b>Tanggal Lahir:</b> <?= htmlspecialchars($d['tgl_lahir']); ?></div>
    <a href="edit_profil.php" class="edit-btn">✏️ Edit Profil</a>
</div>

</body>
</html>