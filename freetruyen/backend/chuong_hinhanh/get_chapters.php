<?php
include_once __DIR__ . '/../../dbconnect.php';

if (isset($_POST['truyen_id'])) {
    $truyen_id = $_POST['truyen_id'];

    // Query để lấy danh sách chương dựa trên truyện đã chọn
    $sql = "SELECT chuong_id, chuong_so, chuong_ten FROM chuong WHERE truyen_id = $truyen_id";
    $result = mysqli_query($conn, $sql);

    // Tạo một mảng chứa thông tin chương
    $chapters = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $chapters[] = $row;
    }

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($chapters);
} else {
    echo "Invalid request!";
}
?>
