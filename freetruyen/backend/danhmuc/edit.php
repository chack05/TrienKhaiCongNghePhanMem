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
        // Xử lý cập nhật danh mục
        if (isset($_POST['BtnSave'])) {
            if (isset($_POST['danhmuc_ten'])) {
                $danhmuc_ten = $_POST['danhmuc_ten'];

                // Cập nhật thông tin danh mục
                $sqlUpdate = "UPDATE danhmuc SET danhmuc_ten = '$danhmuc_ten' WHERE danhmuc_id = $danhmuc_id";
                mysqli_query($conn, $sqlUpdate);

                echo '<script>alert("Cập nhật danh mục thành công."); location.href ="index.php";</script>';
            } else {
                echo "Tên danh mục không được gửi.";
            }
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Chỉnh sửa danh mục</title>
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
                            <h2>Chỉnh Sửa Danh Mục</h2>
                        </div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb alert alert-info">
                                <li class="breadcrumb-item"><a href="/freetruyen/admin">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="index.php">Danh Sách Danh Mục</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="#" id="breadcrumb-category"></a></li>
                            </ol>
                        </nav>
                        <form name="frmEdit" action="" method="post">
                            <div class="form-group">
                                <label for="danhmuc_ten">Tên danh mục:</label>
                                <input type="text" class="form-control" id="danhmuc_ten" name="danhmuc_ten" value="<?= isset($row['danhmuc_ten']) ? $row['danhmuc_ten'] : '' ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="BtnSave">Lưu</button>
                            <a href="index.php" class="btn btn-secondary">Hủy</a>
                        </form>
                    </div>
                    <div class="col-12">
                        <?php include_once __DIR__ . '/../layouts/footer.php'; ?>
                    </div>
                </div>
            </div>
            <?php include_once __DIR__ . '/../layouts/js.php'; ?>
        </body>

        </html>
<?php
    }
} else {
    echo "ID danh mục không được cung cấp.";
}
?>
