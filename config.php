<?php
session_start(); // WAJIB PALING ATAS, TIDAK BOLEH ADA SPASI DI ATASNYA
date_default_timezone_set('Asia/Jakarta');
$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "login_system";

$conn = mysqli_connect($host,$user,$pass,$db);