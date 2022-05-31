<?php
include "koneksi.php";
$cat_name = $_POST['cat_name'];
$cat_description = $_POST['cat_description'];
$query = mysqli_query($connect, "INSERT INTO categories VALUES ('','$cat_name','$cat_description')")
    or die(mysqli_error($connect));
if ($query) {
    header("location: category.php");
} else {
    echo "Input Gagal!";
}