<?php
// Thông tin kết nối cơ sở dữ liệu
$localhost = "localhost";
$username = "root";
$password = "";
$database = "dacap";

// Tạo kết nối đến cơ sở dữ liệu
$connection = mysqli_connect($localhost, $username, $password, $database);

// Kiểm tra xem kết nối có thành công không
if (!$connection) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
