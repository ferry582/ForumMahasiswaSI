<?php
include "koneksi.php";
$name = $_POST['name'];
$college = $_POST['college'];
$email = $_POST['email'];
$password = $_POST['password'];
$query = mysqli_query($connect, "INSERT INTO users VALUES ('','$name','$college','$email','$password','')")
    or die(mysqli_error($connect));
if ($query) {
    header("location: login.php?pesan=berhasildaftar");
} else {
    echo "Input Gagal!";
}