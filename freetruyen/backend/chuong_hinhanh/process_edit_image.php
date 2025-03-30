<?php
// 1. Kết nối
include_once __DIR__ . '/../../dbconnect.php';

// 2. Lấy dữ liệu từ form
$chuong_hinhanh_id = $_POST['chuong_hinhanh_id'];
$tenhinh = $_POST['tenhinh'];
$hinhanh = $_FILES['hinhanh'];

// 3. Kiểm tra và xử lý tệp tin
if ($hinhanh['size'] > 0) {
    // Xóa tệp tin cũ
    $sql = "SELECT chuong_hinhanh_tenhinh FROM chuong_hinhanh WHERE chuong_hinhanh_id = $chuong_hinhanh_id";
    $result = mysqli_query($conn, $sql);
    $oldImage = mysqli_fetch_assoc($result)['chuong_hinhanh_tenhinh'];
    if ($oldImage) {
        $oldImagePath = __DIR__ . "/../../assets/uploads/" . $oldImage;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
    }

    // Tạo tên tệp tin mới dựa trên thời gian
    $timestamp = time();
    $newImageName = $timestamp . '_' . $hinhanh['name'];

    // Di chuyển tệp tin vào thư mục uploads
    $targetPath = __DIR__ . "/../../assets/uploads/" . $newImageName;
    move_uploaded_file($hinhanh['tmp_name'], $targetPath);

    // Cập nhật tên tệp tin mới vào cơ sở dữ liệu
    $sql = "UPDATE chuong_hinhanh SET chuong_hinhanh_tenhinh = '$newImageName' WHERE chuong_hinhanh_id = $chuong_hinhanh_id";
    mysqli_query($conn, $sql);
}

// 4. Điều hướng trở lại trang chỉnh sửa
header("Location: edit.php?chuong_hinhanh_id=$chuong_hinhanh_id");
exit();
?>
