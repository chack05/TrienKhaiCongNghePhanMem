<?php
$truyen_id = $_GET['truyen_id'];
include_once __DIR__. '/../../dbconnect.php';

// Lấy thông tin truyện
$sql = "SELECT * FROM truyen WHERE truyen_id = $truyen_id;";
$result = mysqli_query($conn, $sql);
$dataMuonXoa = [];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    $dataMuonXoa = array(
        'truyen_id' => $row['truyen_id'],
        'truyen_loai' => $row['truyen_loai'],
        'truyen_hinhdaidien' => $row['truyen_hinhdaidien'], // Sửa tên cột cho đúng
    );
}

// Xử lý xóa hình ảnh
if($dataMuonXoa['truyen_loai'] == 1) {
    $uploadDir = __DIR__. '/../../assets/uploads/tieuthuyet/';
} else if($dataMuonXoa['truyen_loai'] == 2) {
    $uploadDir = __DIR__. '/../../assets/uploads/truyen-tranh/';
}

if (file_exists($uploadDir . $dataMuonXoa['truyen_hinhdaidien']) && !is_dir($uploadDir . $dataMuonXoa['truyen_hinhdaidien'])) {
    unlink($uploadDir . $dataMuonXoa['truyen_hinhdaidien']);
} else {
    echo "Không thể xóa tệp hoặc tệp không tồn tại.";
}

// Xóa các hình ảnh liên quan đến chương trong bảng chuong_hinhanh trước khi xóa chương
$sqlDeleteChuongHinhanh = "DELETE FROM chuong_hinhanh WHERE chuong_id IN (SELECT chuong_id FROM chuong WHERE truyen_id = $truyen_id)";
mysqli_query($conn, $sqlDeleteChuongHinhanh);

// Xóa các chương liên quan đến truyện
$sqlDeleteChuong = "DELETE FROM chuong WHERE truyen_id = $truyen_id";
mysqli_query($conn, $sqlDeleteChuong);

// Xóa truyện
$sqlDeleteTruyen = "DELETE FROM truyen WHERE truyen_id = $truyen_id";
mysqli_query($conn, $sqlDeleteTruyen);

echo '<script>location.href ="index.php";</script>';
?>
