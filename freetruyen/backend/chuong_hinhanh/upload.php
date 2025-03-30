<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['uploadImages'])) {
    // Thư mục lưu trữ ảnh
    $uploadDir = __DIR__ . '/../../assets/uploads/';

    // Lấy thông tin từ form
    $truyen_id = $_POST['truyen_id'];
    $chuong_id = $_POST['chuong_id'];

    // Lấy danh sách các tệp được tải lên
    $uploadedFiles = $_FILES['uploadImages']['name'];

    // Duyệt qua từng tệp
    foreach ($uploadedFiles as $key => $fileName) {
        // Tạo tên tệp mới dựa trên thời gian và tên gốc
        $tentaptin = date('Ymd_His') . '_' . $fileName;

        // Di chuyển tệp tạm lên thư mục lưu trữ
        move_uploaded_file($_FILES['uploadImages']['tmp_name'][$key], $uploadDir . $tentaptin);

        // Thêm thông tin ảnh vào cơ sở dữ liệu
        include_once __DIR__ . '/../../dbconnect.php';

        $sql = "
            INSERT INTO chuong_hinhanh (chuong_id, chuong_hinhanh_tenhinh)
            VALUES ($chuong_id, '$tentaptin')
        ";
        mysqli_query($conn, $sql);
    }

    echo '<script>location.href ="index.php";</script>';
}
?>
