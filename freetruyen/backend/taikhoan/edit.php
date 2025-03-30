<?php
// Kiểm tra vai trò của người dùng có phải là "admin" không
// Nếu không phải "admin", chuyển hướng người dùng về trang index.php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Kết nối cơ sở dữ liệu
include_once __DIR__ . '/../../dbconnect.php';

// Lấy thông tin tài khoản từ cơ sở dữ liệu
$user_id = $_GET['user_id'];
$query = "SELECT * FROM user WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    // Người dùng không tồn tại, chuyển hướng về trang index.php
    header('Location: index.php');
    exit();
}

// Xử lý logic cập nhật thông tin người dùng khi có dữ liệu được gửi lên
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra dữ liệu được gửi lên
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newRole = $_POST['role'];

    // Thực hiện cập nhật thông tin người dùng vào cơ sở dữ liệu
    $query = "UPDATE user SET username = '$newUsername', email = '$newEmail', role = '$newRole' WHERE user_id = $user_id";
    mysqli_query($conn, $query);

    // Kiểm tra xem người dùng đã gửi dữ liệu ảnh lên hay chưa
    if (isset($_FILES['avatar'])) {
        // Thư mục lưu trữ ảnh tải lên
        $targetDir = __DIR__ . '/../../assets/uploads/avatar/';

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
            $avatarPath = 'uploads/avatar/' . basename($_FILES['avatar']['name']);
            $query = "UPDATE user SET avatar = '$avatarPath' WHERE user_id = $user_id";
            mysqli_query($conn, $query);

            echo 'Tải lên ảnh thành công.';
        } else {
            echo 'Đã xảy ra lỗi khi tải lên ảnh.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
    <?php include_once __DIR__ . '/../layouts/styles.php'; ?>
</head>

<body>
    <?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
            </div>
            <div class="col-10">
                <div class="text-center">
                    <h1>Sửa tài khoản</h1>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Vai trò</label>
                        <select class="form-select" id="role" name="role">
                            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="member" <?= $user['role'] === 'member' ? 'selected' : '' ?>>Member</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Ảnh đại diện:</label>
                        <input type="file" class="form-control" id="avatar" name="avatar">
                        <?php if ($user['avatar']): ?>
                            <img src="<?= $user['avatar'] ?>" alt="Avatar" width="100">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/../layouts/js.php'; ?>
</body>

</html>
