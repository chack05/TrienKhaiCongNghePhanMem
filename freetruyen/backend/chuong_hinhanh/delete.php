<?php
// Kết nối CSDL
include_once __DIR__ . '/../../dbconnect.php';

if (isset($_GET['chuong_id'])) {
    $chuong_id = $_GET['chuong_id'];

    // Lấy danh sách ảnh của chương từ CSDL
    $sqlHinhAnh = "SELECT chuong_hinhanh_tenhinh FROM chuong_hinhanh WHERE chuong_id = $chuong_id";
    $resultHinhAnh = mysqli_query($conn, $sqlHinhAnh);
    $dataHinhAnh = mysqli_fetch_all($resultHinhAnh, MYSQLI_ASSOC);

    // Xóa các tệp tin ảnh từ thư mục uploads
    foreach ($dataHinhAnh as $hinhAnh) {
        $tenHinhAnh = $hinhAnh['chuong_hinhanh_tenhinh'];
        $filePath = __DIR__ . '/../../assets/uploads/' . $tenHinhAnh;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Xóa các bản ghi ảnh trong CSDL
    $sqlDelete = "DELETE FROM chuong_hinhanh WHERE chuong_id = $chuong_id";
    mysqli_query($conn, $sqlDelete);

    // Chuyển hướng về trang danh sách chương sau khi xóa thành công
    header("Location: index.php");
    exit();
} else {
    // Nếu không có thông tin chương được gửi đến, chuyển hướng về trang danh sách chương
    header("Location: index.php");
    exit();
}
?>
