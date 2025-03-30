<?php
$servername = "localhost";
$username = "root"; // hoặc tài khoản MySQL của bạn
$password = ""; // mật khẩu MySQL
$dbname = "tutientruyen"; // tên cơ sở dữ liệu của bạn

// Kết nối tới cơ sở dữ liệu
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>