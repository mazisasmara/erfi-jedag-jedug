<?php
include "config.php";

$name     = mysqli_real_escape_string($conn, $_POST['name']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

/* Role otomatis user */
$role = "user";

/* Cek email sudah terdaftar */
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($cek) > 0){
    echo "Email sudah terdaftar! <a href='register.php'>Kembali</a>";
    exit;
}

/* Simpan ke database */
$query = "INSERT INTO users (username,email,password,role)
          VALUES ('$name','$email','$password','$role')";

if(mysqli_query($conn,$query)){

    /* Redirect ke login */
    
    header("Location: login.php");
    exit;

}else{
    echo "Gagal mendaftar!";
}
?>