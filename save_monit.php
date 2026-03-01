<?php
session_start();
require "config.php";

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
   

    $user_id = $_SESSION['id'];

    // Ambil data JSON
    $activities = json_decode($_POST['activities'], true);

    if(!$activities || !is_array($activities)){
        die("Data tidak valid");
    }

    // VALIDASI TOTAL DULU
    $total = array_sum($activities);

    if($total != 24){
        die("Total jam harus tepat 24");
    }

    $today = date("Y-m-d");

    // CEK apakah sudah ada monitoring hari ini
    $check = mysqli_query($conn, "
        SELECT id FROM monitoring_sessions
        WHERE user_id = '$user_id' AND monitor_date = '$today'
    ");

    if(mysqli_num_rows($check) > 0){
        // kalau sudah ada, pakai session lama
        $row = mysqli_fetch_assoc($check);
        $session_id = $row['id'];

        // hapus detail lama biar tidak dobel
        mysqli_query($conn, "
            DELETE FROM monitoring_details
            WHERE session_id = '$session_id'
        ");

    } else {

        // buat session baru
        mysqli_query($conn, "
        INSERT INTO monitoring_sessions (user_id, monitor_date)
        VALUES ('$user_id', '$today')
        ");

        $session_id = mysqli_insert_id($conn);
    }

    // simpan session_id ke session
    $_SESSION['monitor_session_id'] = $session_id;

    // simpan detail aktivitas
    foreach($activities as $name => $hours){

        $name = mysqli_real_escape_string($conn, $name);
        $hours = (float)$hours;

        if($hours > 0){

            mysqli_query($conn, "
            INSERT INTO monitoring_details 
            (session_id, activity_name, hours)
            VALUES
            ('$session_id', '$name', '$hours')
            ");
        }
    }

    header("Location: qna.php");
    exit;
}
?>