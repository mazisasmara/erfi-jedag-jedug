<?php
$namaWeb = "I'M SEMA";
$tagline = "Self Management Habit Tracker";
$deskripsi = "I'M SEMA adalah website untuk membantu kamu mencatat, memantau, dan membangun kebiasaan sehari-hari secara mandiri.";
$tahun = date("Y");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $namaWeb; ?></title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    font-family: 'Comic Neue', cursive;
    background: linear-gradient(135deg,#FFD6E8,#C1F0F6);
}

/* Header */
header{
    background:#FF8FB1;
    color:white;
    text-align:center;
    padding:50px 20px;
    border-bottom-left-radius:50px;
    border-bottom-right-radius:50px;
    animation: slideDown 1s;
}

header h1{
    font-size:48px;
    margin:0;
}

header p{
    font-size:20px;
}

/* Section Card */
section{
    max-width:900px;
    background:white;
    margin:40px auto;
    padding:40px;
    border-radius:30px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
    animation: fadeIn 1.5s;
}

/* Judul */
h2{
    color:#FF8FB1;
    margin-top:30px;
}

/* List */
ul{
    list-style:none;
    padding:0;
}

ul li{
    background:#E0F7FA;
    margin:10px 0;
    padding:12px;
    border-radius:15px;
}

/* Button */
.btn{
    display:inline-block;
    margin-top:25px;
    background:#7ED957;
    color:white;
    padding:15px 35px;
    text-decoration:none;
    border-radius:40px;
    font-size:18px;
    transition:0.3s;
    box-shadow:0 5px 10px rgba(0,0,0,0.2);
}

.btn:hover{
    background:#6BCB4E;
    transform:scale(1.1);
}

/* Footer */
footer{
    background:#FF8FB1;
    color:white;
    text-align:center;
    padding:20px;
    border-top-left-radius:40px;
    border-top-right-radius:40px;
}

/* Animations */
@keyframes slideDown{
    from{opacity:0; transform:translateY(-50px);}
    to{opacity:1; transform:translateY(0);}
}

@keyframes fadeIn{
    from{opacity:0;}
    to{opacity:1;}
}

</style>
</head>

<body>

<header>
    <h1>🌸 <?php echo $namaWeb; ?> 🌸</h1>
    <p><?php echo $tagline; ?></p>
</header>

<section>

    <h2>👋 Kenalan Yuk!</h2>
    <p><?php echo $deskripsi; ?></p>

    <h2>✨ Bisa Untuk Apa Aja?</h2>
    <ul>
        <li>📒 Mencatat kebiasaan harian</li>
        <li>📈 Melihat perkembangan diri</li>
        <li>⏰ Manajemen waktu pribadi</li>
        <li>💖 Motivasi membangun rutinitas</li>
        <li>🎯 Tracking target harian</li>
    </ul>

    <h2>🎯 Tujuannya?</h2>
    <p>
        Membantu kamu jadi lebih disiplin, konsisten,
        dan bahagia menjalani rutinitas sehari-hari 🌈
    </p>

    <h2>🚀 Mulai Sekarang!</h2>
    <p>
        Yuk bangun kebiasaan positif bersama <?php echo $namaWeb; ?> 💪✨
    </p>

    <a href="login.php" class="btn">🌟 Yuk Dicoba</a>

</section>

<footer>
    <p>© <?php echo $tahun; ?> - <?php echo $namaWeb; ?> | Made with ❤️</p>
</footer>

</body>
</html>