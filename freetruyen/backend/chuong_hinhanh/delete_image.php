<?php
// 1. Kết nối
include_once __DIR__ . '/../../dbconnect.php';

// 2. Lấy chuong_hinhanh_id từ tham số truyền vào
$chuong_hinhanh_id = $_GET['chuong_hinhanh_id'];

// 3. Truy vấn để lấy thông tin ảnh cần xóa
$sql = "SELECT chuong_hinhanh_tenhinh FROM chuong_hinhanh WHERE chuong_hinhanh_id = $chuong_hinhanh_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$hinhanh_tenhinh = $row['chuong_hinhanh_tenhinh'];

// 4. Xóa ảnh từ thư mục uploads
if ($hinhanh_tenhinh) {
    $path = __DIR__ . "/../../assets/uploads/" . $hinhanh_tenhinh;
    if (file_exists($path)) {
        unlink($path);
    }
}

// 5. Xóa thông tin ảnh trong cơ sở dữ liệu
$sql = "DELETE FROM chuong_hinhanh WHERE chuong_hinhanh_id = $chuong_hinhanh_id";
mysqli_query($conn, $sql);

// 6. Điều hướng trở lại trang chỉnh sửa
header("Location: edit.php");
exit();
?>
