<?php
// Kiểm tra xem người dùng đã gửi dữ liệu lên hay chưa
if (isset($_FILES['avatar'])) {
  // Kiểm tra xem người dùng đã đăng nhập hay chưa
  session_start();
  if (isset($_SESSION['user_id'])) {
    // Kết nối cơ sở dữ liệu
    include_once __DIR__ . '/../../dbconnect.php';

    // Thư mục lưu trữ ảnh tải lên
    $targetDir = __DIR__ . '/../../../assets/uploads/avatar/';

    // Đường dẫn tệp tin ảnh
    $targetFile = $targetDir . basename($_FILES['avatar']['name']);

    // Kiểm tra định dạng tệp tin ảnh
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowedExtensions)) {
      echo 'Định dạng ảnh không hợp lệ. Vui lòng chọn ảnh có định dạng JPG, JPEG, PNG hoặc GIF.';
      exit;
    }

    // Di chuyển tệp tin ảnh tải lên vào thư mục lưu trữ
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
      // Lưu đường dẫn vào cơ sở dữ liệu
      $user_id = $_SESSION['user_id'];
      $avatarPath = '/freetruyen/assets/uploads/avatar/' . basename($_FILES['avatar']['name']);
      $query = "UPDATE user SET avatar = '$avatarPath' WHERE user_id = $user_id";
      mysqli_query($conn, $query);

      echo 'Tải lên ảnh thành công.';
    } else {
      echo 'Đã xảy ra lỗi khi tải lên ảnh.';
    }
  } else {
    echo 'Vui lòng đăng nhập trước khi tải lên ảnh.';
  }
}
?>
