<?php
session_start();
include "koneksi.php";
$name = $_POST['name'];
$password = $_POST['password'];
$query = mysqli_query($connect, "SELECT id,user_level FROM users WHERE name = '$name'
    && password = '$password'") or die(mysqli_error($connect));
$cek = mysqli_num_rows($query);
$Arrray = mysqli_fetch_array($query);
$id = $Arrray[0];
$level = $Arrray[1];
if ($cek > 0) {
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    $_SESSION['id'] = $id;
    $_SESSION['user_level'] = $level;
    header("location:dashboard.php");
} else {
    header("location:login.php?pesan=gagal");
}