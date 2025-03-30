<?php
// Kết nối cơ sở dữ liệu
include_once __DIR__ . '/../../dbconnect.php';

// Kiểm tra nếu có thông tin người dùng được gửi lên
if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    // Xóa tài khoản từ cơ sở dữ liệu
    $query = "DELETE FROM user WHERE user_id = '$userId'";
    mysqli_query($conn, $query);

    // Điều hướng về trang danh sách tài khoản sau khi xóa
    header("Location: index.php");
    exit();
}
