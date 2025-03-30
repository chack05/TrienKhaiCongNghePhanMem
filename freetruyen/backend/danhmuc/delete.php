<?php
include_once __DIR__ . '/../../dbconnect.php';

if (isset($_GET['id'])) {
    $danhmuc_id = $_GET['id'];

    // Kiểm tra xem danh mục có tồn tại trong cơ sở dữ liệu hay không
    $sql = "SELECT * FROM danhmuc WHERE danhmuc_id = $danhmuc_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Danh mục không tồn tại.";
    } else {
        // Xóa danh mục
        $sql = "DELETE FROM danhmuc WHERE danhmuc_id = $danhmuc_id";
        mysqli_query($conn, $sql);

        echo '<script>alert("Xóa danh mục thành công."); location.href ="index.php";</script>';
    }
} else {
    echo "Tham số không hợp lệ.";
}
?>
