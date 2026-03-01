<?php
include "config.php";

// Cek login
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

// Cek bukan admin
if($_SESSION['role'] != "user"){
    header("Location: dashboard_admin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="stylesheet" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/navbar/navbar.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Beranda</title>

<style>
@import url('<?php echo dirname($_SERVER['PHP_SELF']); ?>/navbar/navbar.css');
/* IMPORT FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

/* FADE IN */
body{
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn{
    from{ opacity:0; transform:translateY(10px);}
    to{ opacity:1; transform:translateY(0);}
}

/* BODY BACKGROUND IMAGE */
body{
    min-height:100vh;
    background: 
        linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), /* overlay */
        url('img/beranda.jpg'); /* GANTI DENGAN PATH GAMBAR KAMU */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    position:relative;
    overflow-x:hidden;
}

<?php include 'navbar/nav.css' ?>

/* CONTENT */
.container{
    text-align:center;
    margin-top:100px;
}

/* TITLE */
.container h1{
    color:white;
    margin-bottom:10px;
    font-size:32px;
}

/* SUBTITLE */
.container p{
    color:#f1f1f1;
    font-size:16px;
    opacity:0.9;
}

/* MENU */
.menu{
    margin-top:60px;
    display:flex;
    justify-content:center;
    gap:30px;
    flex-wrap:wrap;
}

/* MENU CARD */
.menu a{
    background: rgba(255,255,255,0.85);
    backdrop-filter: blur(10px);
    width:220px;
    padding:30px 20px;
    border-radius:22px;
    text-decoration:none;
    color:#333;
    font-size:18px;
    font-weight:600;
    box-shadow:0 8px 25px rgba(0,0,0,0.25);
    transition:all 0.35s ease;
}

/* HOVER */
.menu a:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,0.4);
}

/* ICON */
.menu span{
    font-size:38px;
    display:block;
    margin-bottom:12px;
}

</style>
</head>

<body>

<?php include "navbar/nav.php"; ?>


<!-- CONTENT -->
<div class="container">

    <h1>Selamat Datang, <?php echo $namaUser; ?> 👋</h1>
    <p>Kelola kebiasaan dan tujuan hidupmu bersama I'M SEMA ✨</p>


    <!-- MENU -->
    <div class="menu">

        <!-- Self Monitoring -->
        <a href="self_monitoring.php">
            <span>📊</span>
            Self Monitoring
        </a>

        <!-- Goal Setting -->
        <a href="goal_setting.php">
            <span>🎯</span>
            Goal Setting
        </a>

        <!-- Self Instruction -->
        <a href="self_instruction.php">
            <span>🧠</span>
            Self Instruction
        </a>

        <!-- Laporan -->
        <a href="laporan.php">
            <span>📄</span>
            Laporan
        </a>
    </div>

</div>

</body>
</html>