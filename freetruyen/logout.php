<?php
// Khởi động session
session_start();

// Xóa tất cả dữ liệu session
session_destroy();

// Xóa cookies nếu tồn tại
if (isset($_COOKIE['user_id'])) {
    setcookie('user_id', '', time() - 3600, "/"); // Xóa cookie user_id
}
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); // Xóa cookie username
}
if (isset($_COOKIE['role'])) {
    setcookie('role', '', time() - 3600, "/"); // Xóa cookie role
}

// Chuyển hướng người dùng về trang đăng nhập hoặc trang chính
header("Location: /freetruyen/login.php");
exit;
?>
