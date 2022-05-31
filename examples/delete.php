<?php
include "koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM users WHERE id ='$id'");
if ($query) {
    header("location:users.php");
} else {
    header("location:users.php");
}